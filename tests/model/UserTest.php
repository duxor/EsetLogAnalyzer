<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 5/10/2017
 * Time: 10:06
 */

use PHPUnit\Framework\TestCase;
use Model\User;

/**
 * Class UserTest
 *
 * @author Dusan Perisic
 */
class UserTest extends TestCase
{
    /**
     * @var \Model\User
     */
    private $user;
    /**
     * @var array
     */
    private $output;

    /**
     * UserTest constructor.
     */
    public function __construct(){
        parent::__construct();
        $this->user = new User("FirstName LastName", "ComputerName", "DeviceType", "DeviceMeta", 1);
        $this->output = [
            "name"      => "FirstName LastName",
            "computer"  => "ComputerName",
            "devices"   => [
                [
                    "type"      => "DeviceType",
                    "meta"      => "DeviceMeta",
                    "allowed"   => 1
                ]
            ]
        ];
    }

    /**
     * @author Dusan Perisic
     */
    public function testBasicToArray()
    {
        $this->assertEquals($this->output, $this->user->toArray());
    }

    /**
     * @author Dusan Perisic
     */
    public function testAddExistingDevice()
    {
        $this->user->add("DeviceType", "DeviceMeta", 1);
        $this->assertEquals($this->output, $this->user->toArray());
    }

    /**
     * @author Dusan Perisic
     */
    public function testGetters()
    {
        $this->assertEquals($this->output["name"], $this->user->getName());
        $this->assertEquals($this->output["computer"], $this->user->getComputer());
    }

    /**
     * @author Dusan Perisic
     */
    public function testIsEqal()
    {
        $this->assertTrue($this->user->isEqual(new User("FirstName LastName", "ComputerName", "", "")));
        $this->assertFalse($this->user->isEqual(new User("FirstName LastName2", "ComputerName", "", "")));
        $this->assertFalse($this->user->isEqual(new User("FirstName LastName", "ComputerName2", "", "")));
    }

    /**
     * @author Dusan Perisic
     */
    public function testNewDevice()
    {
        $newDevice = [
            "type"      => "Type",
            "meta"      => "Meta",
            "allowed"   => 1
        ];
        array_push($this->output["devices"], $newDevice);
        $this->user->add($newDevice["type"], $newDevice["meta"], $newDevice["allowed"]);
        $this->assertEquals($this->output, $this->user->toArray());
    }
}
?>