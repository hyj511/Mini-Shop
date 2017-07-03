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
		$group_num = $this->input->post('group_num');
		$group_price = $this->input->post('group_price');
		$group_time = $this->input->post('group_time');
		$data = array(
			'name' => $product_name, 
			'description' => $product_description,
			'category' => $product_category, 
			'classification' => $product_classification,
			'origin_price' => $product_origin_price, 
			'promotion_price' => $product_promotion_price,
			'inventory' => $product_inventory, 
			'express_fee' => $product_express_fee,
			'group_num' => $group_num,
			'group_price' => $group_price,
			'group_time' => $group_time
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
		$group_num = $this->input->post('group_num');
		$group_price = $this->input->post('group_price');
		$group_time = $this->input->post('group_time');
		$data = array(
			'name' => $product_name, 
			'description' => $product_description,
			'category' => $product_category, 
			'classification' => $product_classification,
			'origin_price' => $product_origin_price, 
			'promotion_price' => $product_promotion_price,
			'inventory' => $product_inventory, 
			'express_fee' => $product_express_fee,
			'group_num' => $group_num,
			'group_price' => $group_price,
			'group_time' => $group_time
		);
		$result = $this->product_model->update($product_id, $data);
		echo json_encode($result);
	}

	// upload image file
	public function do_upload()
	{
		//upload file
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = '*';
        $config['max_filename'] = $_FILES['file']['name'];
		$config['overwrite'] = TRUE;
        //$config['encrypt_name'] = TRUE;
        $config['max_size'] = '1024'; //1 MB
 
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
            echo '2';
        }
	}

	// save image url
	public function save_url()
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

	// get all category
	public function get_category ()
	{
		$result = $this->product_model->getAllCategory();
		echo json_encode($result);
	}

	/***************************/
	/*          API            * 
	/***************************/ 

	// get all products by category
	public function getall() 
	{
		$category = $this->input->post('category');
		$result = $this->product_model->getByCategory($category);
		echo json_encode($result);
	}

	// get product infomation in detail (with image url)
	public function detail()
	{
		$product_id = $this->input->post('product_id');
		$result = $this->product_model->getProductById($product_id);
		$urls = $this->file_model->getUrlByProductId($product_id);
		$images = array();
		foreach($urls as $value) {
			array_push($images, $value['img_url']);
		}
		$result[0]['images'] = $images;
		echo json_encode($result[0]);
	}

}