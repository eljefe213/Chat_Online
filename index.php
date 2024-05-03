<?php
$bdd = new PDO('mysql:host=localhost;dbname=messaging','root','');
if(isset($_POST['send'])){
    if(!empty($_POST['username']) AND !empty($_POST['message'])){
        $username = htmlspecialchars($_POST['username']);
        $message = nl2br(htmlspecialchars($_POST['message']));

        $insertMessage = $bdd->prepare('INSERT INTO messages(username, message) VALUES(?, ?)');
        $insertMessage->execute(array($username,$message));
    } else {
        echo "Please complete all fields !!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Online chat</title>
</head>
<body>
    <form action="" method="post" align="center">
        <input type="text" placeholder="username" name="username">
        <br><br>
        <textarea name="message" placeholder="content"></textarea>
        <br>
        <input type="submit" name="send">
    </form>
    <section id="messages"></section>
    <script>
        setInterval('loadMessage()', 500);
        function loadMessage(){
            $('#messages').load('loadMessage.php');
        }
    </script>
</body>
</html>