<?php

namespace App;
use \App\Config\MainConfig;

class InserterMysqlText extends InserterMysql
{
    protected function setTableName() {
        $this->tableName = MainConfig::$mysqlTables['text'];
    }

}
