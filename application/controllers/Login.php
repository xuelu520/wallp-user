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
		$_SESSION['login:qq:state'] = md5(uniqid(rand(), TRUE)); //CSRF protection
		$login_url = "https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id="
			. QQ_APPID . "&redirect_uri=" . urlencode(QQ_CALLBACK_URL)
			. "&state=" . $_SESSION['login:qq:state']
			. "&scope=".QQ_SCOPE;
		header("Location:$login_url");exit;
	}

	/**
	 * QQ登录回调地址
	 */
	public function qq() {
		echo "<h1>这是QQ登录的回调页面</h1>";
		$this->qq_callback();
		$this->qq_get_openid();

		$_SESSION["qq:access_token"];
		$_SESSION["qq:openid"];

		//查询本地数据库是否有对应的用户，没有则去获取QQ资料，添加本地用户
		$this->load->model('User_model','u_model');
		$user = $this->u_model->open_user($_SESSION["qq:openid"],USER_QQ);
		//用户不存在
		if(!$user) {
			//获取QQ用户资料
			$user = $this->qq_get_detail();
			var_dump($user);
			$user = json_decode($user);
			$user_name = $user->nickname;
			//添加用户
			$wp_user = $this->u_model->save();
			var_dump($wp_user);
		}
		//写入登录SESSION
		exit;
	}

	private function qq_callback()
	{
		//debug
		//print_r($_REQUEST);
		//print_r($_SESSION);
		$state = $this->input->get('state',TRUE);
		$code = $this->input->get('code',TRUE);
		if($state == $_SESSION['login:qq:state']) //csrf
		{
			$token_url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&"
				. "client_id=" . QQ_APPID . "&redirect_uri=" . urlencode(QQ_CALLBACK_URL)
				. "&client_secret=" . QQ_APPKEY . "&code=" . $code;

			$response = file_get_contents($token_url);
			if (strpos($response, "callback") !== false)
			{
				$lpos = strpos($response, "(");
				$rpos = strrpos($response, ")");
				$response  = substr($response, $lpos + 1, $rpos - $lpos -1);
				$msg = json_decode($response);
				if (isset($msg->error))
				{
					echo "<h3>error:</h3>" . $msg->error;
					echo "<h3>msg  :</h3>" . $msg->error_description;
					exit;
				}
			}

			$params = array();
			parse_str($response, $params);

			//debug
			print_r($params);

			//set access token to session
			$_SESSION["qq:access_token"] = $params["access_token"];

		}
		else
		{
			echo("<h1>回调验证失败！</h1>");
		}
	}

	private function qq_get_openid()
	{
		$graph_url = "https://graph.qq.com/oauth2.0/me?access_token="
			. $_SESSION['access_token'];

		$str  = file_get_contents($graph_url);
		if (strpos($str, "callback") !== false)
		{
			$lpos = strpos($str, "(");
			$rpos = strrpos($str, ")");
			$str  = substr($str, $lpos + 1, $rpos - $lpos -1);
		}

		$user = json_decode($str);
		if (isset($user->error))
		{
			echo "<h3>error:</h3>" . $user->error;
			echo "<h3>msg  :</h3>" . $user->error_description;
			exit;
		}
		echo "<br>";
		//debug
		var_dump($user);

		//set openid to session
		$_SESSION["qq:openid"] = $user->openid;
	}

	private function qq_get_detail() {
		$url = "https://graph.qq.com/user/get_user_info?oauth_consumer_key=" . QQ_APPID . "&".
			"access_token=". $_SESSION["qq:access_token"] .
			"&openid=" . $_SESSION["qq:openid"] . "&format=json";

		$response = file_get_contents($url);
		//"{ "ret": 0, "msg": "",
		// "is_lost":0, "nickname": "misaka",
		// "gender": "男", "province": "广东", "city": "深圳",
		// "year": "1999",
		// "figureurl": "http:\/\/qzapp.qlogo.cn\/qzapp\/101269058\/0A2FCA252EAD4567AF7831D25DBC8669\/30",
		// "figureurl_1": "http:\/\/qzapp.qlogo.cn\/qzapp\/101269058\/0A2FCA252EAD4567AF7831D25DBC8669\/50",
		// "figureurl_2": "http:\/\/qzapp.qlogo.cn\/qzapp\/101269058\/0A2FCA252EAD4567AF7831D25DBC8669\/100",
		// "figureurl_qq_1": "http:\/\/q.qlogo.cn\/qqapp\/101269058\/0A2FCA252EAD4567AF7831D25DBC8669\/40",
		// "figureurl_qq_2": "http:\/\/q.qlogo.cn\/qqapp\/101269058\/0A2FCA252EAD4567AF7831D25DBC8669\/100",
		// "is_yellow_vip": "0", "vip": "0", "yellow_vip_level": "0",
		// "level": "0", "is_yellow_year_vip": "0" } "
		return $response;
	}
}
