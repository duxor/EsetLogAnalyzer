<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 5/10/2017
 * Time: 08:52
 */

namespace Model;


interface Model {
    public function toArray();
    public function isEqual(Model $model);
}