<?php
/**
 * Created by PhpStorm.
 * User: programer
 * Date: 4/11/2017
 * Time: 11:32 AM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php Lang::echo("master", "title") ?></title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
<div class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <?php Lang::echo("master", "title") ?>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/"><?php Lang::echo("master", "pocetna") ?></a></li>
                <li><a href="/log-analizer"><?php Lang::echo("master", "analizator") ?></a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
