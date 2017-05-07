<?php
/**
 * Created by PhpStorm.
 * User: programer
 * Date: 4/18/2017
 * Time: 11:11 AM
 */

$classes = [
    'config/Config.php',
    'route/Router.php',
    'model/DB.php',
    'model/User.php',
    'model/Device.php',
    'controller/HomeController.php',
    'controller/Users.php',
    'controller/Devices.php',
    'controller/AllowedDevices.php',
    'view/language/Lang.php',
];

foreach ($classes as $class)
    require_once $class;