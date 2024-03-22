<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

	public function email_get($email)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('email', $email);
		return $this->db->get()->row();
	}

	public function country_get(){
		return $this->db->get('country_code')->result();
	}


	public function resellerList_get(){
		$this->db->select('r.*, c.alpha_2, c.name as flag');
		$this->db->from('reseller r');
		$this->db->join('country_code c', 'r.country=c.id');
		return $this->db->get()->result();
	}

	public function resellerById_get($id){
		$this->db->select('r.*');
		$this->db->from('reseller r');
		$this->db->where('r.id_reseller', $id);
		return $this->db->get()->row();
	}

	public function reseller_post(){
		$fname = $this->input->post('fname', true);
		$email = $this->input->post('email', true);
		$company = $this->input->post('company', true);
		$address = $this->input->post('address', true);
		$country = $this->input->post('country', true);

		$website = $this->input->post('website', true);
		$payment = $this->input->post('payment', true);
		$facebook = $this->input->post('facebook', true);
		$instagram = $this->input->post('instagram', true);
		$telegram = $this->input->post('telegram', true);
		$whatsapp = $this->input->post('whatsapp', true);
		$phone = $this->input->post('phone', true);


		$data = array(
			'name'	=> $fname,
			'email' => $email,
			'company'	=> $company,
			'website'	=> $website,
			'payment_option'	=> $payment,
			'address'	=> $address,
			'facebook'	=> $facebook,
			'instagram'	=> $instagram,
			'telegram'	=> $telegram,
			'whatsapp'	=> $whatsapp,
			'phone_number'	=> $phone,
			'country'	=> $country
		);

		return $this->db->insert('reseller', $data);
	}

	public function reseller_put(){
		$idInput = $this->input->post('idInput', true);
		$fname = $this->input->post('fname', true);
		$email = $this->input->post('email', true);
		$company = $this->input->post('company', true);
		$address = $this->input->post('address', true);
		$country = $this->input->post('country', true);

		$website = $this->input->post('website', true);
		$payment = $this->input->post('payment', true);
		$facebook = $this->input->post('facebook', true);
		$instagram = $this->input->post('instagram', true);
		$telegram = $this->input->post('telegram', true);
		$whatsapp = $this->input->post('whatsapp', true);
		$phone = $this->input->post('phone', true);

		$check = $this->resellerById_get($idInput);
		if($check){
			$data = array(
				'name'	=> $fname,
				'email' => $email,
				'company'	=> $company,
				'website'	=> $website,
				'payment_option'	=> $payment,
				'address'	=> $address,
				'facebook'	=> $facebook,
				'instagram'	=> $instagram,
				'telegram'	=> $telegram,
				'whatsapp'	=> $whatsapp,
				'phone_number'	=> $phone,
				'country'	=> $country
			);
			$this->db->where('id_reseller', $idInput);
			return $this->db->update('reseller', $data);
		}else{
			return false;
		}
	}

	public function resellerStatus_put($id, $status){
		$this->db->set('status', $status);
		$this->db->where('id_reseller', $id);
		return $this->db->update('reseller');
	}

	public function reseller_del($id){
		$this->db->where('id_reseller', $id);
		return $this->db->delete('reseller');
	}
}
