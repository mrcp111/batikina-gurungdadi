<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index() {
		if ($this->session->userdata('email')) {
			redirect('user');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Masuk';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login() {

		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->db->get_where('user', ['email' => $email])-> row_array();
		//cek jika ada
		if ($user) {
			// verifikasi password
			if (password_verify($password, $user['password'])) {
				//password berhasil
				$data = [
					'id' => $user['id'],
					'email' => $user['email'],
					'role_id' => $user['role_id']
				];
				$this->session->set_userdata($data);
				//cek role id
				if ($user['role_id'] == 1) {
					redirect('admin');
				} else {
					redirect('user');
				}
			} else {
				//password gagal
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar </div>');
			redirect('auth');
		}
	}

	public function registration() {
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email sudah terdaftar'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Daftar';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role_id' => '2',
				'date_created' => time() + 60*60*6
			];

			$this->db->insert('user', $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil didaftarkan </div>');
			redirect('auth');
		}
	}

	public function logout() {
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil keluar </div>');
		redirect('auth');
	}

	public function home() {
		if ($this->session->userdata('email')) {
			redirect('user');
		}
		$data['title'] = 'Home';
		$this->session->set_flashdata('message', '');
		if ($this->input->get('search', true)) {
			$keyword = $this->input->get('search', true);
			$data['product'] = $this->db->query("SELECT * From upload_product where (name LIKE '%$keyword%' OR price LIKE '%$keyword%' OR details LIKE '%$keyword%')")->result();
			if (!$data['product']) {
				$this->session->set_flashdata('message', '<div class=""> Data tidak ditemukan </div>');
			} else {
				$this->session->set_flashdata('message', '');
			}
		} else {
			$data['product'] = $this->db->query("Select * from upload_product")->result();
		}
		$this->load->view('notloggedin/header', $data);
		$this->load->view('notloggedin/topbar');
		$this->load->view('notloggedin/index', $data);
		$this->load->view('notloggedin/prefooter');
		$this->load->view('notloggedin/footer');

	}

	public function blocked() {
		$this->load->view('auth/blocked');
	}

}
