<?php

/**
 * Created by PhpStorm.
 * User: programer
 * Date: 4/24/2017
 * Time: 8:08 AM
 */

namespace Model\Db;

use Config\Config;

class DB
{
    /**
     * @var
     */
    private $conn;
    /**
     * @var string
     */
    private $dbPath;
    /**
     * @var
     */
    private $connectionString;
    /**
     * @var
     */
    private $username;
    /**
     * @var
     */
    private $password;
    /**
     * @var
     */
    private $fields;

    /**
     * DB constructor.
     */
    public function __construct()
    {
        $this->dbPath = Config::getDbPath();
        $this->connectionString = "odbc:Driver={Microsoft Access Driver (*.mdb)};Dbq={$this->dbPath};";
        $this->connect();
        $this->fields = [
            ["Client","Name"],
            ["Client","ComputerName"],
            ["DeviceControlLog","UserName"],
            ["DeviceControlLog","Details"],
        ];
    }

    /**
     *
     */
    private function connect(){
        $this->conn = new \PDO($this->connectionString, $this->username, $this->password);
    }

    /**
     * @param string $sql
     * @return mixed
     */
    private function query(string $sql)
    {
        $rs = $this->conn->prepare($sql);
        $rs->execute();
        $rs = $rs->fetchAll();
        return $rs;
    }

    /**
     * @return mixed
     */
    public function getRows(array $fields = [])
    {
        $query = "SELECT";
        $first = 0;
        foreach ($this->fields as $i => $field)
            if (count($fields) == 0 || in_array($field[1], $fields))
                $query .= ($i > 0 ? "," : "") . " {$field[0]}.{$field[1]}";
        $query .= ", DeviceControlLog.DateReceived, 
                  FTDeviceCClass.Txt as FTDeviceCClass, 
                  FTDeviceCAction.Txt as FTDeviceCAction
                  FROM (
                    (Client INNER JOIN DeviceControlLog ON Client.ID = DeviceControlLog.ClientID) 
                    INNER JOIN FTDeviceCClass ON DeviceControlLog.FTDeviceCClassID = FTDeviceCClass.ID) 
                    INNER JOIN FTDeviceCAction ON DeviceControlLog.FTDeviceCActionID = FTDeviceCAction.ID;";

        return $this->query($query);
    }
}