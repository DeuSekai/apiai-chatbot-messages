<?php

function sendMessage($parameters) {
    echo json_encode($parameters);
}

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if ($method == 'POST') {
    
    $update_response = file_get_contents("php://input");
    $update          = json_decode($update_response, true);
    
    if ($update["queryResult"]["action"] == "sayHello") {
        $week = array(
            "Domingo",
            "Lunes",
            "Martes",
            "Miercoles",
            "Jueves",
            "Viernes",
            "Sábado"
        );
        $day  = $week[date('w')];
        //1 seconds delay
        sleep(1);
        
        sendMessage(array(
            "source" => $update["responseId"],
            "fulfillmentText"=>"Hola, ¡feliz {$day}!, Podrías compartirnos tu nombre completo y de qué estado de la república nos contactas para brindarte un mejor servicio. 𝗧𝗲 𝗿𝗲𝗰𝗼𝗿𝗱𝗮𝗺𝗼𝘀 𝗾𝘂𝗲 𝗻𝘂𝗲𝘀𝘁𝗿𝗼𝘀 𝘁𝗿𝗮𝗺𝗶𝘁𝗲𝘀 𝘀𝗼𝗻 𝘁𝗼𝘁𝗮𝗹𝗺𝗲𝗻𝘁𝗲 𝗴𝗿𝗮𝘁𝘂𝗶𝘁𝗼𝘀 😊",
            "payload" => array(
                "items"=>[
                    array(
                        "simpleResponse"=>
                    array(
                        "textToSpeech"=>"response from host"
                         )
                    )
                ],
                ),
           
        ));
        
        
    } else {
        //1 seconds delay
        sleep(4);


        sendMessage(array(
            "source" => $update["responseId"],
            "fulfillmentText"=>NULL,
            "payload" => array(
                "items"=>[
                    array(
                        "simpleResponse"=>
                    array(
                        "textToSpeech"=>"response from host"
                         )
                    )
                ],
                ),
           
        ));

        
    }
    
    
} else {
    
    echo "Method not allowed";
    
}

?> 



       
