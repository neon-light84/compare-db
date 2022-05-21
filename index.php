<?php
ini_set('max_execution_time', 0); // Не предсказуемо, как долго будет выполняться скрипт
require_once __DIR__ . '/vendor/autoload.php';

$result = \App\Application::start();

echo "Результаты:\n";
echo "-----------------:\n";
echo "Redis:\n";
print_r($result['redis']);
echo "-----------------:\n";
echo "MySql, varchar:\n";
print_r($result['mysql_varchar']);
echo "-----------------:\n";
echo "MySql, text:\n";
print_r($result['mysql_text']);
