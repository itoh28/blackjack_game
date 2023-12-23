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
        $handTotal = 0;
        $ace = 0;

        foreach ($this->hand as $card) {
            $handTotal += $card->score($handTotal);

            if ($card->getNumber() === 'A') {
                $aceCount++;
            }
        }

        while ($aceCount > 0 && $handTotal > 21) {
            $handTotal -= 10;
            $aceCount --;
        }
        
        return $handTotal;
    }

    public function getName()
    {
        return $this->name;
    }
}
