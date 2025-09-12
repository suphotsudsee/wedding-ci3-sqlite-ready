
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller {
  public function index(){
    $agg = $this->Donation_model->aggregate();
    $map = array('SCHOOL'=>0,'HOSPITAL'=>0,'TEMPLE'=>0);
    foreach($agg as $r){ $map[$r->category] = (int)$r->coins; }
    $data = array('sum'=>$map, 'total'=>array_sum($map));
    $this->load->view('dashboard',$data);
  }
  public function info(){
    $guest_count = $this->db->count_all('guests');
    $don_count   = $this->db->count_all('donations');
    $credits = $this->db->query("SELECT SUM(credits_remaining) c FROM guests")->row();
    $credits_total = $credits && $credits->c ? (int)$credits->c : 0;
    $data = compact('guest_count','don_count','credits_total');
    $this->load->view('dashboard_info',$data);
  }
}
