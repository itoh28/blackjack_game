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

    public function score()
    {
        if ($this->number === 'A') {
            return 1;
        } elseif ($this->number === '10' || $this->number === 'J' || $this->number === 'Q' ||$this->number === 'K') {
            return 10;
        } else {
            return $this->number;
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
