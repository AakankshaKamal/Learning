<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>ChatRoom</title>
    <script src="https://www.gstatic.com/firebasejs/8.8.0/firebase-app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="stylejs.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
     <script src="https://www.gstatic.com/firebasejs/8.8.0/firebase-database.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="styles.css" type="text/css">
</head>


 
<script>
  // Your web app's Firebase configuration
  const arr1=[];
const arr2=[];
  showfunc();
  var firebaseConfig = {
    apiKey: "AIzaSyD2oBSq14TuR2YRMkqVxpRJZojdinNpLRs",
    authDomain: "filepcon.firebaseapp.com",
    databaseURL: "https://filepcon.firebaseio.com",
    projectId: "filepcon",
    storageBucket: "filepcon.appspot.com",
    messagingSenderId: "858388809860",
    appId: "1:858388809860:web:e985eb018c5061234d9ad1"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

var database=firebase.database();
var userRef=database.ref("messages");
  var myName = prompt("Enter your name");
 
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
    var moment="hi";
    firebase.database().ref("messages").on("child_added", function (snapshot) {
        var html = "";
        // give each message a unique ID
        html += "<li id='message-" + snapshot.key + "'>";
        // show delete button if message is sent by me
        // if (snapshot.val().sender == myName) {
        //     html += "<button data-id='" + snapshot.key + "' onclick='deleteMessage(this);'>";
        //         html += "Delete";
        //     html += "</button>";
        // }
        html += snapshot.val().sender + ": " + snapshot.val().message;
        html += "</li>";
        
 
        document.getElementById("messages").innerHTML += html;
    });
    function showfunc()
{ 
    $.ajax({    
        type: 'get',
        
        url: "momets.php",             
        dataType: 'JSON',     
        
    
        success: function(response){  
//response=JSON.parse(response);
var len = response.length;
            for(var i=0; i<len; i++){
              
                var word = response[i].word;
                //alert(word);
                
arr1.push(word);
alert(arr1[i]);
        }
        
  
    $.ajax({    
        type: 'get',
        data:{
        doget:"doget",
        },
        url: "momets.php",             
        dataType: 'JSON',     
        
    
        success: function(response2){  
           // response2=JSON.parse(response2);
var len = response2.length;
            for(var i=0; i<len; i++){
              
                var messages = response2[i].message;
               // alert(messages);
arr2.push(messages);
        }
        
  

       
    var l=arr1.length;
    console.log("L : "+l);
    const arr3=[];var f=1;
    for(var i=0;i<arr2.length;i++)
    {f=1;
        for(var j=0;j<arr1.length;j++)
        { //console.log(arr1[j]+"@@@@@");
            if(arr2[i].includes(arr1[j]))
            {
                  f=0;
                  //console.log(arr2[i]+"^^^^");
            }
        }
        if(f==0)
        {
            arr3.push(arr2[i]);
            //alert(arr3[i]);
        }
    }
    for(let i = 0; i < arr1.length; i++){
  console.log(arr1[i]+":");

}

for(let i = 0; i < arr2.length; i++){
  console.log(arr2[i]+"&&");
}

    for(let i = 0; i < arr3.length; i++){
  console.log(arr3[i]);
}
}


    });
}
});
}
function eval()
{ 
}


    userRef.orderByChild('message')
    .equalTo(`%${moment}%`)
    .once('value', function (snapshot) {

        snapshot.forEach(function (childSnapshot) {

            var value = childSnapshot.val();
            console.log("message is : " + value.message+", user is "+value.sender);
        });
    });


    function deleteMessage(self) {
    // get message ID
    var messageId = self.getAttribute("data-id");
 
    // delete message
    firebase.database().ref("messages").child(messageId).remove();
}
 
// attach listener for delete message
firebase.database().ref("messages").on("child_removed", function (snapshot) {
    // remove message node
    document.getElementById("message-" + snapshot.key).innerHTML = "This message has been removed";
});



</script>
<body>
<div class="wrap">
    <div class="box">
<ul id="messages"></ul>
<div class=form>
<form onsubmit="return sendMessage();">
    <input type="text" id="message" placeholder="Enter message" autocomplete="off">
 
    <input type="submit">
</form>
</div>
<div class="mrow">
        <div class="mcol">
            <table id="customers" class="input-box">
                <thead>
                    <tr>
                        
                    <th>Messages</th>

                    </tr>
                </thead>
            </table>
        </div>
    </div>

  <div class="bg_area">
    <div class="bg01 clearfix">
</div>
</div>
</div>
</div>
</body>
</html>
