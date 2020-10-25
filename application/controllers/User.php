<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		is_logged_in();
		$this->load->model("user_model");
		$this->load->model("buyer_model");
		$this->load->model("seller_model");
	}

	function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->user_model->search_blog($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->name;
                echo json_encode($arr_result);
            }
        }
    }

	public function index() {
		$data['title'] = 'Home';
		$data['user'] = $this->user_model->getUser();
		$data['sum_cart'] = $this->user_model->getSumCart();
		$data['sum_trx'] = $this->user_model->getSumTrx();
		$data['sum_order'] = $this->seller_model->getSumOrder();
		// $data['product'] = array();
		$this->session->set_flashdata('message', '');
		if ($this->input->get('search', true)) {
			$search = $this->input->get('search');
			$data['product'] = $this->db->query("SELECT * from upload_product where name like  '%$search%'")->result();
			// $word = explode(" ",$this->input->get('search', true));
			// $count_word = str_word_count($this->input->get('search', true));
			// if ($count_word == 0) {
			// 	$data['product'] = $this->user_model->searchProducts($word[0]);
			// } else {
			// 	for ($i=0; $i < $count_word; $i++) {
			// 		$data['product'] += $this->user_model->searchProducts($word[$i]);
					// var_dump(count($data['product']));
					// die;
					// if (count($data['product']) > 1) {
						// var_dump(0);
						// var_dump($data['product'][$i]->id);
						// die;
						// $data['product'] += $this->user_model->searchProducts($word[$i]);
						// if ($data['product'][$i]->id == $data['product'][$i-1]->id) {
						// 	unset($data['product'][$i]);
						// }
					// } else {
					//
					// }
			// 	}
			// }
			if (!$data['product']) {
				$this->session->set_flashdata('message', '<div class=""> Data tidak ditemukan </div>');
			} else {
				$this->session->set_flashdata('message', '');
			}
		} else {
			$data['product'] = $this->user_model->getAllProducts();
		}
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('user/index', $data) ;
		$this->load->view('templates/user_prefooter');
		$this->load->view('templates/user_footer');
	}

	public function account() {
		$data['title'] = 'Akun Saya';
		$data['user'] = $this->user_model->getUser();
		$data['sum_cart'] = $this->user_model->getSumCart();
		$data['sum_trx'] = $this->user_model->getSumTrx();
		$data['sum_order'] = $this->seller_model->getSumOrder();
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password lama', 'required|trim', [
			'required' => 'Password harus diisi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar', $data);
			$this->load->view('user/account', $data);
			$this->load->view('templates/user_prefooter');
			$this->load->view('templates/user_footer');
		} else {
			$current_password =  $this->input->post('password1');
			$new_password = $this->input->post('password2');

			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<small class="text-danger pl-3"> Password lama salah </small>');
				redirect('user/account');
			} else {
				if($current_password == $new_password) {
					$this->session->set_flashdata('message', '<small class="text-danger pl-3"> Password baru tidak boleh sama dengan password lama </small>');
					redirect('user/account');
				}
				else {
					if ($new_password == "") {
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil diubah</div>');
						$this->user_model->editaccount();
						redirect('user/account');
					} else {
						//password bener
						$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

						$this->db->set('password', $password_hash);
						$this->db->where('email', $this->session->userdata('email'));
						$this->db->update('user');
						$this->user_model->editAccount();
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil diubah</div>');
						redirect('user/account');
					}
				}
			}
		}
	}

	public function product_list() {
		$data['title'] = 'Daftar Produk';
		$data['user'] = $this->user_model->getUser();
		$data['sum_cart'] = $this->user_model->getSumCart();
		$data['sum_trx'] = $this->user_model->getSumTrx();
		$data['sum_order'] = $this->seller_model->getSumOrder();
		$data['product'] = $this->user_model->getUserProduct($data['user']['id']);

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('user/product_list', $data);
		$this->load->view('templates/user_prefooter');
		$this->load->view('templates/user_footer');
	}

	public function upload_product() {
		$data['title'] = 'Upload Produk';
		$data['user'] = $this->user_model->getUser();
		$data['sum_cart'] = $this->user_model->getSumCart();
		$data['sum_trx'] = $this->user_model->getSumTrx();
		$data['sum_order'] = $this->seller_model->getSumOrder();
		$this->form_validation->set_rules('name', 'Name', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar', $data);
			$this->load->view('user/upload_product');
			$this->load->view('templates/user_prefooter');
			$this->load->view('templates/user_footer');
		} else {
			$this->user_model->doUpload($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil mengupload produk</div>');
			redirect('user/product_list');

		}
	}

	public function delete_product($id) {
		$this->user_model->deleteProduct($id);
		$this->user_model->deleteCart($id);
		redirect('user/product_list');
	}

	public function edit_product($id) {
		$data['title'] = 'Edit Produk';
		$data['user'] = $this->user_model->getUser();
		$data['sum_cart'] = $this->user_model->getSumCart();
		$data['sum_trx'] = $this->user_model->getSumTrx();
		$data['sum_order'] = $this->seller_model->getSumOrder();
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$data['product'] = $this->db->query("Select * from upload_product where id = '$id'")->row_array();


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar', $data);
			$this->load->view('user/edit_product', $data);
			$this->load->view('templates/user_prefooter');
			$this->load->view('templates/user_footer');
		} else {
      $this->user_model->editProduct($id, $data);
			redirect('user/product_list');
		}
	}

	public function product_details($id = NULL) {
		$data['title'] = 'Rincian Produk';
		$data['user'] = $this->user_model->getUser();
		$data['sum_cart'] = $this->user_model->getSumCart();
		$data['sum_trx'] = $this->user_model->getSumTrx();
		$data['sum_order'] = $this->seller_model->getSumOrder();
		$this->form_validation->set_rules('amount', 'Jumlah', 'required|trim');
		$data['product'] = $this->db->query("Select * from upload_product where id = '$id'")->row_array();
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar', $data);
			$this->load->view('user/product_details', $data);
			$this->load->view('templates/user_prefooter');
			$this->load->view('templates/user_footer');
		} else {
			$this->buyer_model->addCart($id);
			redirect('user/cart');
		}
	}

	public function cart() {
		$data['title'] = 'Keranjang';
		$data['user'] = $this->user_model->getUser();
		$data['sum_cart'] = $this->user_model->getSumCart();
		$data['sum_trx'] = $this->user_model->getSumTrx();
		$data['sum_order'] = $this->seller_model->getSumOrder();
		$buyer_id = $data['user']['id'];
		$this->form_validation->set_rules('address', 'Alamat', 'required');
		$this->form_validation->set_rules('postcode', 'Kode Pos', 'required');
		$this->form_validation->set_rules('phone', 'Nomer HP', 'required');
		$this->form_validation->set_rules('receiver', 'Penerima', 'required');
		$data['cart'] = $this->user_model->getAllCart($buyer_id, 1);
		// $data['product'] = $this->db->query("Select * FROM upload_product where  upload_product.id IN
		// (SELECT product_id FROM user_cart where user_cart.buyer_id = '$buyer_id')")->result();
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar', $data);
			$this->load->view('user/cart', $data);
			$this->load->view('templates/user_prefooter');
			$this->load->view('templates/user_footer');
		} else {
			$this->buyer_model->addPayment();
			redirect('user/payment');
		}
	}

	public function delete_cart($id = NULL) {
		$this->user_model->deleteCart($id);
		redirect('user/cart');
	}

	public function edit_cart($id) {
		$data['title'] = 'Keranjang';
		$data['user'] = $this->user_model->getUser();
		$data['sum_cart'] = $this->user_model->getSumCart();
		$data['sum_trx'] = $this->user_model->getSumTrx();
		$data['sum_order'] = $this->seller_model->getSumOrder();
		$data['cart'] = $this->db->query("select * from user_cart where id = '$id'")->row_array();
		$product_id = $data['cart']['product_id'];
		$data['product'] = $this->db->query("select * from upload_product where id = '$product_id'")->row_array();
		$this->form_validation->set_rules('amount', 'Jumlah', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar', $data);
			$this->load->view('user/edit_cart', $data);
			$this->load->view('templates/user_prefooter');
			$this->load->view('templates/user_footer');
		} else {
			$amount = $this->input->post('amount');
			$this->db->query("update user_cart set amount = '$amount' where id = $id");
			redirect('user/cart');
		}
		// $data['cart'] =  $this->input->post('amount');
		// $this->db->query("update user_cart set amount = '$data' where id = '$id'");
	}

	public function info() {
		$data['title'] = 'Info|Batikina';
		$data['user'] = $this->user_model->getUser();
		$data['sum_cart'] = $this->user_model->getSumCart();
		$data['sum_trx'] = $this->user_model->getSumTrx();
		$data['sum_order'] = $this->seller_model->getSumOrder();


		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('user/info');
		$this->load->view('templates/user_prefooter');
		$this->load->view('templates/user_footer');
	}

	public function payment() {
		$data['title'] = 'Pembayaran';
		$data['user'] = $this->user_model->getUser();
		$data['sum_cart'] = $this->user_model->getSumCart();
		$data['sum_trx'] = $this->user_model->getSumTrx();
		$data['sum_order'] = $this->seller_model->getSumOrder();

		$buyer_id = $data['user']['id'];
		$data['trx'] = $this->user_model->getAllTrx($buyer_id);
		$data['trx_0'] = $this->user_model->getAllTrx_0($buyer_id);

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('user/payment', $data);
		$this->load->view('templates/user_prefooter');
		$this->load->view('templates/user_footer');
	}

	public function payment_details($transaction_id) {
		$data['title'] = 'Detail Pembayaran';
		$data['user'] = $this->user_model->getUser();
		$data['sum_cart'] = $this->user_model->getSumCart();
		$data['sum_trx'] = $this->user_model->getSumTrx();
		$data['sum_order'] = $this->seller_model->getSumOrder();
		$buyer_id = $data['user']['id'];
		$data['cart'] = $this->user_model->getAllCart($buyer_id, 2);
		$data['trx'] = $this->user_model->getTrx($transaction_id);
		$data['trx_details'] = $this->user_model->getAllTrxDetails($transaction_id);
		// $data['product'] = $this->db->query("Select * from upload_product where id = ")
		// $data['sum_cartNonActive'] = $this->db->query("select * from user_cart where buyer_id = '$buyer_id' and status = 0")->num_rows();

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('user/payment_details', $data);
		$this->load->view('templates/user_prefooter');
		$this->load->view('templates/user_footer');
	}

	public function order_confirmation() {
		$data['title'] = 'Konfirmasi Pemesanan';
		$data['user'] = $this->user_model->getUser();
		$data['sum_cart'] = $this->user_model->getSumCart();
		$data['sum_trx'] = $this->user_model->getSumTrx();
		$data['sum_order'] = $this->seller_model->getSumOrder();
		$data['trx'] = $this->seller_model->getAllOrder();

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('user/order_confirmation', $data);
		$this->load->view('templates/user_prefooter');
		$this->load->view('templates/user_footer');
	}

	public function order_details($td_id) {
		$data['title'] = 'Keranjang';
		$data['user'] = $this->user_model->getUser();
		$data['sum_cart'] = $this->user_model->getSumCart();
		$data['sum_trx'] = $this->user_model->getSumTrx();
		$data['sum_order'] = $this->seller_model->getSumOrder();
		$data['order_details'] = $this->seller_model->getOrderDetails($td_id);

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('user/order_details', $data);
		$this->load->view('templates/user_prefooter');
		$this->load->view('templates/user_footer');
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

		redirect('user/payment');

	}

	public function seller_payment_status($td_id) {
		$trx_details = $this->db->query("Select *, upload_product.name as product_name, transaction_details.status as td_status from transaction_details INNER JOIN user_cart on user_cart.id = transaction_details.cart_id INNER JOIN upload_product on user_cart.product_id = upload_product.id INNER JOIN user on upload_product.user_id = user.id where transaction_details.id = '$td_id'")->row_array();
		$new_status = 4;
		$this->db->query("update transaction_details set status = '$new_status' where id = '$td_id'");
		redirect('user/order_confirmation');
	}

	public function buyer_payment_received($trx_id){
		$this->db->query("Update transaction set status = 0 where trx_id = '$trx_id'");
		$trx = $this->db->query("Select *, upload_product.name as product_name, transaction_details.status as td_status, user_cart.id as cart_id, transaction_details.id as td_id from transaction_details INNER JOIN user_cart on user_cart.id = transaction_details.cart_id INNER JOIN upload_product on user_cart.product_id = upload_product.id INNER JOIN user on upload_product.user_id = user.id where transaction_details.trx_id = '$trx_id'")->result();

		foreach ($trx as $tr) {
			$this->db->query("Update transaction_details set status = 0 where id = '$tr->td_id'");
			$this->db->query("Update user_cart set status = 0 where id = '$tr->cart_id'");
		}
		redirect('user/payment');
	}

}
