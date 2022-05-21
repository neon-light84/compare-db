<?php
namespace App\Helpers;

class GenerateData
{
    const PERMITTED_CHARS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    const DATA_STR_COUNT = 100000;
    const VALUE_LENGTH_MIN = 500;
    const VALUE_LENGTH_MAX = 2000;

    private static function generate_string(int $strength = 16): string {
        $input_length = strlen(static::PERMITTED_CHARS);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = static::PERMITTED_CHARS[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }

    /**
     * @param $dataOut  Большие объемы данных, надо передавать по ссылке.
     */
    public static function generate(&$dataOut) {
        $dataOut = [];
        for ($i = 1; $i <= static::DATA_STR_COUNT; $i++) {
            $key = 'cat_' . str_pad( (int)($i / 100), 4, '0', \STR_PAD_LEFT )
                . ':' . str_pad($i, 6, '0', \STR_PAD_LEFT)
                . '_' . static::generate_string(16);
            $value = static::generate_string(mt_rand(static::VALUE_LENGTH_MIN, static::VALUE_LENGTH_MAX));
            $dataOut[] = compact('key', 'value');
        }
    }
}
