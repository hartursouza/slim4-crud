<?php

function removeLastCharacter($str) {
    return substr($str, 0, -2); // Retorna a string sem o último caractere
}