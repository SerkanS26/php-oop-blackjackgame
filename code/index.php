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
    $_SESSION["blackjack"] = $game;
}

echo "Player total: " . $game->getPlayer()->getScore() .PHP_EOL;
echo "<br>";

if (isset($_POST["playerAction"])){
    if($_POST["playerAction"] == "hit"){
        $game->getPlayer()->hit($game->getDeck());
        echo "Dealer total: " . "0" .PHP_EOL;

        if ($game->getPlayer()->hasLost() == true){
           echo "<br>";
           echo "<h2>" ."Dealer Win". "<h2>";
        }
    }
}

if(isset($_POST["playerAction"])){
     if($_POST["playerAction"] == "stand"){
         $game->getDealer()->hit($game->getDeck());
         echo "Dealer's total: " . $game->getDealer()->getScore() .PHP_EOL;
         echo "<br>";
         if ($game->getDealer()->hasLost() == false){
             if ( $game->getPlayer()->getScore() <= $game->getDealer()->getScore()){
                 echo "<h2>" ."Dealer win!". "<h2>";
             }
             else{
                 echo "<h2>" ."Player win!". "<h2>";
             }
         }
         else{
             echo "<h2>" ."Player Win". "<h2>";
         }
     }
}

if(isset($_POST["playerAction"])){
    if($_POST["playerAction"] == "surrender"){
        echo "Dealer Wins!";
    }
}
//unset($_SESSION["blackjack"]);
if(isset($_POST["playerAction"])){
    if($_POST["playerAction"] == "restart"){
        session_unset();
        $_SESSION["blackjack"]= new Blackjack();
    }
}
//var_dump($game->getPlayer());


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
    <button type="submit" name="playerAction" value="restart">Restart</button>
</form>


</body>
</html>



