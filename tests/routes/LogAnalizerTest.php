<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 5/10/2017
 * Time: 10:06
 */

use PHPUnit\Framework\TestCase;

class LogAnalizerTest extends TestCase
{
    private $router;

    public function __construct(){
        parent::__construct();
        $this->router = new Router("/log-analizer");
        $this->router->add('/log-analizer', 'HomeController@logAnalizer');
    }
    public function testLogAnalyzerPageEn()
    {
        \Config\Config::setLang('en');
        $this->router->run();
        $output = $this->getActualOutput();
        $this->assertTrue(strpos($output, "First Name") > -1);
        $this->assertTrue(strstr($output, "Last Name") > -1);
        $this->assertTrue(strstr($output, "Username") > -1);
        $this->assertTrue(strstr($output, "Serial") > -1);
        $this->assertTrue(true);
    }
    public function testLogAnalyzerPageSr()
    {
        \Config\Config::setLang('sr');
        $this->router->run();
        $output = $this->getActualOutput();
        $this->assertTrue(strpos($output, "Име") > -1);
        $this->assertTrue(strstr($output, "Презиме") > -1);
        $this->assertTrue(strstr($output, "Корисничко име") > -1);
        $this->assertTrue(strstr($output, "Серијски број") > -1);
        $this->assertTrue(true);
    }
}
?>