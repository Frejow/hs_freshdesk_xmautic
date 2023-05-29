<?php
$files = file_get_contents('php://input');
try {

    $jsonData = json_decode($files);
    file_put_contents(getcwd().'/log.txt', print_r($jsonData, true));
    
}
catch(Exception $e) {

    error_log(print_r($e, true));

}

