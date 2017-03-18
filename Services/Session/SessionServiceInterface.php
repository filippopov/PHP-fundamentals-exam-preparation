<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 18.3.2017 г.
 * Time: 19:08
 */

namespace Services\Session;


interface SessionServiceInterface
{
    public function setSession($key, $value);

    public function getSession($key);

    public function unsetSession($key);

    public function isSetSession($key) : bool;
}