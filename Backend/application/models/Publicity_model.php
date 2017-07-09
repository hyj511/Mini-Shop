<?php 
/**
 * Admin Model
 * @author : kmr
 * Created at: 2017/6/23
 *
 */
class Publicity_model extends CI_Model {
    
    /* Constructor */
    public function __construct() {
         parent::__construct();
    }

    /* insert a record*/
	public function add($data) {
		$query = $this->db->insert('publicity', $data);
	
		if($query) {
			return $this->db->insert_id();
		}
		else {
			return false;
		}
	}

    /* get all record */
    public function getAll() {
		$this->db->from('publicity');
        $query = $this->db->get();
        return $result = $query->result_array();
	}

    /* get a record by id */
	public function getPublicityById($id) {
		$this->db->where('id', $id);
        $this->db->from('publicity');
        $query = $this->db->get();
        return $result = $query->result_array();
	}

    /* update a record */
	public function update($id, $data) {
		$this->db->where('id', $id);
        $result = $this->db->update('publicity', $data);
        return $result;
	}	

    /* delete a record */
	public function delete($id) {
        $this->db->where('id', $id);
        $result = $this->db->delete('publicity');
		return $result;
	}

     /* get a record by admin name */
	public function getAdminByName($name) {
		$this->db->where('admin_name', $name);
        $this->db->from('admins');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
	}

    
   

    

    

    // role table

    /* get a record by id */
	public function getRoleById($id) {
		$this->db->where('id', $id);
        $this->db->from('role');
        $query = $this->db->get();
        return $result = $query->result_array();
	}

    /* get all record */
    public function getRoles() {
		$this->db->from('role');
        $query = $this->db->get();
        return $result = $query->result_array();
	}
}