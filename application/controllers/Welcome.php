<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('AppModel');
		$this->load->library('SimpleAuth');
		$session = $this->session->userdata('logged_in');
		if ($session) 
			redirect('profile');
	}

	public function index() {
		$this->load->view('welcome_message');
	}


	public function login() {
		if ($this->input->is_ajax_request()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$data   = array('username' => $username);
			$result = $this->AppModel->verify_user($data);

			if ($result !== FALSE && count($result) > 0) {
				$flag = $this->simpleauth->verify($password, $result[0]->password);
				
				if ($flag) {
					$newdata = array(
				        'id' 		=> $result[0]->id,
				        'username'  =>  $result[0]->username,
				        'logged_in' => TRUE
					);
					$this->session->set_userdata($newdata);
					echo json_encode(array('message'=> 'success', 'content' => 'successful loggedin.'));
				}
				else
					echo json_encode(array('message'=> 'failed', 'content' => 'invalid username/password #2'));
			}
			else {
				echo json_encode(array('message'=> 'failed', 'content' => 'invalid username/password #1'));
			}			
		}
		else
			show_404();
	}

	public function register() {
		if ($this->input->is_ajax_request()) {
			$data = $this->input->post('udata');
			parse_str($data, $arrVal);
			$dbData = array(
				'username' => $arrVal['reg_username'],
				'name'     => $arrVal['reg_name'],
				'age' 	   => $arrVal['reg_age'],
				'password' => $this->simpleauth->hash($arrVal['reg_password'])
			);

			$flag = $this->AppModel->insert_data($dbData);

			echo  $flag ? json_encode(array('message'=> 'success', 'content' => 'successful registered')) : 
				json_encode(array('message'=> 'failed', 'content' => 'please check therequired fields'));
		}
		else {
			show_404();
		}
	}

}
