<?php

namespace App\Classes;

class Validate
{
    private $erros = [];

    public function required(array $fields)
    {
        foreach($fields as $field)
        {
            if(empty($_POST[$field]))
            {
                $this->erros[$field] = 'O campo é obrigatório';
            }    
        }

        return $this;
    }

    public function exist($model, $field, $value)
    {
        $user = $model->findBy($field, $value);

        if($user)
        {
            $this->erros[$field] = 'Este e-mail já está cadastrado';
        }

        return $this;
    }

    public function getErros()
    {
        return $this->erros;
    }
}