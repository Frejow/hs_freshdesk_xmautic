<?php

try {

    $jsonData = json_decode(file_get_contents('php://input'), true);
    
}
catch(Exception $e) {

    error_log(print_r($e, true));
    
}

