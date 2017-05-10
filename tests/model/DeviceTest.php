<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 5/10/2017
 * Time: 10:06
 */

use PHPUnit\Framework\TestCase;
use Model\Device;

/**
 * Class DeviceTest
 *
 * @author Dusan Perisic
 */
class DeviceTest extends TestCase
{
    /**
     * @var \Model\User
     */
    private $device;
    /**
     * @var array
     */
    private $output;

    /**
     * UserTest constructor.
     */
    public function __construct(){
        parent::__construct();
        $this->device = new Device("DeviceType", "DeviceMeta", 1);
        $this->output = [
                    "type"      => "DeviceType",
                    "meta"      => "DeviceMeta",
                    "allowed"   => 1
        ];
    }

    /**
     * @author Dusan Perisic
     */
    public function testBasicToArray()
    {
        $this->assertEquals($this->output, $this->device->toArray());
    }

    /**
     * @author Dusan Perisic
     */
    public function testAddExistingDevice()
    {
        $this->assertEquals($this->output, $this->device->toArray());
    }
    public function testGetters()
    {
        $this->assertEquals("DeviceType", $this->device->getType());
        $this->assertEquals("DeviceMeta", $this->device->getMeta());
        $this->assertEquals(1, $this->device->getAllowed());
    }
    public function testIsEqual()
    {
        $this->assertTrue($this->device->isEqual(new Device("DeviceType", "DeviceMeta", 1)));
        $this->assertFalse($this->device->isEqual(new Device("DeviceType2", "DeviceMeta", 1)));
        $this->assertFalse($this->device->isEqual(new Device("DeviceType", "DeviceMeta2", 1)));
        $this->assertFalse($this->device->isEqual(new Device("DeviceType", "DeviceMeta", 0)));
    }
}
?>