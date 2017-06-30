<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * This is the controller for home page.
 * @author : kmr
 * @created_at: 2017/6/23
 */
class Home extends CI_Controller {

	protected $logged;
    protected $role;

	/* constructor */
	public function __construct()
	{
		parent::__construct();
		$this->logged = $this->session->userdata('loggedin');
		$this->role = $this->session->userdata('admin_role');		
		
		$this->load->model('shop_model');
		$this->load->model('admin_model');
		$this->load->model('product_model');
	}

	/* the function to render home page*/
	public function index()
	{
		if($this->logged == 1) {
			$shop_list = $this->shop_model->getAll();
			$admin_list = $this->admin_model->getAll();
			$product_list = $this->product_model->getAll();

			$data['admin_list'] = $admin_list;
			$data['shop_list'] = $shop_list;
			$data['product_list'] = $product_list;

			$this->load->view('home_view', $data);
		} else {			
			redirect('login','refresh');		
		}
	}

	// set tab status
	public function settab() 
	{
		$id = $this->input->get('id');
		$this->session->set_userdata('tab_status', $id);
	}

	/* the function to insert new shop*/
	public function add_shop()
	{
		$shop_name = $this->input->post('shop_name');
		$shop_address = $this->input->post('shop_address');
		$data = array(
			'shop_name' => $shop_name, 
			'shop_address' => $shop_address
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
		$data = array(
			'shop_name' => $shop_name, 
			'shop_address' => $shop_address
		);
		$result = $this->shop_model->update($shop_id, $data);
		echo json_encode($result);
	}

	/* the function to delete a user*/
	public function deleteuser()
	{
		$admin_id = $this->input->post('admin_id');		
		$result = $this->admin_model->delete($admin_id);
		echo json_encode($result);
	}
	
	/* the function to insert new product*/
	public function addproduct()
	{
		$product_name = $this->input->post('product_name');
		$product_description = $this->input->post('product_description');
		$product_category = $this->input->post('product_category');
		$product_classification = $this->input->post('product_classification');
		$product_origin_price = $this->input->post('product_origin_price');
		$product_promotion_price = $this->input->post('product_promotion_price');
		$product_inventory = $this->input->post('product_inventory');
		$product_express_fee = $this->input->post('product_express_fee');
		$data = array(
			'name' => $product_name, 
			'description' => $product_description,
			'category' => $product_category, 
			'classification' => $product_classification,
			'origin_price' => $product_origin_price, 
			'promotion_price' => $product_promotion_price,
			'inventory' => $product_inventory, 
			'express_fee' => $product_express_fee,
		);
		$result = $this->product_model->add($data);
		echo json_encode($result);
	}

	/* the function to delete a product*/
	public function deleteproduct()
	{
		$product_id = $this->input->post('product_id');		
		$result = $this->product_model->delete($product_id);
		echo json_encode($result);
	}

	/* the function to get a product by product id*/
	public function getproduct()
	{
		$product_id = $this->input->post('product_id');		
		$result = $this->product_model->getProductById($product_id);
		echo json_encode($result[0]);
	}

	/* the function to update the product*/
	public function updateproduct()
	{
		$product_id = $this->input->post('product_id');
		$product_name = $this->input->post('product_name');
		$product_description = $this->input->post('product_description');
		$product_category = $this->input->post('product_category');
		$product_classification = $this->input->post('product_classification');
		$product_origin_price = $this->input->post('product_origin_price');
		$product_promotion_price = $this->input->post('product_promotion_price');
		$product_inventory = $this->input->post('product_inventory');
		$product_express_fee = $this->input->post('product_express_fee');
		$data = array(
			'name' => $product_name, 
			'description' => $product_description,
			'category' => $product_category, 
			'classification' => $product_classification,
			'origin_price' => $product_origin_price, 
			'promotion_price' => $product_promotion_price,
			'inventory' => $product_inventory, 
			'express_fee' => $product_express_fee,
		);
		$result = $this->product_model->update($product_id, $data);
		echo json_encode($result);
	}
}
