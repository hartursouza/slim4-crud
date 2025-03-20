<?php

namespace App\Classes;

use App\Database\Models\User;

class Login {
    
    public function login(string $email, string $password) 
    {
        $user = new User;

        $userFound = $user->findBy('email', $email);

        if (!$userFound) {
            return false;
        }

        if(password_verify($password, $userFound->password))
        {
            $_SESSION['user_logged_data'] = [
                'name' => $userFound->name,
                'email' => $userFound->email
            ]; 
            $_SESSION['is_logged_in'] =  true;
            return true;
        }

        return false;
    }

    public function logout()
    {
        unset( $_SESSION['user_logged_data'], $_SESSION['is_logged_in']);
        
        return true;
    }
}