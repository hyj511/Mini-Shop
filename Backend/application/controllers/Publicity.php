<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * This is the controller for administrator.
 * @author : kmr
 * @created_at: 2017/7/3
 */
class Publicity extends CI_Controller {

    /* constructor */
	public function __construct()
	{
		parent::__construct();	
        $this->load->model('product_model');	
        $this->load->model('publicity_model');
	}

    public function index()
    {        
        $product_list = $this->product_model->getAll();
        $publicity_list = $this->publicity_model->getAll();

        foreach($publicity_list as $key=>$value) {
            $product = $this->product_model->getProductById($value['product_id']);
            if($product){
                $publicity_list[$key]['product_name'] = $product[0]['name'];
            } else {
                $publicity_list[$key]['product_name'] = '';
            }
        }

        $data['product_list'] = $product_list;
        $data['publicity_list'] = $publicity_list;
        $this->load->view('publicity', $data);
    }

    public function add()
    {
        $publicity_product = $this->input->post('publicity_product');
        $start_time = $this->input->post('start_time');
        $end_time = $this->input->post('end_time');
        $data = array(
			'product_id' => $publicity_product, 
			'starttime' => date('Y-m-d H:i:s', strtotime($start_time)),
            'endtime' => date('Y-m-d H:i:s', strtotime($end_time))
		);
		$result = $this->publicity_model->add($data);
		echo json_encode($result);
    }

	public function get()
	{
		$publicity_id = $this->input->post('publicity_id');		
		$result = $this->publicity_model->getPublicityById($publicity_id);
		echo json_encode($result[0]);
	}

    public function update()
    {
        $publicity_id = $this->input->post('publicity_id');
        $publicity_product = $this->input->post('publicity_product');
        $start_time = $this->input->post('start_time');
        $end_time = $this->input->post('end_time');
        $data = array(
			'product_id' => $publicity_product, 
			'starttime' => date('Y-m-d H:i:s', strtotime($start_time)),
            'endtime' => date('Y-m-d H:i:s', strtotime($end_time))
		);
		$result = $this->publicity_model->update($publicity_id, $data);
		echo json_encode($result);
    }

	public function delete()
	{
		$publicity_id = $this->input->post('publicity_id');		
		$result = $this->publicity_model->delete($publicity_id);
		echo json_encode($result);
	}

    // upload thumb image
	public function do_upload()
	{       

        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = '*';		        
		$config['overwrite'] = TRUE;
        $config['max_filename'] = 'default.png';
        //$config['encrypt_name'] = TRUE;
        $config['max_size'] = '10240'; //1 MB
  
        if (isset($_FILES['file']['name'])) {

            $filename = $_FILES["file"]["name"];
            $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
            $file_ext = substr($filename, strripos($filename, '.')); // get file name
            // Rename file
	        $newfilename = $this->generateFileName() . $file_ext;

            
            if (0 < $_FILES['file']['error']) {
                echo '2';
            } else {                
                if (file_exists('uploads/' . $newfilename)) {
				     echo '1';
                } else {
                    move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $newfilename);
                    echo $newfilename;
                    // $this->load->library('upload', $config);
                    // if (!$this->upload->do_upload('file')) {
                    //     echo '2';//$this->upload->display_errors();
                    // } else {
                    //     echo $_FILES['file']['name'];
                    // }
                }
            }
        } else {
            echo 'default.png';
        }
	}

    // save image url
	public function save_url()
	{
		$publicity_id = $this->input->post('publicity_id');
		$img_url = $this->input->post('img_url');	
		$data = array(
			'imgurl' => $img_url
		);
		$result = $this->publicity_model->update($publicity_id, $data);
		echo json_encode($result);
	}

    public function generateFileName() {
        $date = new DateTime();
        return $date->getTimestamp();
    }
}