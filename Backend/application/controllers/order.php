<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * This is the controller for order.
 * @author : kmr
 * @created_at: 2017/7/3
 */
class Order extends CI_Controller {

    /* constructor */
	public function __construct()
	{
		parent::__construct();		
		$this->load->model('order_model');
		$this->load->model('product_model');
		$this->load->model('shop_model');
	}

	// add new order
	public function add() 
	{
		$product_id = $this->input->post('product_id');
		$order_amount = $this->input->post('order_amount');
        $buyer_name = $this->input->post('buyer_name');
		$buyer_phone = $this->input->post('buyer_phone');
		$buy_type = $this->input->post('buy_type');
		$shop_id = $this->input->post('shop_id');
		$pay_amount = $this->input->post('pay_amount');
		$delivery_type = $this->input->post('delivery_type');
		$buyer_address = $this->input->post('buyer_address');
		//$now = new DateTime();
		$data = array(
			'product_id' => $product_id, 
			'order_amount' => $order_amount,
            'buyer_name' => $buyer_name,
            'buyer_phone' => $buyer_phone,
			'buy_type' => $buy_type, 
			'shop_id' => $shop_id,
            'pay_amount' => $pay_amount,
            'delivery_type' => $delivery_type,
			'buyer_address' => $buyer_address,
			'order_time' => date('Y-m-d H:i:s')
		);
		$result = $this->order_model->add($data);
		echo json_encode($result);
	}

	/* the function to get a order by order id*/
	public function getorder()
	{
		$order_id = $this->input->post('order_id');		
		$result = $this->order_model->getOrderById($order_id);
		$product = $this->product_model->getProductById($result[0]['product_id']);
		if($product){
			$result[0]['product_name'] = $product[0]['name'];
		}		
		echo json_encode($result[0]);
	}

	// get remain times
	public function getremaintime()
	{
		$order_id = $this->input->post('order_id');		
		$result = $this->order_model->getOrderById($order_id);	
		if($result){
			if($result[0]['group_id'] != null){
				$group = $this->product_model->getGroupById($result[0]['group_id']);
				echo json_encode($group);
			}
		} else {
			echo '23';
		}		
	}

	// get remain times
	public function checkOwnGroup()
	{
		$order_id = $this->input->post('order_id');		
		$result = $this->order_model->getOrderById($order_id);	
		if($result){
			if($result[0]['group_id'] != null){
				echo '1';
			}
		} else {
			echo '2';
		}		
	}

	// multi search
	public function getOrderList()
	{
		$product_name = $this->input->post('product_name');
		$shop_name = $this->input->post('shop_name');
		$buyer_name = $this->input->post('buyer_name');
		$buyer_phone = $this->input->post('buyer_phone');
		$delivery_type = $this->input->post('delivery_type');
		$buy_type = $this->input->post('buy_type');
		$order_state = $this->input->post('order_state');

		// search box
		$data = array();		

		$products = $this->product_model->getProductsByName($product_name);
		$shops = $this->shop_model->getShopByName($shop_name);
		
		$product_ids = array();
		foreach($products as $value) {			
			array_push($product_ids, $value['id']);
		}
		$shop_ids = array();
		foreach($shops as $value) {			
			array_push($shop_ids, $value['id']);
		}

		$order_list = $this->order_model->getOrderList($product_ids, $shop_ids, $buyer_name, $buyer_phone, $delivery_type, $buy_type, $order_state);
		
		foreach($order_list as $key=>$value){
				$product = $this->product_model->getProductById($value['product_id']);
				$shop = $this->shop_model->getShopById($value['shop_id']);
				// product name
				if($product){
					$order_list[$key]['product_id'] = $product[0]['name'];
				} else {
					$order_list[$key]['product_id'] = '';
				}
				// shop name
				if($shop){
					$order_list[$key]['shop_name'] = $shop[0]['shop_name'];
				} else {
					$order_list[$key]['shop_name'] = '';
				}
				// delivery type
				if($value['delivery_type'] == 1){
					$order_list[$key]['delivery_type'] = '自提';
				} else {
					$order_list[$key]['delivery_type'] = '发货';
				}	
				// buy type
				if($value['buy_type'] == 1){
					$order_list[$key]['buy_type'] = '立即购买';
				} else {
					$order_list[$key]['buy_type'] = '拼团';
				}	
				// pay state
				switch($order_list[$key]['pay_state']){
					case 1: $order_list[$key]['pay_state'] = '未支付'; break;
					case 2: $order_list[$key]['pay_state'] = '拼团中'; break;
					case 3: $order_list[$key]['pay_state'] = '拼团失败'; break;
					case 4: $order_list[$key]['pay_state'] = '拼团成功'; break;	
					case 5: $order_list[$key]['pay_state'] = '已完结'; break;
					case 6: $order_list[$key]['pay_state'] = '申请退款'; break;
					case 7: $order_list[$key]['pay_state'] = '退款处理中'; break;
					case 8: $order_list[$key]['pay_state'] = '退款完成'; break;					
				}
				// group count	
				if($value['group_id'] != null){
					$group = $this->product_model->getGroupById($value['group_id']);
					if($group){
						$order_list[$key]['groupCount'] = $group[0]['count'];
					}
				} else {
					$order_list[$key]['groupCount'] = '';
				}								
			}	
			
			$data['search_product_name'] = $product_name;
			$data['serch_shop_name'] = $shop_name;
			$data['serch_buyer_name'] = $buyer_name;
			$data['serch_buyer_phone'] = $buyer_phone;
			$data['search_delivery_type'] = $delivery_type;
			$data['search_buy_type'] = $buy_type;
			$data['search_order_state'] = $order_state;

			$data['order_list'] = $order_list;			
			$this->load->view('order', $data);
		
		//$data['order_list'] = $order_list;	
		//$this->load->view('order', $data);
		//echo json_encode($order_list);
	}
}