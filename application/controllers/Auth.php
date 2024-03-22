<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Auth_model');
		$this->load->model('M_admin');
	}

	public function index()
	{

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'login';
			$this->load->view('login/index', $data);
		} else {
			// validasinya success
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email', true);
		$password = $this->input->post('password', true);

		$usr = $this->M_admin->email_get($email);

		if($usr){
			$hassed = $usr->password;
			$hashed_password = md5($password);

			if($hassed === $hashed_password){
				$checkSession = $this->Auth_model->createSession($usr->id_admin);
				if($checkSession) {
					redirect('Admin');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Session expired.. </div>');
					redirect('Auth');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Incorect!</div>');
				redirect('Auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
			redirect('Auth');
		}
	}
}
