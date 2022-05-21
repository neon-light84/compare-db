<?php

namespace App;

use \App\Helpers\Timer;

abstract class DataInserter
{
    protected abstract function executeInsert(array &$data);

    /**
     * Инициализировать подключение к БД, почистить данные. Метод mainExecute надо максимально разгрузить
     * от лишних действий.
     */
    public abstract function __construct();

    /**
     * Тут и происходит вставка и замер времени.
     * @param $data
     * @return array
     */
    public function mainExecute(array &$data): array {
        $timer = new Timer();
        $timer->start();
        $this->executeInsert($data);
        $interval = $timer->end();

        return ['time_total' => $interval, 'time_avg' => $interval / count($data)];
    }
}
