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

	/* get records by name */
    public function getProductsByName($name) {
		$this->db->like('name', $name);
		$this->db->from('products');
        $query = $this->db->get();
        return $result = $query->result_array();
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

	/* insert a record*/
	public function addCategory($data) {
		$query = $this->db->insert('category', $data);
	
		if($query) {
			return $this->db->insert_id();
		}
		else {
			return false;
		}
	}

	 /* update a record */
	public function updateCategory($id, $data) {
		$this->db->where('id', $id);
        $result = $this->db->update('category', $data);
        return $result;
	}	

	/* get a record by id */
	public function getCategoryById($id) {
		$this->db->where('id', $id);
        $this->db->from('category');
        $query = $this->db->get();
        return $result = $query->result_array();
	}

	 /* delete a record */
	public function deletecategory($id) {
        $this->db->where('id', $id);
        $result = $this->db->delete('category');
		return $result;
	}

	/**************************/
	/*  Group Buy Model       *
	/**************************/


	/* get a group buy information by product id */
	public function getGroupByProductId($id) {
		$this->db->where('product_id', $id);
        $this->db->from('group_buy');
        $query = $this->db->get();
        return $result = $query->result_array();
	}

	/* insert a record*/
	public function addGroup($data) {
		$query = $this->db->insert('group_buy', $data);
	
		if($query) {
			return $this->db->insert_id();
		}
		else {
			return false;
		}
	}

	/* update a record */
	public function updateGroup($id, $data) {
		$this->db->where('id', $id);
        $result = $this->db->update('group_buy', $data);
        return $result;
	}	

	/* get a group buy information by id */
	public function getGroupById($id) {
		$this->db->where('id', $id);
        $this->db->from('group_buy');
        $query = $this->db->get();
        return $result = $query->result_array();
	}

	/* get all record */
    public function getAllGroup() {
		$this->db->from('group_buy');
        $query = $this->db->get();
        return $result = $query->result_array();
	}
}
