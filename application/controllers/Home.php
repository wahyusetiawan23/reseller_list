<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_home');
	}

	public function index(){
		$data['title']      = 'Home';
		$this->load->view('home/index', $data);
	}


	private function _geoIp_get(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			return $_SERVER['HTTP_CLIENT_IP'];
		}
		else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else {
			return $_SERVER['REMOTE_ADDR'];
		}
	}

	private function _countryCode(){
		$CN = 'WW';
		if(isset($_SERVER["HTTP_CF_IPCOUNTRY"])){
			$CN = $_SERVER["HTTP_CF_IPCOUNTRY"];
		}else{
			$ip = $this->_geoIp_get();
			$ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
			if ($ipdat && isset($ipdat->geoplugin_countryCode)) {
				$CN = $ipdat->geoplugin_countryCode;
			}
		}

		$check = $this->M_home->CountryByName_get($CN);

		$NC = 'WorldWide';
		$CI = 999;
		if($check){
            $CI3 = $check->id;
            $validate = $this->M_home->reseller_list($CI3);
            if($validate){
                $NC = $check->name;
            }else{
                $validate = $this->M_home->reseller_list($CI);
            }
		}else{
            $validate = $this->M_home->reseller_list($CI);
        }

		return [$NC, $validate];

	}

	public function list(){
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$data = $this->_countryCode();
		$NC   = $data[0];
		$arr  = $data[1];


		echo json_encode([
			'country' => $NC,
			'list'	  => $arr
		]);
	}

	public function search(){
//		if (!$this->input->is_ajax_request()) {
//			exit('No direct script access allowed');
//		}

		$id     = $this->input->post('id', true);
		$search = $this->input->post('search', true);

		$data = $this->M_home->search_get($id, $search);

		echo json_encode([
			'list'	  => $data
		]);
	}
}
