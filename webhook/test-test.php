
<?php

/* Webhook Script for 7 Days BOT */

/* Please note that it support only LINE Messaging API for now */

// Recieve INPUT Data //

function processMessage($update) {

    if($update["result"]["action"] == "sayHello"){

        $userDataGET = json_encode($update["originalRequest"]["data"]["data"]["source"]["userId"]);

        $userDataGET = substr($userDataGET,1,-1);
        
        $userDataGET2 = json_encode($update["originalRequest"]["data"]["data"]["source"]["groupId"]);

        $userDataGET2 = substr($userDataGET,1,-1);

        

       // $url = 'https://api.line.me/v2/bot/profile/'.$userDataGET;
        $url = 'https://api.line.me/v2/bot/group/'.$userDataGET2.'/member/'.$userDataGET;

$headers = array('Authorization: Bearer 7fTjK4baPHngWnXtFs4r41HcLucnTPLhyu3S/eoWP1dguioSWB948pjX5Z6+j+ugOqD/LwpoQCauRXlfSVA8VE9jJX/bFkpR99TBa7wAoO7pwMVtLQlsbr9umGE1vH8wDwOV4jlyZ1wwh6HGCGpZRAdB04t89/1O/w1cDnyilFU=');

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

$result = curl_exec($ch);


$finale = json_decode($result, true);

        sendMessage(

            

           array(

  "messages" => [ array(

      "type" => 4,

      "payload" => array(

          "line" => array(

          "type" => "text",

          "text" => "เรียกบ่อยๆ ระวังไว้เถอะ ".$userDataGET." แร้วจะหาว่าไม่เตือน!"

))

  )]

)

            

        );

    }

}

function sendMessage($parameters) {

    //$finale = json_decode($parameters);

    echo json_encode($parameters);

}

$update_response = file_get_contents("php://input");

$update = json_decode($update_response, true);

if (isset($update["result"]["action"])) {

    processMessage($update);

}

/* Developed by 7 Days Team, Trained by Club Everyday's Members */
curl_close($ch);
?>
