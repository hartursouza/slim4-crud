<?php

namespace App\Controllers;

use League\Plates\Engine;

class Controller {
    // Create new Plates instance
    private $templates;

    public function __construct() {
        // Criando uma nova instância do Plates Engine
        $this->templates = new Engine(PATH_VIEWS);
    }

    public function getTemplates()
    {
        return $this->templates;
    }
}