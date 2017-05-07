<?php

/**
 * Created by PhpStorm.
 * User: programer
 * Date: 4/18/2017
 * Time: 11:10 AM
 */
class Device
{
    /**
     * @var string
     */
    private $type;
    /**
     * @var string
     */
    private $meta;
    /**
     * @var int
     */
    private $allowed;

    /**
     * Device constructor.
     * @param string $deviceType
     * @param string $deviceMeta
     * @param int $allowed
     */
    //ToDo: Izmijeniti ulazne parametre - staviti niz
    public function __construct(string $deviceType,
                                string $deviceMeta,
                                int $allowed = 0)
    {
        $this->type     = $deviceType;
        $this->meta     = $deviceMeta;
        $this->allowed  = $allowed;
    }

    //ToDo: Izmijeniti getere u skladu sa novim ulaznim parametrima
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getMeta(): string
    {
        return $this->meta;
    }

    /**
     * @return int
     */
    public function getAllowed(): int
    {
        return $this->allowed;
    }

    //ToDo: Izmijeniti toArray u skladu sa novim ulaznim parametrima
    /**
     * @return array
     */
    public function toArray()
    {
        return [
            "type"      => $this->getType(),
            "meta"      => $this->getMeta(),
            "allowed"   => $this->getAllowed()
        ];
    }

    //ToDo: Sagledati da li postoji potreba za ovom metodom, ukloniti ako ne treba
    /**
     * @param Device $device
     * @return bool
     */
    public function isEqual(Device $device)
    {
        return  $device->getType()      == $this->getType() &&
                $device->getMeta()      == $this->getMeta() &&
                $device->getAllowed()   == $this->getAllowed();
    }
}