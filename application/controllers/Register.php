<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register extends CI_Controller {
  public function index(){
    if($this->input->method() === 'post'){
      $name = $this->input->post('name');
      $code = $this->input->post('code');
      if($name && $code){
        $this->Guest_model->upsert($name,$code);
        $this->session->set_flashdata('msg','ลงทะเบียนสำเร็จ: '.$name.' ('.$code.')');
        redirect('register');
        return;
      }
      $this->session->set_flashdata('msg','กรุณากรอกข้อมูลให้ครบ');
      redirect('register');
      return;
    }

    // ดึงรายชื่อแขก + สถิติ
    $guests = $this->Guest_model->all_with_stats();
    $data = compact('guests');
    $this->load->view('register', $data);
  }
}
