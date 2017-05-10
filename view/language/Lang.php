<?php

/**
 * Created by PhpStorm.
 * User: programer
 * Date: 4/25/2017
 * Time: 7:11 AM
 */

use Config\Config;

class Lang
{
    public static function get(string $file, string $key)
    {
        $dictionary = [];
        $config = Config::get("lang");
        if (file_exists("view/language/{$config}/{$file}.php"))
        {
            require "view/language/{$config}/{$file}.php";
            if (isset($dictionary[$key]))
                return $dictionary[$key];
        }
        return "{$file}.{$key}";
    }

    public static function echo(string $file, string $key)
    {
        echo self::get($file, $key);
        return null;
    }
}