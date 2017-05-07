<?php

/**
 * Created by PhpStorm.
 * User: programer
 * Date: 4/24/2017
 * Time: 7:48 AM
 */
class AllowedDevices
{
    /**
     * @var Devices
     */
    private $listAllowedDevices;

    /**
     * OdobreniUredjaji constructor.
     */
    public function __construct()
    {
        //Test device
        $this->listAllowedDevices = new Devices();
        $this->listAllowedDevices->add("Disk storage","Serial number: 12345600000000234D");
    }

    /**
     * @param Device $_device
     * @return bool
     */
    public function isAllowed(Device $_device)
    {
        foreach ($this->listAllowedDevices->toArray() as $device)
        {
            if($device["meta"])
                if (strstr($_device->getMeta(), $device["meta"]) > -1)
                    return true;
        }
        return false;
    }
}