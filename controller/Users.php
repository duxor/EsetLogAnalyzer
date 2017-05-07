<?php

/**
 * Created by PhpStorm.
 * User: programer
 * Date: 4/18/2017
 * Time: 11:10 AM
 */

class Users
{
    /**
     * @var array
     */
    public $usersList;

    /**
     * Korisnici constructor.
     */
    public function __construct()
    {
        $this->usersList = [];
    }

    /**
     * @param string $name
     * @param string $computer
     * @param string $deviceType
     * @param string $deviceMeta
     * @param int $allowed
     * @return User|mixed
     */
    //ToDo: Izmijeniti obavezne parametre - odvojiti korisnicke od podataka uredjaja u dva niza
    public function add(
        string $name,
        string $computer,
        string $deviceType,
        string $deviceMeta,
        int $allowed
    )
    {
        foreach ($this->usersList as $i => $user)
        {
            if ($user->getName() == $name && $user->getComputer() == $computer)
            {
                $this->usersList[$i]->add($deviceType, $deviceMeta, $allowed);
                return $this->usersList[$i];
            }
        }
        $added = new User($name, $computer, $deviceType, $deviceMeta, $allowed);
        array_push($this->usersList, $added);
        return $added;

    }

    /**
     * @return array
     */
    public function toArray()
    {
        $output = [];
        foreach ($this->usersList as $user) {
            array_push($output, $user->toArray());
        }
        return $output;
    }
}