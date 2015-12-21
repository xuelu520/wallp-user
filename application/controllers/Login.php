<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 处理第三登录回调验证
 * Class User
 */

use GuzzleHttp\Client;
class Login extends CI_Controller {

	public function index() {
		$type = $this->input->get('type'); //登录类型
	}
}
