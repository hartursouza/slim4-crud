<?php 

function redirect($response, $toPage, $httpStatus = 200)
{
    return $response->withHeader('location', $toPage)->withStatus($httpStatus);
}