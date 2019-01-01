<?php
/* Webhook Script for 7 Days BOT */
/* Please note that it support only LINE Messaging API for now */
// Recieve INPUT Data //
function processMessage($update) {
    if($update["result"]["action"] == "sayHello"){
        $userDataGET = json_encode($update["originalRequest"]["data"]["data"]["source"]["userId"]);
        $userDataGET = substr($userDataGET,1,-1);
        
        $url = 'https://api.line.me/v2/bot/profile/'.$userDataGET;
$headers = array('Authorization: Bearer Lxqz2e+YBidafMeoIgAYTbcFEJtAaf0EJ9E715p1bU4d6UKk5M8dJ9lvkiMdagnmpkdt+uqdgDERWYJzh2XARz1wZStu4jCWotCDdJ4p1/9TORp6trSz7g1jsoNmB1kmGqdmWGLJ012QWauIs4NckQdB04t89/1O/w1cDnyilFU=');
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
          "text" => "เรียกบ่อยๆ ระวังไว้เถอะ ".$finale['displayName']." แร้วจะหาว่าไม่เตือน!"
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
?>
