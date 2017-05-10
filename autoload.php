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
    'model/db/DB.php',
    'model/Model.php',
    'model/User.php',
    'model/Device.php',
    'model/group/Users.php',
    'model/group/Devices.php',
    'model/group/AllowedDevices.php',
    'controller/Controller.php',
    'controller/HomeController.php',
    'view/language/Lang.php',
];

foreach ($classes as $class)
    require_once $class;