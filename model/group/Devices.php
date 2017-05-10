<?php
/**
 * Created by PhpStorm.
 * User: programer
 * Date: 4/20/2017
 * Time: 9:26 AM
 */

namespace Model\Group;

use Model\Device;

class Devices
{
    /**
     * @var array
     */
    private $devicesList;

    /**
     * Uredjaji constructor.
     * @param string $deviceType
     * @param string $deviceMeta
     * @param int $allowed
     */
    public function __construct(string $deviceType = "",
                                string $deviceMeta = "",
                                int $allowed = 0)
    {
        $this->devicesList = [];
        $this->add($deviceType, $deviceMeta, $allowed);
    }

    /**
     * @param string $deviceType
     * @param string $deviceMeta
     * @param int $allowed
     * @return mixed|Device
     */
    public function add(string $deviceType,
                        string $deviceMeta,
                        int $allowed = 0)
    {
        $added = new Device($deviceType, $deviceMeta, $allowed);
        foreach ($this->devicesList as $device)
        {
            if ($device->isEqual($added))
            {
                //ToDo: Dodati logiku za evidentiranje ponovnog pristupa uredjaju
                return $device;
            }
        }
        array_push($this->devicesList, $added);
        return $added;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $output = [];
        foreach ($this->devicesList as $device)
        {
            array_push($output, $device->toArray());
        }
        return $output;
    }
}