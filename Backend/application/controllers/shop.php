<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * This is the controller for shop.
 * @author : kmr
 * @created_at: 2017/7/3
 */
class Shop extends CI_Controller {

    /* constructor */
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('shop_model');	
	}

	/* the function to get all shop*/
	public function getall()
	{
		$result = $this->shop_model->getAll();
		echo json_encode($result);
	}

	/* the function to insert new shop*/
	public function add_shop()
	{
		$shop_name = $this->input->post('shop_name');
		$shop_address = $this->input->post('shop_address');
		$shop_phone = $this->input->post('shop_phone');
		$data = array(
			'shop_name' => $shop_name, 
			'shop_address' => $shop_address,
			'shop_phone' => $shop_phone
		);
		$result = $this->shop_model->add($data);
		echo json_encode($result);
	}

	/* the function to delete a shop*/
	public function delete_shop()
	{
		$shop_id = $this->input->post('shop_id');		
		$result = $this->shop_model->delete($shop_id);
		echo json_encode($result);
	}

	/* the function to get a shop by shop id*/
	public function getshop()
	{
		$shop_id = $this->input->post('shop_id');		
		$result = $this->shop_model->getShopById($shop_id);
		echo json_encode($result[0]);
	}

	/* the function to update the shop*/
	public function updateshop()
	{
		$shop_id = $this->input->post('shop_id');
		$shop_name = $this->input->post('shop_name');
		$shop_address = $this->input->post('shop_address');
		$shop_phone = $this->input->post('shop_phone');
		$data = array(
			'shop_name' => $shop_name, 
			'shop_address' => $shop_address,
			'shop_phone' => $shop_phone
		);
		$result = $this->shop_model->update($shop_id, $data);
		echo json_encode($result);
	}
}