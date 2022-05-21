<?php
ini_set('max_execution_time', 0); // Не предсказуемо, как долго будет выполняться скрипт
require_once __DIR__ . '/vendor/autoload.php';

$data = [];
$marker1 = new \App\Helpers\Timer();

//$marker1->start();
\App\Helpers\GenerateData::generate($data);
$r = (new \App\InserterRedis())->mainExecute($data);
//$r = (new \App\InserterMysqlText())->mainExecute($data);
print_r($r);

//echo $marker1->end();



//print_r(\App\Connections::getInstance()->getRedis());

//echo ini_get('max_execution_time');
//phpinfo();
