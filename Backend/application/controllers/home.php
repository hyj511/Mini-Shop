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
			$admin_list = $this->admin_model->getAll();	
			$shop_list = $this->shop_model->getAll();
			$roles = $this->admin_model->getRoles();		
			foreach($admin_list as $key=>$admin) {
				$shop = $this->shop_model->getShopById($admin['shop']);
				$role = $this->admin_model->getRoleById($admin['admin_role']);
				$admin_list[$key]['shop'] = $shop[0]['shop_name'];
				$admin_list[$key]['admin_role'] = $role[0]['role_name'];
			}
			$data['admin_list'] = $admin_list;			
			$data['shop_list'] = $shop_list;
			$data['roles'] = $roles;
			$this->load->view('home', $data);
		} else {			
			redirect('login','refresh');		
		}
	}

	public function showShop ()
	{
		if($this->logged == 1) {
			$shop_list = $this->shop_model->getAll();		
			$data['shop_list'] = $shop_list;			
			$this->load->view('shop', $data);
		} else {			
			redirect('login','refresh');		
		}
	}

	public function showProduct ()
	{
		if($this->logged == 1) {
			$product_list = $this->product_model->getAll();	
			$category_list = $this->product_model->getAllCategory();	
			foreach($product_list as $key=>$product) {
				$category = $this->product_model->getCategoryById($product['category']);
				$product_list[$key]['category'] = $category[0]['name'];
			}
			$data['product_list'] = $product_list;		
			$data['category_list'] = $category_list;	
			$this->load->view('product', $data);
		} else {			
			redirect('login','refresh');		
		}
	}

	public function showOrder ()
	{
		if($this->logged == 1) {
			$order_list = $this->order_model->getAll();		
			$data['order_list'] = $order_list;			
			$this->load->view('order', $data);
		} else {			
			redirect('login','refresh');		
		}
	}	

	public function showCategory ()
	{
		if($this->logged == 1) {
			$category_list = $this->product_model->getAllCategory();		
			$data['category_list'] = $category_list;			
			$this->load->view('category', $data);
		} else {			
			redirect('login','refresh');		
		}
	}	
}
