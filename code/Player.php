<?php
declare(strict_types=1);

//require "Blackjack.php";
//require "Deck.php";

require_once("Blackjack.php");
require_once("Deck.php");
require_once ("Card.php");

class Player
{
    private array $cards = [];
    private bool $lost = false;

    public function __construct(Deck $deck)
    {
        array_push( $this->cards,$deck->drawCard(),$deck->drawCard());

    }

    public function hit (Deck $deck)
    {
        array_push($this->cards,$deck->drawCard());
        if ($this->getScore() > 21){
            $this->lost = true;
        }
    }

    public function surrender ()
    {
        $this->lost = true;

    }
    public function getScore ()
    {
        $totalValue = 0;
        foreach ($this->cards as $card){
            $totalValue+= $card->getValue();
        };
        return $totalValue;

    }

    public function hasLost ()
    {
        return $this->lost;

    }


}