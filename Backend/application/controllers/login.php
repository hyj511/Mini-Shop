<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* This is the controller for user login.
* @author : kmr
* @created_at: 2017/6/23
*/

class Login extends CI_Controller {

	/* constructor */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('shop_model');
        $this->load->model('admin_model');
        $this->load->library('encrypt');
	}

    /* the function to render login page*/
	public function index()
	{			
		$this->load->view('login_view');
	}

    /* the function to register new general administrator*/
	public function register()
	{		        
		$this->load->model('admin_model');

        $admin_name = $this->input->post('admin_name');
        $admin_pwd = $this->input->post('admin_pwd');
		$admin_email = $this->input->post('admin_email');
		$data = array(
			'admin_name' => $admin_name, 
			'admin_pwd' =>  sha1($admin_pwd),
            'admin_email' => $admin_email,
            'admin_role' => 2
		);
		$result = $this->admin_model->add($data);
		echo json_encode($data);
	}

    /* the function to register new general administrator*/
	public function login_accept()
	{		    
        $admin_name = $this->input->post('admin_name');
        $admin_pwd = $this->input->post('admin_pwd');			
		$result = $this->admin_model->getShopByName($admin_name);
        if($result) {
            if($result[0]['admin_pwd'] == sha1($admin_pwd)) {
                $this->session->set_userdata('loggedin', 1);
                $this->session->set_userdata('admin_role', $result[0]['admin_role']);
                echo json_encode(1);
            }            
        } else {
            echo json_encode(2);
        }        
    }

	/* the function to logout */
	public function logout()
	{
        $this->session->unset_userdata('loggedin');
        $this->session->unset_userdata('admin_role');
		$this->session->unset_userdata('tab_status');
        
    	$this->session->sess_destroy();
    	$this->load->driver('cache');
    	$this->cache->clean();
    	redirect('login', 'refresh');
	}
}