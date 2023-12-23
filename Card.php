<?php
namespace Blackjack;

class Card
{
    private $suit;
    private $number;

    public function __construct($suit, $number)
    {
        $this->suit = $suit;
        $this->number = $number;
    }

    public function score($currentScore)
    {
        if ($this->number === 'A') {
            $score1 = $currentScore + 1;
            $score11 = $currentScore +11;
            
            if ($score11 <= 21) {
                return $score11;
            } else {
                return $score1;
            }
        } elseif ($this->number === '10' || $this->number === 'J' || $this->number === 'Q' ||$this->number === 'K') {
            return $currentScore + 10;
        } else {
            return $currentScore + $this->number;
        }
    }

    public function getSuit()
    {
        return $this->suit;
    }

    public function getNumber()
    {
        return $this->number;
    }
}
