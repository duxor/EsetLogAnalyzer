<?php

/**
 * Created by PhpStorm.
 * User: programer
 * Date: 4/24/2017
 * Time: 2:30 PM
 */
class HomeController
{
    public function index()
    {
        
    }
    public function logAnalizer()
    {
        $source = "db"; //db - file
        $k = new Users();

        if ($source == "db")
        {
            $accessDB = new DB();
            $rows = $accessDB->getRows($_POST);
            foreach ($rows as $row)
            {
                //ToDo: Izmijeniti logiku u skladu sa izborom polja za prikaz od strane kortisnika
                if ($row["Name"] && $row["UserName"] && $row["FTDeviceCClass"] && $row["Details"] && $row["FTDeviceCAction"])
                {
                    $k->add($row["Name"], $row["UserName"], $row["FTDeviceCClass"], $row["Details"] . ",". $row["DateReceived"], $row["FTDeviceCAction"] == "Blocked" ? 0 : 1);
                }
            }
        }
        else
        {
            $file = fopen('storage/log_utf8.txt', 'r');
            while (!feof($file))
            {
                $fileRead = fgetcsv($file);

                if ($fileRead[0] && $fileRead[1] && $fileRead[2] && $fileRead[3] && $fileRead[4])
                {
                    $k->add($fileRead[0],$fileRead[1],$fileRead[2],$fileRead[3],$fileRead[4] == "Blocked" ? 0 : 1);
                }
            }
        }

        return [
            "users" => $k,
            "allowedDevices" => new AllowedDevices()
        ];
    }

    public function test()
    {
        return "Test method!" . Lang::get("index","test");
    }
}