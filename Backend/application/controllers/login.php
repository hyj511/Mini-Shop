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
	public function postLogin()
	{		    
        $admin_name = $this->input->post('login_name');
        $admin_pwd = $this->input->post('login_pwd');			
		$result = $this->admin_model->getAdminByName($admin_name);
        if($result) {
            if($result[0]['admin_pwd'] == sha1($admin_pwd)) {
                $this->session->set_userdata('loggedin', 1);
                $this->session->set_userdata('admin_role', $result[0]['admin_role']);
                //echo json_encode(1);
				redirect('home');
            }            
        } else {
            //echo json_encode(2);
			redirect('login');
        }        
    }

	// forgot password
	public function forgot()
	{
		$this->load->view('forgot');
	}

	// forgot password
	public function forgot_accept()
	{
		$email = $this->input->post('forgot_email');
		$name = $this->input->post('forgot_name');
		$result = $this->admin_model->getAdminByName($name);
		if($email == $result[0]['admin_email']){
			// $new_password = 'abcd';
			// $subject = "Reset Password";

            // $data = array(
            //         "subject" => $subject,
            //         "login_url" => base_url("/login"),
            //         "new_password" => $new_password,
            //         "email" => $email
            // );
            // $data['content'] = $this->load->view('email_password_changed.php', $data, true);
            // $msg = $this->load->view('email_template_view.php', $data, true);

            // $config_email = $this->config->item('email');
            // $this->load->library('email', $config_email);

            // $this->email->from('promr124@gmail.com', '');
            // $this->email->to($email);
            // //$this->email->cc($this->session->userdata("report_email"));
            // $this->email->subject($subject);
            // $this->email->message($msg);
            // $this->email->send();
			$this->load->library('email');

			$this->email->from('promr124@gmail.com', 'Your Name');
			$this->email->to('daolin225@gmail.com');
			//$this->email->cc('another@another-example.com');
			//$this->email->bcc('them@their-example.com');

			$this->email->subject('Email Test');
			$this->email->message('Testing the email class.');

			$this->email->send();

		} else {			
			//redirect('','refresh');
		}
	}

	/* the function to logout */
	public function logout()
	{
        $this->session->unset_userdata('loggedin');
        $this->session->unset_userdata('admin_role');
        
    	$this->session->sess_destroy();
    	// $this->load->driver('cache');
    	// $this->cache->clean();
    	redirect('login', 'refresh');
	}
}