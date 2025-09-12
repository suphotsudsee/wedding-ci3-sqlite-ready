
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Donation_model extends CI_Model {
  private $table = 'donations';
  public function list_by_guest($guest_id){
    return $this->db->get_where($this->table, array('guest_id'=>$guest_id))->result();
  }
  public function exists_category($guest_id,$category){
    return $this->db->get_where($this->table, array('guest_id'=>$guest_id,'category'=>$category))->row() != null;
  }
  public function create($guest_id,$category,$amount=1){
    $data = array('id'=>uuid(),'guest_id'=>$guest_id,'category'=>$category,'amount'=>$amount);
    return $this->db->insert($this->table,$data);
  }
  public function aggregate(){
    $sql = "SELECT category, SUM(amount) as coins FROM {$this->table} GROUP BY category";
    return $this->db->query($sql)->result();
  }
}
