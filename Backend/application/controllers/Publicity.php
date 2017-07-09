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
        $this->load->model('shop_model');	
        $this->load->model('publicity_model');
	}

    public function index()
    {        
        $shop_list = $this->shop_model->getAll();
        $publicity_list = $this->publicity_model->getAll();
        $data['shop_list'] = $shop_list;
        $data['publicity_list'] = $publicity_list;
        $this->load->view('publicity', $data);
    }

    public function add()
    {
        $publicity_shop = $this->input->post('publicity_shop');
        $start_time = $this->input->post('start_time');
        $end_time = $this->input->post('end_time');
        $data = array(
			'shop_id' => $publicity_shop, 
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
        $publicity_shop = $this->input->post('publicity_shop');
        $start_time = $this->input->post('start_time');
        $end_time = $this->input->post('end_time');
        $data = array(
			'shop_id' => $publicity_shop, 
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
        $config['max_filename'] = 'default.jpg';
        //$config['encrypt_name'] = TRUE;
        $config['max_size'] = '10240'; //1 MB
 
        if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo '2';
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
				     echo '1';
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo '2';//$this->upload->display_errors();
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
		$publicity_id = $this->input->post('publicity_id');
		$img_url = $this->input->post('img_url');	
		$data = array(
			'imgurl' => $img_url
		);
		$result = $this->publicity_model->update($publicity_id, $data);
		echo json_encode($result);
	}
}