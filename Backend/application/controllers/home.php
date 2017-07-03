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
		$this->load->model('order_model');
	}

	/* the function to render home page*/
	public function index()
	{
		if($this->logged == 1) {
			$shop_list = $this->shop_model->getAll();
			$admin_list = $this->admin_model->getAll();
			$product_list = $this->product_model->getAll();
			$category_list = $this->product_model->getAllCategory();
			$order_list = $this->order_model->getAll();

			$data['admin_list'] = $admin_list;
			$data['shop_list'] = $shop_list;
			$data['product_list'] = $product_list;
			$data['category_list'] = $category_list;
			$data['order_list'] = $order_list;

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
}
