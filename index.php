<?php

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if ($method == 'POST') {
    
    $requestBody = file_get_contents('php://input');
    $json        = json_decode($requestBody);
    
    sleep(5);
    
    $speech = "Primer mensaje";
    $speech2 = "Segundo mensaje";
    
    $response              = new \stdClass();
    $response->speech      = $speech;
    $response->displayText = $speech;
    $response->source      = "webhook";
    
    echo json_encode($speech);
    
    sleep(20);
    
    echo json_encode($speech2);
    
} else {
    
    echo "Method not allowed";

}

?> 
