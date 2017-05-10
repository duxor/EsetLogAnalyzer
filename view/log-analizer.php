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
    <div class="form-horizontal">
        <div class="form-group">
            <input class="form-control" id="find" placeholder="<?php Lang::echo("log-analizer", "firstName") ?> <?php Lang::echo("log-analizer", "lastName") ?>, <?php Lang::echo("log-analizer", "username") ?>, <?php Lang::echo("log-analizer", "serial") ?>..."
                   onkeyup="find()">
        </div>
    </div>

    <script>
        function find() {
            var txt = document.getElementById("find").value;
            var table = document.getElementById("results").children;
            for (var i = 0; i < table.length; i++) {
                if (table[i].innerHTML.indexOf(txt) > -1) {
                    if (table[i])
                        table[i].style.display = "table-row";
                }
                else {
                    if (table[i])
                        table[i].style.display = "none";
                }
            }
        }
    </script>
    <div class="row">
        <table class='table table-bordered' border='1'>
            <tbody id='results'>
            <?php
            foreach ($data["users"]->toArray() as $user) {
                echo "<tr><td>{$user["name"]}</td><td>{$user["computer"]}</td><td>";
                foreach ($user["devices"] as $device) {
                    $meta = explode(",", $device["meta"]);
                    $odobren = $device["allowed"] == 1 ? "Odobren" : "BLOKIRAN";
                    echo
                        "<span class=' alert-" . ($device["allowed"] ? "success" : "danger") . "'>
                                    {$device["type"]}<br>";
                    $odobren = $data["allowedDevices"]->isAllowed(new \Model\Device("", $device["meta"]));
                    foreach ($meta as $m) {
                        if (strstr($m, "Serial number") > -1) {
                            $out = !$odobren ? "<span class='alert-danger'>{$m}</span>" : $m;
                            echo "<b>{$out}</b><br>";
                        } else
                            echo $m . " <br>";
                    }
                    echo "</span> <br>";
                }
                echo "</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>