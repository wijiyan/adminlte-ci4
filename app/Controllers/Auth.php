<?php

namespace App\Controllers;
use App\Models\AuthModel;

class Auth extends BaseController
{
	public function __construct() {
		$AuthModel = new AuthModel();
	}
	
	public function index() {
		//$session = $this->session->userdata('status');

		// if ($session == '') {
		// 	return view('login');
		// } else {
		// 	redirect('Dashboard');
		// }
		print_r($session);
	}

	public function login2() {
		//$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[90]');
		//$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE) {
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);

			$data = $AuthModel->login($username, $password);

			if ($data == false) {
				$this->session->set_flashdata('msg', show_err_msg('Username / Password Salah'));
				redirect('Auth');
			} else {
				$session = [
					'userdata' => $data,
					'status' => "Loged in"
				];
				$this->session->set_userdata($session);
				if($data->level == 'sasaran'){
					redirect('Dashboard/sasaran');
				}else if($data->level == 'admin'){
					redirect('Dashboard');
				}else if($data->level == 'pemantau'){
					redirect('Pemantauan');
				}else{
					$this->session->sess_destroy();
				}
				
			}
		} else {
			$this->session->set_flashdata('msg', show_succ_msg('Tidak Boleh Kosong'));
			redirect('Auth');
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('Auth');
	}

	public function login() {
		$data = $AuthModel->login($username, $password);

		if ($data == false) {
			$this->session->set_flashdata('msg', show_err_msg('Username / Password Salah'));
			redirect('Auth');
		} else {
			$session = [
				'userdata' => $data,
				'status' => "Loged in"
			];
			$this->session->set_userdata($session);
			if($data->level == 'sasaran'){
				redirect('Dashboard/sasaran');
			}else if($data->level == 'admin'){
				redirect('Dashboard');
			}else if($data->level == 'pemantau'){
				redirect('Pemantauan');
			}else{
				$this->session->sess_destroy();
			}

		}
	}

}
