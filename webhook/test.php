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
         "type" => "image",
    "originalContentUrl" => "https://www.zcooby.com/wp-content/uploads/2015/05/04-thursday.jpg",
    "previewImageUrl" => "https://www.zcooby.com/wp-content/uploads/2015/05/04-thursday.jpg"
))
  )]
)
            
        );
    } else if($update["result"]["action"] == "mornor1"){
        sendMessage(
            
           array(
  "messages" => [ array(
      "type" => 4,
      "payload" => array(
          "line" => array(
         "type" => "image",
    "originalContentUrl" => "https://upload.wikimedia.org/wikipedia/th/thumb/1/15/NU_Logo.png/1200px-NU_Logo.png",
    "previewImageUrl" => "https://upload.wikimedia.org/wikipedia/th/thumb/1/15/NU_Logo.png/1200px-NU_Logo.png"
))
  )]
)
            
        );
    } else if($update["result"]["action"] == "mornor2"){
        $userDataGET = json_encode($update["originalRequest"]["source"]["data"]["data"]["replyToken"]["source"]["userId"]);
        $userDataGET = substr($userDataGET,1,-1);
        
        $url = 'https://api.line.me/v2/profile/'.$userDataGET;
$headers = array('Authorization: Bearer 7fTjK4baPHngWnXtFs4r41HcLucnTPLhyu3S/eoWP1dguioSWB948pjX5Z6+j+ugOqD/LwpoQCauRXlfSVA8VE9jJX/bFkpR99TBa7wAoO7pwMVtLQlsbr9umGE1vH8wDwOV4jlyZ1wwh6HGCGpZRAdB04t89/1O/w1cDnyilFU=');
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);
$finale = json_decode($result, true);
        
        sendMessage(
            
           array(
  "messages" => [ array(
      "type" => 4,
      "payload" => array(
          "line" => array(
          "type" => "text",
          "text" => "สวัสดี ".$finale['displayName']."\nยินดีต้อนรับสู่มหาวิทยาลัยนเรศวร"
))
  )]
)
            
        );
    }
}


/* Developed by 7 Days Team, Trained by Club Everyday's Members */
?>
