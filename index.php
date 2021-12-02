




<!-- CSS and stuff -->



<link rel="stylesheet" href="css/normalize.css">

    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.min.css'>

        <link rel="stylesheet" href="css/style.css">



<style>
  figure.avatar {
    bottom: 0px !important;
  }
  .btn-delete {
    background: red;
    color: white;
    border: none;
    margin-left: 10px;
    border-radius: 5px;
    }
    
    .fixed-bottom {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: lightseagreen;
        color: white;
        text-align: center;
        padding: 25px;
        font-size: 20px;
    }
</style>









<!-- Main stuff -->




<div class="chat">
  <div class="chat-title">
    <h1>Chat Room</h1>
    <h2>Firebase</h2>
    <figure class="avatar">
      <img src="https://p7.hiclipart.com/preview/349/273/275/livechat-online-chat-computer-icons-chat-room-web-chat-others.jpg" /></figure>
  </div>
  <div class="messages">
    <div class="messages-content"></div>
  </div>
  <div class="message-box">
    <textarea type="text" class="message-input" id="message" placeholder="Type message..."></textarea>
    <button type="submit" class="message-submit">Send</button>
  </div>

</div>
<div class="bg"></div>







<!-- Scripts -->








<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-app.js"></script>
 
<!-- include firebase database -->
<script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-database.js"></script>
 
<script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyDz9QFBI7a-kseZUujZubofQf81fx454zc",
        authDomain: "chatapp-39683.firebaseapp.com/",
        databaseURL: "https://chatapp-39683-default-rtdb.firebaseio.com",
        projectId: "chatapp-39683",
        storageBucket: "chatapp-39683.appspot.com/",
        messagingSenderId: "503764494777",
        appId: "1:503764494777:web:1cf6cbd5970ad829d76e68"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    
    var myName = prompt("Enter your name");
</script>

<form onsubmit="return sendMessage();">
    <input id="message" placeholder="Enter message" autocomplete="off">
    
    <input type="submit">
</form>

<script> 
function sendMessage() {
    // get message
    var message = document.getElementById("message").value;
    
    // save in database
    firebase.database().ref("messages").push().set({
        "sender": myName,
        "message": message
    });    
       
    // prevent form from submitting
        return false;
    
}
</script>

<!-- make list -->

<ul id="meesages"></ul>

<script> 
    // listen for incoming messages
    firebase.database().ref("messages").on("child_added", function (snapshot) {
        var html = "";
        // give each msg a ID
        html += "<li id='message-" + snapshot.key + "'>";
        // show delete button is msg is sent by the sender
        if (snapshot.val().sender == myName) {
            html += "<button data-id='" + snapshot.key + "' onclick='deleteMessage(this);'>";
                html += "Delete";
            html += "</button>";
        }
        html += snapshot.val().sender + ": " + snapshot.val().message;
        html += "</li>";
        
        document.getElementById("messages").innerHTML += html;
    });
</script>



<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.concat.min.js'></script>

        <script src="js/index.js?v=<?= time(); ?>"></script>
