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
	}

	/* the function to render home page*/
	public function index()
	{
		if($this->logged == 1) {
			$shop_list = $this->shop_model->getAll();
			$admin_list = $this->admin_model->getAll();
			$data['admin_list'] = $admin_list;
			$data['shop_list'] = $shop_list;
			$data['product_list'] = array();		
			$this->load->view('home_view', $data);
		} else {			
			redirect('login','refresh');		
		}
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
		//print_r(array_values($result[0]));exit;
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
	
}
