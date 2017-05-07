<?php
/**
 * Created by PhpStorm.
 * User: programer
 * Date: 4/11/2017
 * Time: 11:32 AM
 */

    require_once "layouts/master.php";
?>

<div class="container">
    <h1><?php Lang::echo("index", "title") ?></h1>

    <form class="row form-horizontal" action="/log-analizer" method="post">
        <!--<input type="checkbox" name="Name" value="Name"> Name <br>
        <input type="checkbox" name="ComputerName" value="ComputerName"> ComputerName <br>
        <input type="checkbox" name="UserName" value="UserName"> UserName <br>
        <input type="checkbox" name="FTDeviceCClass" value="FTDeviceCClass"> FTDeviceCClass <br>
        <input type="checkbox" name="Details" value="Details"> Details <br>
        <input type="checkbox" name="FTDeviceCAction" value="FTDeviceCAction"> FTDeviceCAction <br><br>-->

        <button class="btn btn-primary">
            <?php Lang::echo("index", "doAnaliseBtn") ?>
        </button>
    </form>
</div>