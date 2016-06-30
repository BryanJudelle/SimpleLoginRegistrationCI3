<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AppModel extends CI_Model {

	public function insert_data($data = '') {
		if (!empty($data) && count($data)>0) {
			$this->db->insert('tbl_users', $data);
			return $this->db->affected_rows() > 0 ? true : false;
		}
	}

	public function update_data($params, $data) {
		if (!empty($params) && count($data) > 0) {
			$this->db->where($params)->update('tbl_users', $data);
			return $this->db->affected_rows() > 0 ? true : false;
		}
	}

	public function get_user($id = '') {
		if (!empty($id)) {
			$q = $this->db->select('id, username, name, age, date_created')
					  ->from('tbl_users')
					  ->where('id', $id)
					  ->get();

			return $q->result() > 0 ? $q->result() : NULL;
		}
	}

	public function verify_user($data) {
		$q = $this->db->select('id, age, username, password')
					->from('tbl_users')
					->where($data)
					->get();

		return $q->result() > 0 ? $q->result() : NULL;
	}
}