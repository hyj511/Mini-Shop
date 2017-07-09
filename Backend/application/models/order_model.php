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
		$query = $this->db->insert('orders', $data);
	
		if($query) {
			return $this->db->insert_id();
		}
		else {
			return false;
		}
	}

    /* get all record */
    public function getAll() {
		$this->db->from('orders');
        $query = $this->db->get();
        return $result = $query->result_array();
	}

	/* get a record by id */
	public function getOrderById($id) {
		$this->db->where('id', $id);
        $this->db->from('orders');
        $query = $this->db->get();
        return $result = $query->result_array();
	}

	/* get a record by product_id */
	public function getOrderByProductId($id) {
		$this->db->where('product_id', $id);
        $this->db->from('orders');
        $query = $this->db->get();
        return $result = $query->result_array();
	}

	/* get a record by group id */
	public function getOrderByGroupId($id) {
		$this->db->where('group_id', $id);
        $this->db->from('orders');
        $query = $this->db->get();
        return $result = $query->result_array();
	}

	/* get  records by multi condition */
	public function getOrderList($product_ids = 999999, $shop_ids = 999999, $buyer_name = 999999, $buyer_phone = 999999, $delivery_type = 9, $buy_type = 9) {

		$str = "SELECT * FROM orders";

		if(count($product_ids) != 0){
			if(count($product_ids) > 1){
				$product_ids = implode(",", $product_ids);
				$str .= " WHERE product_id IN (" . $product_ids . ")";
			} else {
				$str .= " WHERE product_id=" . $product_ids[0];
			}
		} else {
			$str .= " WHERE product_id=99999999";
		}

		if(count($shop_ids) != 0){
			if(count($shop_ids)>1){
				$shop_ids = implode(",", $shop_ids);
				$str .= " AND shop_id IN (" . $shop_ids . ")";
			} else {
				$str .= " AND shop_id=" . $shop_ids[0];
			}
		} else {
			$str .= " AND shop_id=99999999";			
		}

		if($buyer_name != ''){
			$str .= " AND buyer_name LIKE " . "'%" . $buyer_name . "%'";
		} 

		if($buyer_phone != ''){
			$str .= " AND buyer_phone LIKE " . "'%" . $buyer_phone . "%'";
		} 

		if($delivery_type != ''){
			$str .= " AND delivery_type=" . $delivery_type;
		} 
		
		if($buy_type != ''){
			$str .= " AND buy_type=" . $buy_type;
		} 
		
		$str .= ";";
		$query = $this->db->query($str);
		return $query->result_array();
	}
}