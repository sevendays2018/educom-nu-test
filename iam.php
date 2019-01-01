<?php
sendMessage(
          /* array(
 "speech" => "TESTED",
  "messages" => array(
    "type" => 4,
      "platform" => "line",
      "payload" => array(
        "line" => array(
          "type" => "image",
          "originalContentUrl" => "https://i.ytimg.com/vi/bjgbFdfty8Q/maxresdefault.jpg",
    "previewImageUrl" => "https://i.ytimg.com/vi/bjgbFdfty8Q/maxresdefault.jpg"
    )
  )
  )
)*/
           array(
 "speech" => "TESTED",
  "message" => [ array(
    "type" => 4,
      "platform" => "line",
      "payload" => array(
        "line" => array(
          "type" => "image",
          "originalContentUrl" => "https://i.ytimg.com/vi/bjgbFdfty8Q/maxresdefault.jpg",
    "previewImageUrl" => "https://i.ytimg.com/vi/bjgbFdfty8Q/maxresdefault.jpg"
    )
  )
  )]
)
        );
function sendMessage($parameters) {
    //$finale = json_decode($parameters);
    echo json_encode($parameters);
}
?>
