<?php 
/**
 * Order Model
 * @author : kmr
 * Created at: 2017/7/3
 *
 */
class Order_model extends CI_Model {
    
    /* Constructor */
    public function __construct() {
         parent::__construct();
    }

    /* insert a record*/
	public function add($data) {
		$query = $this->db->insert('order', $data);
	
		if($query) {
			return $this->db->insert_id();
		}
		else {
			return false;
		}
	}

    /* get all record */
    public function getAll() {
		$this->db->from('order');
        $query = $this->db->get();
        return $result = $query->result_array();
	}

	  /* get a record by id */
	public function getOrderById($id) {
		$this->db->where('id', $id);
        $this->db->from('order');
        $query = $this->db->get();
        return $result = $query->result_array();
	}
}