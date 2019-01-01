<?php
/* Webhook Script for 7 Days BOT */
/* Please note that it support only LINE Messaging API for now */
// Recieve INPUT Data //
function processMessage($update) {
    if($update["result"]["action"] == "sayHello"){
        sendMessage(
            
           array(
  "messages" => [ array(
      "type" => 4,
      "payload" => array(
          "line" => array(
          "type" => "text",
          "text" => json_encode($update["originalRequest"]["data"]["data"]["source"]["userId"])
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


// EXAMPLE OF ORIGINAL REPORT //
/*
{"originalRequest":
 {
  "source":"line","data":
   {
    "data":
     {
      "replyToken":"9b6101a93b4b47b7a0c4a029ceea7bcd","source":
       {
        "groupId":"C480d21a690d9d7e8f8b7e4432ad4c5f4","type":"group","userId":"U126269d84ad11b29dd3be5979c1be03f"
       }
       ,"type":"message","message":
       {
        "text":"\\run","id":"7952268123059","type":"text"
       }
                  ,"timestamp":1526225571229},"source":"line"}},"id":"f4f6a4fd-1567-49ab-b588-ed6b4c5c12d4","timestamp":"2018-05-13T15:32:51.416Z","lang":"th","result":{"source":"agent","resolvedQuery":"\\run","speech":"","action":"sayHello","actionIncomplete":false,"parameters":[],"contexts":[],"metadata":{"intentId":"e8c7f73c-d885-411b-aece-2aec5db299cf","webhookUsed":"true","webhookForSlotFillingUsed":"false","intentName":"Webhook Script Test"},"fulfillment":{"speech":"HEROKU is sleeping now, try again later.","messages":[{"type":0,"speech":"HEROKU is sleeping now, try again later."}]},"score":1},"status":{"code":200,"errorType":"success"},"sessionId":"48d5c9bb-bb47-43f9-9332-84615f803c87"}
                  */
                  
/* Developed by 7 Days Team, Trained by Club Everyday's Members */
?>
