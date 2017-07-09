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
				$group_buy = $this->product_model->getGroupByProductId($product['id']);
				$product_list[$key]['category'] = $category[0]['name'];
				if($group_buy) {
					$product_list[$key]['group_number'] = $group_buy[0]['number'];
					$product_list[$key]['group_price'] = $group_buy[0]['price'];
					$product_list[$key]['group_time'] = $group_buy[0]['endtime'];
				} else {
					$product_list[$key]['group_number'] = '';
					$product_list[$key]['group_price'] = '';
					$product_list[$key]['group_time'] = '';
				}
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
				if($value['delivery_type'] == 0){
					$order_list[$key]['delivery_type'] = '自提';
				} else {
					$order_list[$key]['delivery_type'] = '发货';
				}	
				// buy type
				if($value['buy_type'] == 0){
					$order_list[$key]['buy_type'] = '立即购买';
				} else {
					$order_list[$key]['buy_type'] = '拼团';
				}	
				// pay state
				switch($order_list[$key]['pay_state']){
					case 0: $order_list[$key]['pay_state'] = '未支付'; break;
					case 1: $order_list[$key]['pay_state'] = '拼团中'; break;
					case 2: $order_list[$key]['pay_state'] = '拼团失败'; break;
					case 3: $order_list[$key]['pay_state'] = '拼团成功'; break;					
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
				// group buy remaining time	
				/*if($value['group_id'] != null){
					$group = $this->product_model->getGroupById($value['group_id']);
					if($group){
						$group_start_time = date('Y-m-d H:i:s', strtotime($group[0]['starttime']));
						$order_list[$key]['groupTime'] = $group_start_time;
					}
				} else {
					$order_list[$key]['groupTime'] = '';
				}	*/				
			}	
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
