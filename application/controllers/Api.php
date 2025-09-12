
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Api extends CI_Controller {
  private function out($data,$status=200){
    $this->output->set_status_header($status)->set_content_type('application/json','utf-8')->set_output(json_encode($data,JSON_UNESCAPED_UNICODE));
  }
  public function register(){
    $payload = json_decode($this->input->raw_input_stream,true);
    if(!$payload){ $payload = $this->input->post(); }
    $name = isset($payload['name']) ? $payload['name'] : null;
    $code = isset($payload['code']) ? $payload['code'] : null;
    if(!$name || !$code){ return $this->out(array('ok'=>false,'error'=>'ข้อมูลไม่ครบ'),400); }
    $g = $this->Guest_model->upsert($name,$code);
    return $this->out(array('ok'=>true,'guest'=>array('name'=>$g->name,'code'=>$g->code,'creditsRemaining'=>$g->credits_remaining)));
  }
  public function guest($code){
    $g = $this->Guest_model->get_by_code($code);
    if(!$g) return $this->out(array('ok'=>false,'error'=>'ไม่พบผู้เข้าร่วม'),404);
    $don = $this->Donation_model->list_by_guest($g->id);
    $donated = array_map(function($d){return $d->category;}, $don);
    $can = ($g->credits_remaining > 0) && (count($donated) < 2);
    return $this->out(array('ok'=>true,'guest'=>array('name'=>$g->name,'code'=>$g->code,'creditsRemaining'=>$g->credits_remaining),'donated'=>$donated,'remaining'=>array_values(array_diff(array('SCHOOL','HOSPITAL','TEMPLE'),$donated)),'canDonate'=>$can));
  }
  public function donate(){
    $payload = json_decode($this->input->raw_input_stream,true);
    if(!$payload){ $payload = $this->input->post(); }
    $code = isset($payload['code'])?$payload['code']:null;
    $category = isset($payload['category'])?$payload['category']:null;
    $amount = isset($payload['amount'])?intval($payload['amount']):1;
    if(!$code || !$category) return $this->out(array('ok'=>false,'error'=>'ข้อมูลไม่ครบ'),400);

    $this->db->trans_begin();
    $g = $this->Guest_model->get_by_code($code);
    if(!$g){ $this->db->trans_rollback(); return $this->out(array('ok'=>false,'error'=>'ไม่พบผู้เข้าร่วม'),404); }
    $donated = $this->Donation_model->list_by_guest($g->id);
    if($g->credits_remaining <= 0 || count($donated) >= 2){
      $this->db->trans_rollback(); return $this->out(array('ok'=>false,'error'=>'สิทธิครบ 2 ปุ่มแล้ว'),400);
    }
    if($this->Donation_model->exists_category($g->id,$category)){
      $this->db->trans_rollback(); return $this->out(array('ok'=>false,'error'=>'เลือกหัวข้อนี้ไปแล้ว'),400);
    }
    $this->Donation_model->create($g->id,$category,$amount);
    $this->Guest_model->decrement_credit($g->id);

    if($this->db->trans_status()===FALSE){
      $this->db->trans_rollback(); return $this->out(array('ok'=>false,'error'=>'บันทึกไม่สำเร็จ'),500);
    }
    $this->db->trans_commit();
    return $this->out(array('ok'=>true,'credits_remaining'=>$g->credits_remaining-1));
  }
  public function dashboard(){
    $agg = $this->Donation_model->aggregate();
    $map = array('SCHOOL'=>0,'HOSPITAL'=>0,'TEMPLE'=>0);
    foreach($agg as $r){ $map[$r->category] = (int)$r->coins; }
    $map['total'] = array_sum($map);
    return $this->out($map);
  }
  public function info(){
    $guest_count = $this->db->count_all('guests');
    $don_count   = $this->db->count_all('donations');
    $credits = $this->db->query("SELECT SUM(credits_remaining) c FROM guests")->row();
    $credits_total = $credits && $credits->c ? (int)$credits->c : 0;
    return $this->out(array('ok'=>true,'stats'=>array('guests'=>$guest_count,'donations'=>$don_count,'creditsRemainingTotal'=>$credits_total)));
  }
}
