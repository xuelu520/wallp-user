<?php
/**
 * Created by PhpStorm.
 * User: m_xuelu
 * Date: 2015/12/13
 * Time: 3:09
 */
use Predis\Client;
class WRedis {
    protected static $redis;
    public function __construct() {
        if(!self::$redis) {
            include (APPPATH."config/redis.php");
            self::$redis =  new Client($config);
        }
    }

    public function set($key, $value, $ttl=0){
        self::$redis->set($key, $value);
        if($ttl > 0){
            self::$redis->expire($key, $ttl);
        }
    }

    public function get($key) {
        return self::$redis->get($key);
    }

    public function del($key) {
        self::$redis->expire($key, 0);
    }

}