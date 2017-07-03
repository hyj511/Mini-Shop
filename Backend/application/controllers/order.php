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
			//'order_time' => new DateTime()
		);
		$result = $this->order_model->add($data);
		echo json_encode($result);
	}
}