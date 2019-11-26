<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
			parent::__construct();
			is_logged_in();
			// $this->load->library('form_validation');
			$this->load->model('admin_model');
	}

	public function index() {
		$data['title'] = "Dashboard";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('admin/header', $data);
		$this->load->view('admin/dashboard_header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/index', $data);
		$this->load->view('admin/prefooter');
		$this->load->view('admin/footer');
	}

	public function data_user() {
		$data['title'] = "Data User";
		$data['user'] = $this->admin_model->getAllUser();

		$this->load->view('admin/header', $data);
		$this->load->view('admin/dashboard_header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/data_user', $data);
		$this->load->view('admin/prefooter');
		$this->load->view('admin/footer');
	}

	public function delete_user($id) {
		$this->admin_model->deleteUser($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus user</div>');
		redirect('admin/data_user');
	}

	public function data_product() {
		$data['title'] = "Data Product";
		$data['product'] = $this->admin_model->getAllProduct();

		$this->load->view('admin/header', $data);
		$this->load->view('admin/dashboard_header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/data_product', $data);
		$this->load->view('admin/prefooter');
		$this->load->view('admin/footer');
	}

	public function delete_product($id) {
		$this->admin_model->deleteProduct($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus produk</div>');
		redirect('admin/data_product');
	}

	public function data_trx() {
		$data['title'] = "Data Product";
		$data['trx'] = $this->admin_model->getAllTrx();
		foreach ($data['trx'] as $tr) {
			$payment_limit = $tr->date_created + 60*60*24;
			if (time()+60*60*6 > $payment_limit && $tr->status == 1) {
				$this->delete_trx($tr->id);
			}
		}

		$this->load->view('admin/header', $data);
		$this->load->view('admin/dashboard_header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/data_trx', $data);
		$this->load->view('admin/prefooter');
		$this->load->view('admin/footer');
	}

	public function delete_trx($id) {
		$this->admin_model->deleteTrx($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus transaksi</div>');
		redirect('admin/data_trx');
	}

	public function trx_details($id){
		$data['title'] = "Data Product";
		$data['trx'] = $this->admin_model->getTrx($id);
		$data['trx_details'] = $this->admin_model->getAllTrxDetails($id);
		$condition = false;
		foreach ($data['trx_details'] as $tr) {
			if ($tr->td_status == 3) {
				$condition = false;
				break;
			} elseif ($tr->td_status == 4) {
				$new_status = 4;
				$trx_id = $tr->trx_id;
				$condition = true;
			}
		}
		if ($condition == true) {
			$this->db->query("update transaction set status = '$new_status' where trx_id = '$trx_id'");
		}

		$this->load->view('admin/header', $data);
		$this->load->view('admin/dashboard_header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/trx_details', $data);
		$this->load->view('admin/prefooter');
		$this->load->view('admin/footer');
	}

	public function payment_status($trx_id) {
		$trx_details = $this->db->query("Select *, upload_product.name as product_name, transaction_details.status as td_status from transaction_details INNER JOIN user_cart on user_cart.id = transaction_details.cart_id INNER JOIN upload_product on user_cart.product_id = upload_product.id INNER JOIN user on upload_product.user_id = user.id where trx_id = '$trx_id'")->result();
		foreach ($trx_details as $td) {
			if ($td->td_status == 1) {
				$new_status = 2;
			} elseif ($td->td_status == 2) {
				$new_status = 3;
			}
			$this->db->query("update transaction_details set status = '$new_status' where trx_id = '$td->trx_id'");
		}
		$this->db->query("update transaction set status = '$new_status' where trx_id = '$td->trx_id'");
		redirect('admin/data_trx');

	}
}
