<?php

namespace App\Helpers;

class Timer
{
    private int $microtimeStart = -1;

    public function start() {
        $this->microtimeStart = \microtime(true);
    }

    public function end() {
        if ($this->microtimeStart > 0) {
            return \microtime(true) - $this->microtimeStart;
        }
        else {
            // Если end вызвали раньше чем start
            return -1;
        }
    }

}
