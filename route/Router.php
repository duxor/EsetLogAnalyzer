<?php

/**
 * Created by PhpStorm.
 * User: programer
 * Date: 4/24/2017
 * Time: 11:00 AM
 */

class Router
{
    /**
     * @var array
     */
    private $routeList;
    /**
     * @var string
     */
    private $route;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->routeList = [];
        $this->route = trim($_SERVER["REQUEST_URI"], "/");
        if (!$this->route)
            $this->route = "index";
    }

    /**
     * @param string $routeName
     * @param string $controllerName
     */
    public function add(string $routeName, string $controllerName)
    {
        array_push($this->routeList, [
            "name" => trim($routeName, "/"),
            "controller" => $controllerName
        ]);
    }

    /**
     * @return array|null
     */
    private function find()
    {
        foreach ($this->routeList as $route)
        {
            if ($route["name"] == $this->route)
            {
                return explode("@", $route["controller"]);
            }
        }
        return null;
    }

    /**
     *
     */
    public function run()
    {
        $route = $this->find();
        if ($route && file_exists("view/{$this->route}.php") && file_exists("controller/{$route[0]}.php"))
        {
            $data   = new $route[0]();
            $route  = $route[1];
            $data   = $data->$route();
        }
        else
        {
            $this->route = "error";
            $data = Lang::get("errors", "pageNotFound");
            /*if (!file_exists("controller/{$route[0]}.php"))
                $data = Lang::get("errors", "controllerNotFound");
            else $data = Lang::get("errors", "pageNotFound");*/
        }

        require_once "view/{$this->route}.php";
    }
}