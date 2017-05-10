<?php

/**
 * Created by PhpStorm.
 * User: programer
 * Date: 4/18/2017
 * Time: 11:10 AM
 */

namespace Model;

use Model\Group\Devices;

class User implements Model
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $computer;
    /**
     * @var Devices
     */
    public $devicesList;

    /**
     * User constructor.
     * @param string $name
     * @param string $computer
     * @param string $deviceType
     * @param string $deviceMeta
     * @param int $deviceAllowed
     */
    //ToDo: Izmijeniti ulazne parametre - u dva niza odvojiti korisnika od uredjaja
    public function __construct(string $name,
                                string $computer,
                                string $deviceType,
                                string $deviceMeta,
                                int $deviceAllowed = 0)
    {
        $this->name             = $name;
        $this->computer         = $computer;
        $this->devicesList      = new Devices($deviceType, $deviceMeta, $deviceAllowed);
    }

    /**
     * @param string $deviceType
     * @param string $deviceMeta
     * @param int $deviceAllowed
     */
    public function add(string $deviceType,
                        string $deviceMeta,
                        int $deviceAllowed = 0)
    {
        $this->devicesList->add($deviceType, $deviceMeta, $deviceAllowed);
    }

    //ToDo: Izmijeniti getere u skladu sa novim ulaznim parametrima
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getComputer()
    {
        return $this->computer;
    }

    //ToDo: Izmijeniti metodu u skladu sa novim ulaznim parametrima
    /**
     * @return array
     */
    public function toArray()
    {
        return [
            "name"      => $this->getName(),
            "computer"  => $this->getComputer(),
            "devices"   => $this->devicesList->toArray()
        ];
    }

    //ToDo: Sagledati potrebu za ovom metodom, ukloniti ako ne treba
    /**
     * @param Model $user
     * @return bool
     */
    public function isEqual(Model $user)
    {
        return  $user->getName()        == $this->getName() &&
                $user->getComputer()    == $this->getComputer();
    }
}