<?php defined('BASEPATH') OR exit('No direct script access allowed');

class seller_model extends CI_Model
{
	public function getAllOrder() {
		$seller_id = $this->session->userdata('id');
		return $this->db->query("Select *, upload_product.name as product_name, transaction_details.id as td_id, transaction_details.status as td_status from transaction_details INNER JOIN user_cart on user_cart.id = transaction_details.cart_id INNER JOIN upload_product on user_cart.product_id = upload_product.id INNER JOIN user on upload_product.user_id = user.id inner join transaction on transaction_details.trx_id = transaction.trx_id where transaction_details.seller_id = '$seller_id'")->result();
	}

	public function getOrderDetails($td_id) {
		$seller_id = $this->session->userdata('id');
		return $this->db->query("Select *, upload_product.name as product_name, transaction_details.status as td_status, transaction_details.id as td_id FROM transaction_details inner join transaction on transaction_details.trx_id = transaction.trx_id INNER JOIN upload_product on transaction_details.product_id = upload_product.id INNER join user_cart on user_cart.id = transaction_details.cart_id where transaction_details.id = '$td_id' and transaction_details.seller_id = '$seller_id'")->row_array();
	}

	public function getSumOrder() {
		$seller_id = $this->session->userdata('id');
		return $this->db->query("Select *, upload_product.name as product_name from transaction_details INNER JOIN user_cart on user_cart.id = transaction_details.cart_id INNER JOIN upload_product on user_cart.product_id = upload_product.id INNER JOIN user on upload_product.user_id = user.id where transaction_details.seller_id = '$seller_id'")->num_rows();
	}

}
