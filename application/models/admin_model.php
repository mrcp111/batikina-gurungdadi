<?php defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_Model
{

	public function getAllUser() {
		return $this->db->query("select * from user where role_id = 2")->result();
	}

	public function deleteUser($id) {
		$data_user = $this->db->query("Select * from user where id = '$id'")->row_array();
		return $this->db->delete('user', array("id" => $id));
	}

	public function getAllProduct() {
		return $this->db->query("select * from upload_product")->result();
	}

	public function deleteProduct($id) {
		$this->_deleteImage($id);
		return $this->db->delete('upload_product', array("id" => $id));
	}

	private function _deleteImage($id) {
		$product = $this->db->get_where('upload_product', ['id' => $id])->row_array();
		if ($product->image != "default.jpg") {
			$filename = explode(".", $product['image'])[0];
			return array_map('unlink', glob(FCPATH."images/products/$filename.*"));
		}
	}

	public function getAllTrx() {
		return $this->db->query("select * from transaction")->result();
	}

	public function getTrx($id) {
		return $this->db->query("select * from transaction where id = '$id'")->row_array();
	}

	public function getAllTrxDetails($id) {
		$trx = $this->db->query("Select * from transaction where id = '$id'")->row_array();
		$trx_id = $trx['trx_id'];
		return $this->db->query("Select *, upload_product.name as product_name, transaction_details.status as td_status from transaction_details INNER JOIN user_cart on user_cart.id = transaction_details.cart_id INNER JOIN upload_product on user_cart.product_id = upload_product.id INNER JOIN user on upload_product.user_id = user.id where trx_id = '$trx_id'")->result();

	}

	public function deleteTrx($id) {
		$trx_id = $this->db->query("select trx_id from transaction where id = '$id'")->row_array();
		$cart = $this->db->query("select * FROM transaction_details where trx_id = '$trx_id[trx_id]'")->result();
		foreach ($cart as $ci) {
			$this->db->delete('user_cart', array("id" => $ci->cart_id));
			// $this->db->query("update user_cart set status = 1 where id = '$ci->cart_id'");
		}
		$this->db->delete('transaction_details', array("trx_id" => $trx_id['trx_id']));
		return $this->db->delete('transaction', array("id" => $id));
	}
}
