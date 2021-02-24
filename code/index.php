<?php
declare(strict_types=1);

require_once("Player.php");
require_once("Blackjack.php");
require_once("Card.php");
require_once("Deck.php");
require_once("Suit.php");
require_once ("Dealer.php");


session_start();
if(isset($_SESSION["blackjack"])){
    $game = $_SESSION["blackjack"];
}else{
    $game = new Blackjack();
//    var_dump($game);
}


var_dump($_POST["playerAction"]);

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="index.php" method="post">
    <br>
    <button type="submit" name="playerAction" value="hit">Hit</button>
    <button type="submit" name="playerAction" value="surrender">Surrender</button>
    <button type="submit" name="playerAction" value="stand">Stand</button>
</form>


</body>
</html>



