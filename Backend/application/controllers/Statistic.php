<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * This is the controller for home page.
 * @author : kmr
 * @created_at: 2017/7/3
 */
class Statistic extends CI_Controller {

    protected $logged;
    protected $role;

    /* constructor */
	public function __construct()
	{
		parent::__construct();	

        $this->logged = $this->session->userdata('loggedin');
		$this->role = $this->session->userdata('admin_role');	

		$this->load->model('product_model');
		$this->load->model('file_model');
		$this->load->model('order_model');
        $this->load->model('shop_model');
	}
	
	/* the function to render product page*/
	public function index()
	{
		if($this->logged == 1) {
			$product_name = $this->input->post('product_name');
            $shop_name = $this->input->post('shop_name');
            $delivery_type = $this->input->post('delivery_type');
            $start_time = $this->input->post('order_time_from');
            $end_time = $this->input->post('order_time_to');

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
               
            $statistic_list = $this->product_model->getProductList($product_ids, $shop_ids);
            //$statistic_list = $this->product_model->getProductsByName($product_name);

            foreach($statistic_list as $key=>$statistic) {
                // calculate sales volume and pay amount of the each product
                $order_list = $this->order_model->getOrderByProductId($statistic['id']);
                $sales_volume = 0;
                $pay_amount = 0;
                $refund_count = 0;
                foreach($order_list as $order) {
                    if($delivery_type == 0) {
                        if($order['pay_state'] == 5){
                            $sales_volume += $order['order_amount'];
                            $pay_amount += $order['pay_amount'];
                        }
                        if($order['pay_state'] == 8){
                            $refund_count += $order['order_amount'];
                        }
                    } else {
                        if($order['pay_state'] == 5 && $order['delivery_type'] == $delivery_type){
                            $sales_volume += $order['order_amount'];
                            $pay_amount += $order['pay_amount'];
                        }
                        if($order['pay_state'] == 8 && $order['delivery_type'] == $delivery_type){
                            $refund_count += $order['order_amount'];
                        }
                    }
                    
                }
                // get order amount of the each product
                $order_count = count($this->order_model->getOrderByProductAndDelivery($statistic['id'], $delivery_type));                

                $statistic_list[$key]['sales_volume'] = $sales_volume;
                $statistic_list[$key]['pay_amount'] = $pay_amount;
                $statistic_list[$key]['order_count'] = $order_count;
                $statistic_list[$key]['refund_count'] = $refund_count;
            }       

            $data['product_name'] = $product_name;	
            $data['shop_name'] = $shop_name;
            $data['delivery_type'] = $delivery_type;
            $data['statistic_list'] = $statistic_list;	

			$this->load->view('statistic', $data);
		} else {			
			redirect('login','refresh');		
		}
	}  
}