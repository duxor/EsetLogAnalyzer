<?php

/**
 * Created by PhpStorm.
 * User: programer
 * Date: 4/25/2017
 * Time: 7:13 AM
 */

namespace Config;

class Config
{
    public static function getAll()
    {
        return [
            'lang' => 'en',
            'dbPath' => 'storage/DB.mdb'
        ];
    }
    public static function get(string $key)
    {
        $all = static::getAll();
        return isset($all[$key]) ? $all[$key] : null;
    }
}