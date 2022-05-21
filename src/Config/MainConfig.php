<?php
namespace App\Config;

class MainConfig
{
    public static $dbMysql = [
        'host' => 'localhost',
        'db_name' => 'test',
        'user' => 'test',
        'password' => 'test',
    ];
    public static $dbRedis = [
        'host' => 'localhost',
        'port' => '6379',
    ];
    public static $mysqlTables = [
        'varchar' => 'varchar',
        'text' => 'text',
    ];
}
