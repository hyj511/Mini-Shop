<?php 
/**
 * Shop Model
 * @author : kmr
 * Created at: 2017/6/23
 *
 */
class Shop_model extends CI_Model {

    public function __construct() {
         parent::__construct();
    }
	
    /* insert a record*/
	public function add($data) {
		$query = $this->db->insert('shop', $data);
	
		if($query) {
			return $this->db->insert_id();
		}
		else {
			return false;
		}
	}
	
    /* get all record */
    public function getAll() {
		$this->db->from('shop');
        $query = $this->db->get();
        return $result = $query->result_array();
	}

    /* delete a record */
	public function delete($id) {
        $this->db->where('id', $id);
        $result = $this->db->delete('shop');
		return $result;
	}

	 /* get a record by id */
	public function getShopById($id) {
		$this->db->where('id', $id);
        $this->db->from('shop');
        $query = $this->db->get();
        return $result = $query->result_array();
	}
	
     /* update a record */
	public function update($id, $data) {
		$this->db->where('id', $id);
        $result = $this->db->update('shop', $data);
        return $result;
	}	
	
}
