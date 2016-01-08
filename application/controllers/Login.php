<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 处理第三登录回调验证
 * Class User
 */

use GuzzleHttp\Client;
class Login extends CI_Controller {

	/**
	 * 三方登录主方法
	 */
	public function index() {
		$type = $this->input->get('type',TRUE);
		$type = $type ? :'qq';
		switch ($type) {
			case 'qq':
				$this->qq_login();
				break;
		}
	}

	//用户点击qq登录按钮调用此函数
	private function qq_login() {
		$state = md5(uniqid(rand(), TRUE)); //CSRF protection
		$login_url = "https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id="
			. QQ_APPID . "&redirect_uri=" . urlencode(QQ_CALLBACK_URL)
			. "&state=" . $state
			. "&scope=".QQ_SCOPE;
		header("Location:$login_url");exit;
	}
}
