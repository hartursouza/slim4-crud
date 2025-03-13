<?php 

function showMessageError(string $message, string $type = 'success') {
    if (!empty($message)) {
        return "<span class='alert alert-$type '>$message</span>";
    }
    return '';
}