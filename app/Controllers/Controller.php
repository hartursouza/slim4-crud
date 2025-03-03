<?php

namespace App\Controllers;

use League\Plates\Engine;

abstract class Controller {
    
    protected $templates;

    public function __construct($viewFolder = '') {
        $path = PATH_VIEWS . ($viewFolder ? "/{$viewFolder}//" : '');
        $this->templates = new Engine($path);
    }

    public function getTemplate(string $template, array $args)
    {
        return $this->templates->render($template, $args);
    }
}