<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	var $user_id = '';

	public function __construct() {
		parent::__construct();
		$this->load->model('AppModel');
		$this->load->library('SimpleAuth');
		$this->user_id = $this->session->userdata('id');

		if (empty($this->user_id)) {
			redirect('welcome');
		}
	}

	public function index() {
		$user_data = $this->AppModel->get_user($this->user_id);
		$data = array(
			'id'       => $user_data[0]->id,
			'username' => $user_data[0]->username,
			'age' 	   => $user_data[0]->age,
			'name' 	   => $user_data[0]->name,
			'date_created' => $user_data[0]->date_created
		);
		$this->load->view('profile', $data);
	}

	public function update_password() {
		if ($this->input->is_ajax_request()) {
			$password = $this->input->post('password');
			$id = $this->input->post('id');

			$dbData = array(
				'password' => $this->simpleauth->hash($password)
			);
			$params = array('id' => $id);
			$flag = $this->AppModel->update_data($params, $dbData);

			echo  $flag ? json_encode(array('success' => 'success')) : json_encode(array('success' => 'false'));
		}
	}

	public function logout() {
		$newdata = array(
	        'id' 		=> '',
	        'username'  =>  '',
	        'logged_in' => FALSE
		);
		$this->session->unset_userdata($newdata);
		$this->user_id = '';
		$this->session->sess_destroy();
		redirect('welcome');
	}
}