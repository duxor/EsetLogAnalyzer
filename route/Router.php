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
     *
     * @param null $route
     */
    public function __construct( $route = null)
    {
        if (!$route)
            $route = $_SERVER["REQUEST_URI"];

        $this->routeList = [];
        $this->route = trim($route, "/");
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
     * @author Dusan Perisic
     */
    public function run($route = null)
    {
        if ($route)
            $this->route = trim($route, "/");

        $route = $this->find();
        if ($route && file_exists("view/{$this->route}.php") && file_exists("controller/{$route[0]}.php"))
        {
            $controllerName = "Controller\\". $route[0];
            $data   = new $controllerName();
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

        include "view/{$this->route}.php";
    }
}