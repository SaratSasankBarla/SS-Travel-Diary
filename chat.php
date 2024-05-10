<?php
session_start();
$con = mysqli_connect("localhost", "root", "root", "you");

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $email = $_SESSION["email"];
    $mobile = $_SESSION["mobile"];
    $address = $_SESSION["address"];
    echo "<script>alert('Welcome to Ask Me!!! $username')</script>";
} else {
    echo "<script>alert('Welcome to Ask ME!!!')</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Welcome</title>
  <link rel="stylesheet" href="chat.css" />
</head>

<body>
  <div class="container">
    <div class="header">Ask Me</div>
    <div id="counter">0</div>
    <div class="messaging">
      <p class="whatsapp"></p>
    </div>
    <form class="message" onsubmit="sendMessage()">
      <input type="text" name="message" id="message" class="message-input" placeholder="Enter message">
      <input type="submit" class="submit-button" value="Send">
    </form>

    <script>
      var request = null;

      function getMessage() {
        request = new XMLHttpRequest();
        var url = "counter.php";
        request.open("GET", url, true);
        request.onreadystatechange = updatePage;
        request.send(null);
      }

      function sendMessage() {
        event.preventDefault(); // Prevent form submission
        var msg_obj = document.getElementById("message");
        var msg = msg_obj.value;
        var url = "counter.php?message=" + encodeURIComponent(msg);
        console.log("Sending URL: ", url);
        var xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);
        xhr.onreadystatechange = updatePage;
        xhr.send(null);
      }

      function updatePage() {
        if (request.readyState == 4) {
          console.log("Inside updatePage");
          var response = request.responseText.split(":");
          console.log("Received Text: ", response);
          var receivedCounter = parseInt(response[0]);
          //var userID = response[1];
          var lastMessage = response[1];
          console.log("Msg Contents: ", response[0], response[1], response[2], response[3]);
          var time = response[2]+":"+response[3];
          console.log("Time is: ",time);
          var counter = document.getElementById("counter");
          var counterValue = parseInt(counter.innerHTML);
          console.log("countervalue: ", counterValue);

          if (receivedCounter > counterValue) {
            console.log("inside genereate text");
            counter.innerHTML = receivedCounter;

            var messaging = document.querySelector('.messaging');
            var newMsgElement = document.createElement("p");
            newMsgElement.innerHTML = "<br><strong><?php $username ?></strong> " + lastMessage + " <strong> | </strong> " + time ;

            messaging.appendChild(newMsgElement);
          }
        }
      }
    </script>
  </div>


  <script>
    getMessage();
    setInterval(getMessage, 100); // Updated setInterval syntax
  </script>

</body>

</html>
