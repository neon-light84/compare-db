<?php

namespace App;
use \App\Config\MainConfig;

class InserterMysqlVarchar extends InserterMysql
{
    protected function setTableName() {
        $this->tableName = MainConfig::$mysqlTables['varchar'];
    }

}
