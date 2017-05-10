<?php

/**
 * Created by PhpStorm.
 * User: programer
 * Date: 4/25/2017
 * Time: 7:13 AM
 */

namespace Config;

/**
 * Class Config
 *
 * @package Config
 * @author  Dusan Perisic
 */
final class Config
{
    /**
     * @var string
     */
    private static $lang     = "en";
    /**
     * @var string
     */
    private static $dbPath   = "storage/DB.mdb";
    /**
     * @var null
     */
    private static $instance = null;

    /**
     * @return null
     * @author Dusan Perisic
     */
    public static function getInstance()
    {
        if (!static::$instance)
        {
            static::$instance = new Config();
        }
        return static::$instance;
    }

    /**
     * Config constructor.
     */
    protected function __construct(){}

    /**
     * @return string
     */
    public static function getLang(): string{
        return self::$lang;
    }

    /**
     * @return string
     */
    public static function getDbPath(): string{
        return self::$dbPath;
    }

    /**
     * @param string $lang
     */
    public static function setLang( string $lang ){
        self::$lang = $lang;
    }

    /**
     * @param string $dbPath
     */
    public static function setDbPath( string $dbPath ){
        self::$dbPath = $dbPath;
    }

}