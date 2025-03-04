<?php 

namespace App\Helpers;

function redirect($response, $to, $httpStatus = 200)
{
    return $response->withHeader('location', $to)->withStatus($httpStatus);
}