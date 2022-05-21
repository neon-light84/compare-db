<?php

namespace App;

class InserterRedis extends DataInserter
{
    private $redisConnection;

    public function __construct() {
        $this->redisConnection = Connections::getInstance()->getRedis();
        $this->redisConnection->flushDB();
    }

    protected function executeInsert(array &$data)
    {
        foreach ($data as $item) {
            $this->redisConnection->set($item['key'], $item['value']);
        }
    }
}
