<?php

namespace App\Helpers;

class DB
{
    public static function createDsn($host, $dbName, $driver = 'mysql'): string {
        return "$driver:host=$host;dbname=$dbName";
    }

}
