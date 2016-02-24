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
        $sql = "SELECT user.id user_id,user.username user_name
                FROM " . self::TABLE_OPEN ." as open
                LEFT JOIN ". self::TABLE_USERS . " as user on user.id = open.user_id
                WHERE open.openid = '".$openid . "' AND open.type = ".$type;
        return $this->db->query($sql)->row();
    }

    function save($openid,$username,$type) {
        //构造数据
        //开启事务
        $this->db->trans_begin();
        $user = ['username'=>$username,
            'create_time'=>time()];
        $user_insert = $this->db->insert(self::TABLE_USERS,$user);
        $user_id = "";
        $open_insert = false;
        if($user_insert) {
            $user_id = $this->db->insert_id();
            $open = ['user_id'=>$user_id, 'openid'=>$openid, 'type'=>$type];
            $open_insert = $this->db->insert(self::TABLE_OPEN,$open);
        }

        if ($user_insert && $open_insert) {
            $this->db->trans_commit();
            return $user_id;
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }

    /**
     * 使用access_token 查询未过期的授权用户
     * @param $token
     * @return mixed
     */
    function one_by_token($token) {
        $this->db->where('token',$token);
        $this->db->where('expire<=',time());
        return $this->db->row();
    }

    function one_by_uid($uid) {
        $this->db->where('id',$uid);
        return $this->db->row();
    }
}