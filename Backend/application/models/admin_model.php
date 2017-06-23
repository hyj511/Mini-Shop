<?php 
/**
 * Admin Model
 * @author : kmr
 * Created at: 2017/6/23
 *
 */
class Admin_model extends CI_Model {
    
    /* Constructor */
    public function __construct() {
         parent::__construct();
    }

     /* insert a record*/
	public function add($data) {
		$query = $this->db->insert('admins', $data);
	
		if($query) {
			return $this->db->insert_id();
		}
		else {
			return false;
		}
	}

     /* get a record by admin name */
	public function getShopByName($name) {
		$this->db->where('admin_name', $name);
        $this->db->from('admins');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
	}

    /* get all record */
    public function getAll() {
		$this->db->from('admins');
        $query = $this->db->get();
        return $result = $query->result_array();
	}
}