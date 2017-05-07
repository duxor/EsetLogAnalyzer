<?php
/**
 * Created by PhpStorm.
 * User: programer
 * Date: 4/11/2017
 * Time: 11:32 AM
 */

    require_once "autoload.php";
    $router = new Router();

    //$router->add('/route-name', 'controller');
    $router->add('/', 'HomeController@index');
    $router->add('/index', 'HomeController@index');
    $router->add('/log-analizer', 'HomeController@logAnalizer');

    $router->run();

?>