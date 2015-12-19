<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//获取巨无霸数据
		$client = new GuzzleHttp\Client(['base_uri' => 'API_URL']);
		try{
			$res = $client->request('GET',API_URL."/api/wg_one",['query'=>['wg_id'=>1]]);
		}catch (\GuzzleHttp\Exception\RequestException $e){
		}
		$juwuba = json_decode((string)$res->getBody(),TRUE);
		var_dump($juwuba['data']);
		$this->load->view('/welcome/index');
	}
}
