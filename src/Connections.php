<?php

namespace App;
use App\Config\MainConfig;
use App\Helpers\DB;

/**
 * SingleTone реализация. Собраны коннекшены ко всем БД.
 * Вызывать так: Connections::getInstance()->getMysql();
 */
final class Connections
{
    private static $instance = null;

    private static $connectionMysql = null;
    private static $connectionRedis = null;

    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function getMysql () {
        if (static::$connectionMysql === null) {
            $db = MainConfig::$dbMysql;
            try {
                static::$connectionMysql = new \PDO(DB::createDsn($db['host'], $db['db_name'], 'mysql'), $db['user'], $db['password']);
            } catch (\PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        return static::$connectionMysql;
    }

    public function getRedis () {
        if (static::$connectionRedis === null) {
            $db = MainConfig::$dbRedis;
            try {
                $redis = new \Redis();
                $redis->connect($db['host'], $db['port']);
                static::$connectionRedis = $redis;
            } catch (\Exception $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        return static::$connectionRedis;
    }


    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize singleton");
    }
}
