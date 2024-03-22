<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	private $_table   = "admin";
	const SESSION_KEY  	= 'idAdmin';



	public function createSession($id)
	{
		$this->session->set_userdata([self::SESSION_KEY => $id]);
		if ($this->session->has_userdata(self::SESSION_KEY)) {
			return true;
		} else {
			return false;
		}
	}

	public function current()
	{
		if (!$this->session->has_userdata(self::SESSION_KEY)) {
			return null;
		}

		$user_id = $this->session->userdata(self::SESSION_KEY);
		$query = $this->db->get_where($this->_table, ['id_admin' => $user_id]);
		return $query->row();
	}

	public function logout()
	{
		$this->session->unset_userdata([self::SESSION_KEY]);
		if ($this->session->has_userdata(self::SESSION_KEY)) {
			return true;
		} else {
			return false;
		}
	}
}
