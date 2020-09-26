<?php

function validationError($errors) {
    $validationError = array();
    foreach ($errors as $key => $message) {
        if (!isset($validationError[$key])) {
            $validationError[$key] = is_array($message) ? $message[0] : $message;
        }
    }
    return $validationError;
}

function getFristError($error) {
    if (count($error)) {
        $messgae = reset($error);
        return ucfirst($messgae);
    }
}
