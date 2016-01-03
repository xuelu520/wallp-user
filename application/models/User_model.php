<?php
/**
 * Created by PhpStorm.
 * User: m_xuelu
 * Date: 2015/12/30
 * Time: 23:24
 */
use GuzzleHttp\Client;
class User_Model extends CI_Model {
    const TABLE_WALLS = "users";

    private $client;
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        //加载数据库
        $this->load->database('default');
        // 加载CURL组件
        $this->client = new Client();
    }
}