<?php
include 'Player.class.php';

class ScoreBoard {
	private array $players;
    private int $currentPlayer;

    function __construct()
    {
        $this->currentPlayer = 0;
    }

    public function addPlayer($player): void
    {
		$this->players[] = new Speler($player);
	}

	public function getCurrentPlayer()
	{
		return $this->players[$this->currentPlayer];
	}

    public function nextPlayer(): void
    {
        $this->currentPlayer += 1;
		if ($this->currentPlayer == sizeof($this->players)) {
		   $this->currentPlayer = 0;
		}
	}

    public function registerPinsDown($pins)
    {
		// $currentscore = $this->players[$this->currentPlayer]->getScore();
		// $this->players[$this->currentPlayer]->setScore($currentscore + $pins);

		$lastTwoThrows = $this->players[$this->currentPlayer]->getLastTwoThrows();
		if (sizeof($lastTwoThrows) == 2) {
			array_unshift($lastTwoThrows, $pins);
			array_pop($lastTwoThrows);
			$this->players[$this->currentPlayer]->setLastTwoThrows($lastTwoThrows);
		}
		else {
			array_unshift($lastTwoThrows, $pins);
			$this->players[$this->currentPlayer]->setLastTwoThrows($lastTwoThrows);
		}
		print_r($this->players[$this->currentPlayer]->getLastTwoThrows());
	}

    public function printStatus()
    {
		echo '[Status]' . PHP_EOL;
		echo 'Current Player: ' . $this->players[$this->currentPlayer]->getName() . PHP_EOL;
		foreach ($this->players as $player) {
			echo $player->getName().PHP_EOL;
			echo '    Score: ' . $player->getScore() . PHP_EOL;
		}
		echo PHP_EOL;
	}

    public function getWinner()
    {
		// Optimize me
		$players = [];
		foreach ($this->players as $player) {
			$players[$player->getName()] = $player->getScore();
		}
		arsort($players);
		reset($players);
	 	return key($players);
	}
}
