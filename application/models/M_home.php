<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
		public function CountryByName_get($name){
			$this->db->select('*');
			$this->db->from('country_code');
			$this->db->where('alpha_2', $name);
			return $this->db->get()->row();
		}

		public function reseller_list($CI){
			$this->db->select('*');
			$this->db->from('reseller');
			$this->db->where('status', 1);
			$this->db->where('country', $CI);

			$query = $this->db->get();
			if ($query->num_rows() == 0) {
				$this->db->where('country', 999);
				$query = $this->db->get('reseller');
			}

			return $query->result();
		}

		public function search_get($id, $search){
			$this->db->select('*');
			$this->db->from('reseller');
			$this->db->where('status', 1);
			$this->db->where('country', $id);
			$this->db->group_start();
			$this->db->like('name', $search);
			$this->db->or_like('company', $search);
			$this->db->group_end();
			$query = $this->db->get();
			return $query->result();
		}
}
