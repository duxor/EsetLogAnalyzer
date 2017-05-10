<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 5/10/2017
 * Time: 10:06
 */

use PHPUnit\Framework\TestCase;

/**
 * Class IndexTest
 *
 * @author Dusan Perisic
 */
class IndexTest extends TestCase
{
    /**
     * @var \Router
     */
    private $router;

    /**
     * IndexTest constructor.
     */
    public function __construct(){
        parent::__construct();
        $this->router = new Router("/");
        $this->router->add('/', 'HomeController@index');
        $this->router->add('/index', 'HomeController@index');
        $this->router->add('/log-analizer', 'HomeController@logAnalizer');
    }

    /**
     * @author Dusan Perisic
     */
    public function testIndexPageEn()
    {
        \Config\Config::setLang('en');
        $this->router->run();
        $output = $this->getActualOutput();
        $this->assertTrue(strpos($output, "ESET Log Analyzer") > -1);
        $this->assertTrue(strstr($output, "Go!") > -1);
        $this->assertTrue(true);
    }

    /**
     * @author Dusan Perisic
     */
    public function testIndexPageSr()
    {
        \Config\Config::setLang('sr');
        $this->router->run();
        $output = $this->getActualOutput();
        $this->assertTrue(strpos($output, "<i>ESET</i> лог анализатор") > -1);
        $this->assertTrue(strstr($output, "Изврши анализу логова!") > -1);
        $this->assertTrue(true);
    }
}
?>