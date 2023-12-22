<?php
namespace Blackjack;

require_once('Deck.php');

class Player
{
    private $name;
    private $hand;

    public function __construct($name)
    {
        $this->name = $name;
        $this->hand = [];
    }

    public function drawCard($card)
    {
        $this->hand[] = $card;
        echo $this->name.'の引いたカードは'.$card->getSuit().'の'.$card->getNumber().'です。'."\n";
    }

    public function drawCard2($card)
    {
        $this->hand[] = $card;
        echo $this->name.'の引いた2枚目のカードは'.$card->getSuit().'の'.$card->getNumber().'でした。'."\n";
    }

    public function totalScore()
    {
        $score = 0;

        foreach ($this->hand as $card) {
            $score += $card->score();
        }
        
        return $score;
    }

    public function getName()
    {
        return $this->name;
    }
}
