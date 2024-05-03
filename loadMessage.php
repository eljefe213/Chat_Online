<?php
$bdd = new PDO('mysql:host=localhost;dbname=messaging','root',''); 
$selectMessage = $bdd->query('SELECT * FROM messages');
while($message = $selectMessage->fetch()){
    ?>
    <div class="message">
        <h4><?= $message['username']; ?></h4>
        <p><?= $message['message']; ?></p>
    </div>
    <?php
}
?>