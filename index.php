<?php
$files = file_get_contents('php://input');
try {

    $jsonData = json_decode($files);
    error_log(print_r($jsonData, true));
    
}
catch(Exception $e) {

    error_log(print_r($e, true));

}

