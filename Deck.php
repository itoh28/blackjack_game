<?php
namespace Blackjack;

require_once('Card.php');

class Deck
{
    private $cards;

    public function __construct()
    {
        $suits = ['スペード', 'ハート', 'ダイヤ', 'クローバー'];
        $numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'];

        foreach ($suits as $suit) {
            foreach ($numbers as $number) {
                $card = new Card($suit, $number);
                $this->cards[] = $card;
            }
        }
    }

    public function generateCard()
    {
        $randomCardKey = array_rand($this->cards);
        $randomCard = $this->cards[$randomCardKey];
        array_splice($this->cards, $randomCardKey, 1);

        return $randomCard;
    }
}
