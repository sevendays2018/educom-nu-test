<?php
/* Webhook Script for 7 Days BOT */
/* Please note that it support only LINE Messaging API for now */
/* Please note that this Webhook is for Dialogflow */

// Recieve INPUT Data //
$update_response = file_get_contents("php://input");
$update = json_decode($update_response, true);

// Check INPUT ACTION and Send to the Process //
if (isset($update["result"]["action"])) {
    processMessage($update);
}

// Function for Sending Back Response //
function sendMessage($parameters) {
    echo json_encode($parameters);
}

// ACTION and REPLY Process //
/* CODE HERE */
function processMessage($update) {
    if($update["result"]["action"] == "sayHello"){
        sendMessage(
            
           array(
  "messages" => [ array(
      "type" => 4,
      "payload" => array(
          "line" => array(
          "type" => "text",
          "text" => json_encode($update)
))
  )]
)
            
        );
    }
}


/* Developed by 7 Days Team, Trained by Club Everyday's Members */
?>
