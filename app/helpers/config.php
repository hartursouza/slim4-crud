<?php

define('ROOT', dirname(__FILE__, 3));
define('PATH_VIEWS', ROOT . '/app/Views');

/* BASE URL */
$baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
$baseUrl .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
define('BASE_URL', $baseUrl);