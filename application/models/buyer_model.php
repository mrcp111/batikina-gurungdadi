<?php defined('BASEPATH') OR exit('No direct script access allowed');

class buyer_model extends CI_Model
{
	public function addCart($id) {
		$seller_id = $this->db->query("select user_id from upload_product where id = '$id'")->row_array();
		$data = [
			'seller_id' => $seller_id['user_id'],
			'buyer_id' => $this->session->userdata('id'),
			'product_id' => $id,
			'amount' => $this->input->post('amount'),
			'status' => 1
		];
		$this->db->insert('user_cart', $data);
	}

	public function addPayment() {
		$trx_id = uniqid();
		$cost = 20000;
		$buyer_id = $this->session->userdata('id');
		$cart = $this->db->query("SELECT *, user_cart.id as cart_id FROM user_cart INNER JOIN upload_product on upload_product.id = user_cart.product_id where buyer_id='$buyer_id' and user_cart.status = 1")->result();
		$subtotal = 0;
		foreach ($cart as $cr):
			$subtotal += $cr->price * $cr->amount;
		endforeach;
		$data = [
			'buyer_id' => $buyer_id,
			'trx_id' => uniqid(),
			'subtotal' => $subtotal,
			'cost' => $cost,
			'address' => $this->input->post('address'),
			'postcode' => $this->input->post('postcode'),
			'phone' => $this->input->post('phone'),
			'receiver' => $this->input->post('receiver'),
			'total' => $subtotal + $cost,
			'status' => 1,
			'date_created' => time()+60*60*6
		];
		foreach ($cart as $cr):
			$data_transaction_details = [
				'cart_id' => $cr->cart_id,
				'trx_id' => $data['trx_id'],
				'buyer_id' => $cr->buyer_id,
				'seller_id' => $cr->seller_id,
				'product_id' => $cr->product_id,
				'status' => 1,
			];
			// $this->db->query("Delete from user_cart where id = $cr->cart_id");
			$this->db->query("update user_cart set status = 2 where id = $cr->cart_id");
			$this->db->insert('transaction_details', $data_transaction_details);
		endforeach;
		$this->db->insert('transaction', $data);

	}
}
