<?php

namespace App;
use \App\Helpers\GenerateData;

class Application
{
    public static function start(): array {
        $data = [];
        $result = [];
        GenerateData::generate($data);

        \sleep(20);  // Что быо "отдохнули" диск и прочие ресурсы. Скорее всего излишне.
        $result['redis'] = (new InserterRedis())->mainExecute($data);

        \sleep(20);
        $result['mysql_varchar'] = (new InserterMysqlVarchar())->mainExecute($data);

        \sleep(20);
        $result['mysql_text'] = (new InserterMysqlText())->mainExecute($data);

        return $result;
    }
}
