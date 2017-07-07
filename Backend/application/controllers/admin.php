<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * This is the controller for administrator.
 * @author : kmr
 * @created_at: 2017/7/3
 */
class Admin extends CI_Controller {

    /* constructor */
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('admin_model');
	}

    /* the function to insert new administrator*/
	public function add()
	{
		$admin_name = $this->input->post('admin_name');
		$admin_email = $this->input->post('admin_email');
        $admin_shop = $this->input->post('admin_shop');
		$admin_role = $this->input->post('admin_role');
		$data = array(
			'admin_name' => $admin_name, 
			'admin_email' => $admin_email,
            'shop' => $admin_shop,
            'admin_role' => $admin_role
		);
		$result = $this->admin_model->add($data);
		echo json_encode($result);
	}

    /* the function to update the administrator*/
	public function update()
	{
		$admin_id = $this->input->post('admin_id');
		$admin_name = $this->input->post('admin_name');
		$admin_email = $this->input->post('admin_email');
        $admin_shop = $this->input->post('admin_shop');
		$admin_role = $this->input->post('admin_role');
		$data = array(
			'admin_name' => $admin_name, 
			'admin_email' => $admin_email,
            'shop' => $admin_shop,
			'admin_role' => $admin_role
		);
		$result = $this->admin_model->update($admin_id, $data);
		echo json_encode($result);
	}

    /* the function to get a administrator by admin id*/
	public function getadmin()
	{
		$admin_id = $this->input->post('admin_id');		
		$result = $this->admin_model->getAdminById($admin_id);
		echo json_encode($result[0]);
	}

	/* the function to delete a user*/
	public function deleteuser()
	{
		$admin_id = $this->input->post('admin_id');		
		$result = $this->admin_model->delete($admin_id);
		echo json_encode($result);
	}
}