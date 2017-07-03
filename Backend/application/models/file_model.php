<?php 
/**
 * File Model
 * @author : kmr
 * Created at: 2017/7/3
 *
 */
class File_model extends CI_Model {
    
    /* Constructor */
    public function __construct() {
         parent::__construct();
    }

    /* insert a record*/
	public function add($data) {
		$query = $this->db->insert('imageofproduct', $data);
	
		if($query) {
			return $this->db->insert_id();
		}
		else {
			return false;
		}
	}

	 /* get a record by product_id */
	public function getUrlByProductId($id) {
		$this->db->where('product_id', $id);
        $this->db->from('imageofproduct');
        $query = $this->db->get();
        return $result = $query->result_array();
	}

}