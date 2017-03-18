<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 18.3.2017 г.
 * Time: 19:12
 */

namespace Services\Session;


class SessionService implements SessionServiceInterface
{
    public function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function getSession($key)
    {
        return $_SESSION[$key];
    }

    public function unsetSession($key)
    {
        unset($_SESSION[$key]);
    }

    public function isSetSession($key) : bool
    {
        return isset($_SESSION[$key]);
    }
}