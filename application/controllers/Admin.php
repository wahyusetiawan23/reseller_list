<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	protected $arr  = '';
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->model('Auth_model');

		$current = $this->Auth_model->current();
		if (!$current) {
			redirect('Auth');
		}else{
			$this->arr = $current;
		}

		if(empty($this->arr)){
			redirect('Auth');
		}
	}

	public function index(){
		$data['users']		= $this->arr;
		$data['title']      = 'Reseller';
		$data['list']		= $this->M_admin->resellerList_get();
		$data['view_name']  = 'admin/reseller/index';
		$this->load->view('admin/templates/index', $data);
	}

	public function reseller_post(){
		$data['users']		= $this->arr;
		$data['title']      = 'Reseller';
		$data['country']	= $this->M_admin->country_get();
		$data['view_name']  = 'admin/reseller/add';
		$this->load->view('admin/templates/index', $data);
	}

	public function reseller_put($id){

		$check = $this->M_admin->resellerById_get($id);
		if($check){
			$data['users']		= $this->arr;
			$data['title']      = 'Reseller';
			$data['country']	= $this->M_admin->country_get();
			$data['list']		= $this->M_admin->resellerById_get($id);
			$data['view_name']  = 'admin/reseller/edit';
			$this->load->view('admin/templates/index', $data);
		}else{
			echo "something wrong!!!";
		}

	}


	public function resellerAjax_post(){
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$status  = true;


		$this->form_validation->set_rules('fname', 'Full name', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('company', 'company', 'trim|required');
		$this->form_validation->set_rules('address', 'address', 'trim|required');
		$this->form_validation->set_rules('country', 'country', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');

		if($this->form_validation->run() == false){
			$status  = false;
			$message = validation_errors();
		}else{
			$save = $this->M_admin->reseller_post();
			if($save){
				$message = 'suucess';
			}else{
				$message = 'gagal menyimpan data';
			}
		}
		echo json_encode([
			'status' => $status,
			'message'	=> $message
		]);
	}


	public function resellerAjax_put(){
		if (!$this->input->is_ajax_request()) {
				exit('No direct script access allowed');
		}

		$status  = true;

		$this->form_validation->set_rules('idInput', 'id Input', 'trim|required');
		$this->form_validation->set_rules('fname', 'Full name', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('company', 'company', 'trim|required');
		$this->form_validation->set_rules('address', 'address', 'trim|required');
		$this->form_validation->set_rules('country', 'country', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');

		if($this->form_validation->run() == false){
			$status  = false;
			$message = validation_errors();
		}else{
			$save = $this->M_admin->reseller_put();
			if($save){
				$message = 'success';
			}else{
				$message = 'gagal menyimpan data';
			}
		}
		echo json_encode([
			'status' => $status,
			'message'	=> $message
		]);
	}


	public function resellerStatusAjax_put(){
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$status  = true;
		$id = $this->input->post('id', true);
		$check = $this->M_admin->resellerById_get($id);
		if($check){
			$statusRES = $check->status;
			if($statusRES == 0){
				$statusRES = 1;
			}else{
				$statusRES = 0;
			}
			$update = $this->M_admin->resellerStatus_put($id, $statusRES);
			if($update){
				$message = 'success';
			}else{
				$message = 'gagal update data';
			}
		}else{
			$status = false;
			$message = 'failed update data';
		}
		echo json_encode([
			'status' => $status,
			'message'	=> $message
		]);
	}


	public function resellerAjax_del(){
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$status  = true;
		$id = $this->input->post('id', true);
		$check = $this->M_admin->resellerById_get($id);
		if($check){
			$delete = $this->M_admin->reseller_del($id);
			if($delete){
				$message = 'success';
			}else{
				$message = 'gagal hapus data';
			}
		}else{
			$status = false;
			$message = 'failed update data';
		}
		echo json_encode([
			'status' => $status,
			'message'	=> $message
		]);
	}


	public function logout()
	{
		$logout = $this->Auth_model->logout();
		if ($logout) {
			redirect('Auth');
		} else {
			$this->session->set_flashdata('flash-error', 'try again');
			redirect('Admin');
		}
	}
}
