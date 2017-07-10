<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * This is the controller for home page.
 * @author : kmr
 * @created_at: 2017/7/3
 */
class Product extends CI_Controller {

    /* constructor */
	public function __construct()
	{
		parent::__construct();	

		$this->load->model('product_model');
		$this->load->model('file_model');
		$this->load->model('order_model');
	}
	
	/* the function to render product page*/
	public function index()
	{
		$catetory_id = $this->input->post('catetory_id');

		if($this->logged == 1) {
			$product_list = $this->product_model->getByCategory($catetory_id);		
			$data['product_list'] = $product_list;			

			$this->load->view('product', $data);
		} else {			
			redirect('login','refresh');		
		}
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
			'originPrice' => $product_origin_price, 
			'promotionPrice' => $product_promotion_price,
			'inventory' => $product_inventory, 
			'expressFee' => $product_express_fee
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
		$covers = $this->file_model->getUrlByProductId($product_id);
		$cover_imgs = array();
		foreach($covers as $key=>$value){
			array_push($cover_imgs, $value['img_url']);
		}
		$result[0]['covers'] = $cover_imgs;
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
			'originPrice' => $product_origin_price, 
			'promotionPrice' => $product_promotion_price,
			'inventory' => $product_inventory, 
			'expressFee' => $product_express_fee			
		);
		$result = $this->product_model->update($product_id, $data);
		echo json_encode($result);
	}

	// upload thumb image
	public function do_upload()
	{
		if(isset($_FILES['file']['name'])) {
			$file_name = explode(".", $_FILES['file']['name']);
			$file_extension = $file_name[1];
			$config['max_filename'] = $_FILES['file']['name'];//$this->genFileName().'.'.$file_extension;// $_FILES['file']['name'];
		} else {
			$config['max_filename'] = 'default.jpg';
		}		

		//upload file
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = '*';		        
		$config['overwrite'] = TRUE;
        //$config['encrypt_name'] = TRUE;
        $config['max_size'] = '10240'; //1 MB
 
        if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
				     echo '1';
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo $_FILES['file']['name'];
                    }
                }
            }
        } else {
            echo 'default.jpg';
        }
	}

	// save image url
	public function save_url()
	{
		$product_id = $this->input->post('product_id');
		$img_url = $this->input->post('img_url');	
		$data = array(
			'imageUrl' => $img_url
		);
		$result = $this->product_model->update($product_id, $data);
		echo json_encode($result);
	}

	// upload thumb image
	public function do_upload_cover()
	{
		if(isset($_FILES['file']['name'])) {			
			$config['max_filename'] = $_FILES['file']['name'];
		} else {
			$config['max_filename'] = 'default.jpg';
		}		

		//upload file
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = '*';		        
		$config['overwrite'] = TRUE;
        //$config['encrypt_name'] = TRUE;
        $config['max_size'] = '10240'; //1 MB
 
        if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
				     echo '1';
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo $_FILES['file']['name'];
                    }
                }
            }
        } else {
            echo 'default.jpg';
        }
	}

	// save image url
	public function save_url_cover()
	{
		$product_id = $this->input->post('product_id');
		$img_url = $this->input->post('img_url');
		$data = array(
			'product_id' => $product_id, 
			'img_url' => $img_url
		);
		$result = $this->file_model->add($data);
		echo json_encode($result);			
	}

	//generate file name by datetime
	protected function genFileName()
	{
		$date = new DateTime();
		$filename = $date->getTimestamp();
		echo $filename;
	}

	// get all category
	public function get_category ()
	{
		$result = $this->product_model->getAllCategory();
		echo json_encode($result);
	}

	/* the function to get a category by category id*/
	public function getcategory()
	{
		$category_id = $this->input->post('category_id');		
		$result = $this->product_model->getCategoryById($category_id);
		echo json_encode($result[0]);
	}

	/* the function to insert new category*/
	public function add_category()
	{
		$category_name = $this->input->post('category_name');
		
		$data = array(
			'name' => $category_name			
		);

		$result = $this->product_model->addCategory($data);

		echo json_encode($result);
	}

	/* the function to update the category*/
	public function updatecategory()
	{
		$category_id = $this->input->post('category_id');
		$category_name = $this->input->post('category_name');		
		$data = array(
			'name' => $category_name			
		);
		$result = $this->product_model->updateCategory($category_id, $data);
		echo json_encode($result);
	}

	/* the function to delete a category*/
	public function deletecategory()
	{
		$category_id = $this->input->post('category_id');		
		$result = $this->product_model->deletecategory($category_id);
		echo json_encode($result);
	}

	/***************************/
	/*                          * 
	/***************************/ 

	// get all products by category
	public function getall() 
	{
		$category = $this->input->post('category');
		$result = $this->product_model->getByCategory($category);
		foreach($result as $key=>$value) {
			$result[$key]['imageUrl'] = $this->config->base_url().'uploads/'.$value['imageUrl'];
		}
		echo json_encode($result);
	}

	// get product infomation in detail (with image url)
	public function detail()
	{
		$product_id = $this->input->post('product_id');
		$result = $this->product_model->getProductById($product_id);
		echo json_encode($result);
	}

	// get images for a product
	public function getimgs()
	{
		$product_id = $this->input->post('product_id');
		$urls = $this->file_model->getUrlByProductId($product_id);
		$images = array();
		foreach($urls as $key=>$value) {
			$images[$key]['id'] = $value['id'];
			$images[$key]['imgUrl'] = $this->config->base_url().'uploads/'.$value['img_url'];
		}
		echo json_encode($images);
	}

	/*************************/
	/* Group Buy              /
	/*************************/

	// get group buy infomation
	public function getgroup()
	{
		$product_id = $this->input->post('product_id');
		$group = $this->product_model->getGroupByProductId($product_id);
		$group_members = $this->order_model->getOrderByGroupId($group[0]['id']);
		$result = array();
		$result['members'] = $group_members;
		$result['number'] = $group[0]['number'];
		$result['price'] = $group[0]['price'];
		$result['endtime'] = $group[0]['endtime'];
		$result['starttime'] = $group[0]['starttime'];
		$result['id'] = $group[0]['id'];
		echo json_encode($result);
	}

	/* the function to insert new group*/
	public function addgroup()
	{
		$group_num = $this->input->post('group_num');
		$group_price = $this->input->post('group_price');
		$group_time = $this->input->post('group_time');
		$product_id = $this->input->post('product_id');
		$data = array(			
			'number' => $group_num,
			'price' => $group_price,
			'endtime' => $group_time,
			'starttime' => date('Y-m-d H:i:s'),
			'product_id' => $product_id
		);

		$result = $this->product_model->addGroup($data);

		echo json_encode($result);
	}

	/* the function to update the product*/
	public function updategroup()
	{
		$group_id = $this->input->post('group_id');
		$group_num = $this->input->post('group_num');
		$group_price = $this->input->post('group_price');
		$group_time = $this->input->post('group_time');
		$product_id = $this->input->post('product_id');
		$data = array(
			'number' => $group_num,
			'price' => $group_price,
			'endtime' => $group_time,
			'starttime' => date('Y-m-d H:i:s'),
		);
		$result = $this->product_model->updateGroup($group_id, $data);
		echo json_encode($result);
	}
}