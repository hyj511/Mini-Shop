<?php 
/**
 * Product Model
 * @author : kmr
 * Created at: 2017/6/26
 *
 */
class Product_model extends CI_Model {

    public function __construct() {
         parent::__construct();
    }
	
    /* insert a record*/
	public function add($data) {
		$query = $this->db->insert('products', $data);
	
		if($query) {
			return $this->db->insert_id();
		}
		else {
			return false;
		}
	}
	
    /* get all record */
    public function getAll() {
		$this->db->from('products');
        $query = $this->db->get();
        return $result = $query->result_array();
	}

	/* get records by category */
    public function getByCategory($category) {
		$this->db->where('category', $category);
		$this->db->from('products');
        $query = $this->db->get();
        return $result = $query->result_array();
	}

    /* delete a record */
	public function delete($id) {
        $this->db->where('id', $id);
        $result = $this->db->delete('products');
		return $result;
	}

	 /* get a record by id */
	public function getProductById($id) {
		$this->db->where('id', $id);
        $this->db->from('products');
        $query = $this->db->get();
        return $result = $query->result_array();
	}
	
     /* update a record */
	public function update($id, $data) {
		$this->db->where('id', $id);
        $result = $this->db->update('products', $data);
        return $result;
	}	

	/**************************/
	/*  Category Model        *
	/**************************/
	/* get all record */
    public function getAllCategory() {
		$this->db->from('category');
        $query = $this->db->get();
        return $result = $query->result_array();
	}
	
}
