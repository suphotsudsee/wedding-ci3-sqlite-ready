
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guest_model extends CI_Model {
  private $table = 'guests';
  public function get_by_code($code){
    return $this->db->get_where($this->table, array('code'=>$code))->row();
  }
  public function upsert($name,$code){
    $row = $this->get_by_code($code);
    if($row){
      $this->db->where('code',$code)->update($this->table,array('name'=>$name,'credits_remaining'=>2));
      return $this->get_by_code($code);
    }
    $data = array('id'=>uuid(),'name'=>$name,'code'=>$code,'credits_remaining'=>2);
    $this->db->insert($this->table,$data);
    return (object)$data;
  }
  public function decrement_credit($guest_id){
    $this->db->set('credits_remaining','credits_remaining-1',FALSE)->where('id',$guest_id)->update($this->table);
  }

// application/models/Guest_model.php
public function all_with_stats(){
  $sql = "
    SELECT g.*,
           COUNT(d.id) AS picked
    FROM guests g
    LEFT JOIN donations d ON d.guest_id = g.id
    GROUP BY g.id
    ORDER BY g.created_at DESC
  ";
  return $this->db->query($sql)->result();
}

}
