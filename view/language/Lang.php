<?php

/**
 * Created by PhpStorm.
 * User: programer
 * Date: 4/25/2017
 * Time: 7:11 AM
 */

use Config\Config;

/**
 * Class Lang
 *
 * @author Dusan Perisic
 */
class Lang
{
    /**
     * @param string $file
     * @param string $key
     * @return mixed|string
     * @author Dusan Perisic
     */
    public static function get( string $file, string $key)
    {
        $dictionary = [];
        $config = Config::getLang();
        if (file_exists("view/language/{$config}/{$file}.php"))
        {
            require "view/language/{$config}/{$file}.php";
            if (isset($dictionary[$key]))
                return $dictionary[$key];
        }
        return "{$file}.{$key}";
    }

    /**
     * @param string $file
     * @param string $key
     * @return null
     * @author Dusan Perisic
     */
    public static function echo( string $file, string $key)
    {
        echo self::get($file, $key);
        return null;
    }
}