<?php

namespace App\Classes;

class Flash
{
    public static function set($key, $message, $alert = 'success')
    {
        if(!isset($_SESSION[$key]))
        {
            $_SESSION[$key] = [
                'message' => $message,
                'alert' => $alert
            ];
        }
    }

    public static function get($key)
    {
        if(isset($_SESSION[$key]))
        {
            $flash = $_SESSION[$key];
            unset($_SESSION[$key]);

            return $flash;
        }
    }
}