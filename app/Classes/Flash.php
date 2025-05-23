<?php

namespace App\Classes;

class Flash
{
    public static function set($key, $message, $alert = 'success')
    {
        if(!isset($_SESSION['messages'][$key]))
        {
            $_SESSION['messages'][$key] = [
                'message' => $message,
                'alert' => $alert
            ];
        }
    }

    public static function get($key)
    {
        if(isset($_SESSION['messages'][$key]))
        {
            $flash = $_SESSION['messages'][$key];
            unset($_SESSION['messages'][$key]);

            return $flash;
        }
    }

    public static function flashes($flashes)
    {
        foreach ($flashes as $key => $message) 
        {
            self::set($key, $message, 'danger');
        }
    }

    public static function getAll()
    {
        if(isset($_SESSION['messages']))
        {
            $messages = [];

            foreach ($_SESSION['messages'] as $key => $message) 
            {
                $messages['messages'][$key] = $message;
                unset($_SESSION['messages'][$key]);
            }
        }

        return $messages['messages'] ?? [];
    }
}