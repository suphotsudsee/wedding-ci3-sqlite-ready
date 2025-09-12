<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Donate extends CI_Controller {
  public function index($code){
    $guest = $this->Guest_model->get_by_code($code);
    if(!$guest){
      // แจ้งเตือนผ่าน flashdata แล้วกลับหน้าแรก (Dashboard)
      $this->session->set_flashdata('modal_error', 'ไม่พบรหัสผู้เข้าร่วม: '.$code.' กรุณาลองใหม่');
      redirect('dashboard');
      return;
    }
    $donated = array_map(function($d){return $d->category;}, $this->Donation_model->list_by_guest($guest->id));
    $data = array('guest'=>$guest,'donated'=>$donated,'code'=>$code);
    $this->load->view('donate',$data);
  }
}
