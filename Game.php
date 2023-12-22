<?php
namespace Blackjack;

require_once('Deck.php');
require_once('Player.php');

class Game
{
    private $player;
    private $dealer;
    private $deck;

    public function __construct()
    {
        $this->player = new Player('あなた');
        $this->dealer = new Player('ディーラー');
        $this->deck = new Deck();
    }

    public function startGame()
    {
        echo 'ブラックジャックを開始します'."\n";

        $this->player->drawCard($this->deck->generateCard());
        $this->player->drawCard($this->deck->generateCard());
        $this->dealer->drawCard($this->deck->generateCard());
        echo $this->dealer->getName().'の引いた2枚目のカードはわかりません。'."\n";

        $this->playerTurn();

        if ($this->player->totalScore() <= 21) {
            $this->dealerTurn();
        }
        $this->judge();

        echo 'ブラックジャックを終了します。'."\n";
    }

    private function playerTurn()
    {
        while ($this->player->totalScore() < 21) {
            echo $this->player->getName().'の現在の得点は'.$this->player->totalScore().'です。カードを引きますか？（Y/N）'."\n";
            $input = trim(fgets(STDIN));

            if ($input === 'Y') {
                $this->player->drawCard($this->deck->generateCard());
            } elseif ($input === 'N') {
                break;
            } else {
                echo 'YまたはNを入力してください。'."\n";
            }
        }
    }

    private function dealerTurn()
    {
        $this->dealer->drawCard2($this->deck->generateCard());

        while ($this->dealer->totalScore() < 17) {
            echo $this->dealer->getName().'の現在の得点は'.$this->dealer->totalScore().'です。'."\n";
            $this->dealer->drawCard($this->deck->generateCard());
        }
    }

    private function judge()
    {
        echo $this->player->getName().'の得点は'.$this->player->totalScore().'です。'."\n";
        echo $this->dealer->getName().'の得点は'.$this->dealer->totalScore().'です。'."\n";

        if ($this->player->totalScore() > 21) {
            echo $this->dealer->getName().'の勝ちです！'."\n";
        } elseif ($this->dealer->totalScore() > 21) {
            echo $this->player->getName().'の勝ちです！'."\n";
        } elseif ($this->player->totalScore() > $this->dealer->totalScore() && $this->player->totalScore() <= 21) {
            echo $this->player->getName().'の勝ちです！'."\n";
        } elseif ($this->dealer->totalScore() > $this->player->totalScore() && $this->dealer->totalScore() <= 21) {
            echo $this->dealer->getName().'の勝ちです！'."\n";
        } elseif ($this->dealer->totalScore() > 21 && $this->player->totalScore() <= 21) {
            echo $this->player->getName().'の勝ちです！'."\n";
        } elseif ($this->player->totalScore() > 21 && $this->dealer->totalScore() <= 21) {
            echo $this->dealer->getName().'の勝ちです！'."\n";
        } else {
            echo '同点です！'."\n";
        }
    }
}


$blackjackGame = new Game();
$blackjackGame->startGame()."\n";
