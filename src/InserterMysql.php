<?php

namespace App;

/**
 * Для избежания повторения кода, для двух разных таблиц MySql (отличаются только типом полей)
 * созданы наследники. Вся логика определена в этом классе.
 */
abstract class InserterMysql extends DataInserter
{
    private \PDO $mysqlConnection;

    protected string $tableName = ''; // !!! Присвоить в наследнике!

    protected abstract function setTableName();

    public function __construct() {
        $this->mysqlConnection = Connections::getInstance()->getMysql();
        $this->setTableName();
        $this->mysqlConnection->query('DELETE FROM `' . $this->tableName . '`;');
    }

    protected function executeInsert(array &$data)
    {
        foreach ($data as $item) {
            $sql = 'INSERT INTO `' . $this->tableName . '` (`key`, `value`) VALUES ("' . $item['key'] . '", "' . $item['value'] . '");';
            $this->mysqlConnection->query($sql);
        }
    }
}
