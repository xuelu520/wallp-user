<?php
/**
 * Created by PhpStorm.
 * User: m_xuelu
 * Date: 2015/12/30
 * Time: 23:24
 */
use GuzzleHttp\Client;
class User_Model extends CI_Model {
    const TABLE_USERS = "users";
    const TABLE_OPEN = "open_login";
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


    /**
     * 查询三方用户
     * @param $openid
     * @param $type
     * @return mixed
     */
    function open_user($openid,$type) {
        $sql = "SELECT user.id user_id,user.user_name user_name
                FROM " . self::TABLE_OPEN ." as open
                LEFT JOIN ". self::TABLE_USERS . "as user on user.id = open.user_id
                WHERE open.openid = ".$openid . " AND open.type = ".$type;
        return $this->db->query($sql)->result();
    }
}