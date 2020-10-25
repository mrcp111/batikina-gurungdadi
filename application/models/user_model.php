<?php defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model
{
    function search_blog($title){
        $this->db->like('name', $title , 'both');
        $this->db->order_by('name', 'ASC');
        $this->db->limit(10);
        return $this->db->get('upload_product')->result();
    }

    public function getUser() {
        return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function getAllCart($buyer_id, $sts) {
      return $this->db->query("SELECT *, user_cart.id as cart_id FROM user_cart INNER JOIN upload_product on upload_product.id = user_cart.product_id where buyer_id='$buyer_id' and user_cart.status = '$sts'")->result();
    }

    public function getSumCart() {
      $user_id = $this->session->userdata('id');
      return $this->db->query("SELECt * from user_cart where buyer_id = '$user_id' and status = 1")->num_rows();
    }

    public function getAllTrx($buyer_id) {
      return $this->db->query("SELECt * from transaction where buyer_id = '$buyer_id' and status !=0")->result();
    }

    public function getAllTrx_0($buyer_id) {
      return $this->db->query("SELECt * from transaction where buyer_id = '$buyer_id' and status = 0")->result();
    }

    public function getTrx($transaction_id){
      return $this->db->query("select * from transaction where id = '$transaction_id'")->row_array();
    }

    public function getAllTrxDetails($id) {
      $trx = $this->db->query("Select * from transaction where id = '$id'")->row_array();
      $trx_id = $trx['trx_id'];
      return $this->db->query("Select *, upload_product.name as product_name, transaction_details.status as td_status, transaction_details.id as td_id from transaction_details INNER JOIN user_cart on user_cart.id = transaction_details.cart_id INNER JOIN upload_product on user_cart.product_id = upload_product.id INNER JOIN user on upload_product.user_id = user.id where trx_id = '$trx_id'")->result();
    }

    public function getSumTrx() {
      $user_id = $this->session->userdata('id');
      return $this->db->query("Select * from transaction where buyer_id = '$user_id' and status != 0")->num_rows();
    }

    public function getAllProducts() {
      return $this->db->query("Select * from upload_product")->result();
    }

    public function searchProducts($keyword) {
      return $this->db->query("SELECT * From upload_product where
																	(name LIKE '%$keyword%' OR
																	price LIKE '%$keyword%' OR
																	details LIKE '%$keyword%')")->result();
    }

    public function editAccount() {
      $name = $this->input->post('name');
      $bill_numb = $this->input->post('bill_numb');
      $email = $this->input->post('email');

      $this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('user');

      $this->db->set('bill_numb', $bill_numb);
      $this->db->where('email', $email);
			$this->db->update('user');
    }

    public function getUserProduct($id) {
      return $this->db->query("Select * from upload_product Where user_id = '$id'")->result();
    }

    public function doUpload($data) {
      $data = [
				'user_id' => $data['user']['id'],
				'name' => $this->input->post('name'),
				'price' => str_replace(".", "", $this->input->post('price')),
				'image' => $this->_uploadImage(),
				'details' => $this->input->post('details')
			];
      $this->db->insert('upload_product', $data);
    }

    public function deleteProduct($id) {
      $this->_deleteImage($id);
      // $this->deleteCart($id);
      return $this->db->delete('upload_product', array("id" => $id));
    }

    private function _uploadImage() {
      $config['upload_path']          = './images/products/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['file_name']            = uniqid();
      $config['overwrite']		      	= true;
      $config['max_size']             = 1024; // 1MB
      // $config['max_width']            = 1024;
      // $config['max_height']           = 768;

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('image')) {
        return $this->upload->data("file_name");
      }

      // print_r($this->upload->display_errors());
      return "default.jpg";
    }

    private function _deleteImage($id) {
      $product = $this->db->get_where('upload_product', ['id' => $id])->row_array();
      if ($product->image != "default.jpg") {
	      $filename = explode(".", $product['image'])[0];
		    return array_map('unlink', glob(FCPATH."images/products/$filename.*"));
      }
    }

    public function editProduct($id, $data) {
      if (!empty($_FILES["image"]["name"])) {
        if ($data['product']['image'] != $_FILES["image"]["name"]) {
          unlink(FCPATH . 'images/products/' . $data['product']['image']);
          $data['product']['image'] = $this->_uploadImage();
        }
      } else {
          $data['product']['image'] = $data['product']['image'];
      }

      $data = [
				'user_id' => $data['product']['user_id'],
				'name' => $this->input->post('name'),
				'price' => str_replace(".", "", $this->input->post('price')),
        'image' => $data['product']['image'],
				'details' => $this->input->post('details')
			];

      $this->db->set($data);
      $this->db->where('id', $id);
      $this->db->update('upload_product');
    }

    public function deleteCart($id) {
      $this->db->query("delete from user_cart where product_id = '$id'");
      return $this->db->delete('user_cart', array("id" => $id));
    }
}
