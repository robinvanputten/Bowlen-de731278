<?php
include 'Player.class.php';

class ScoreBoard
{
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
		$currplayer = $this->currentPlayer;
		$lastTwoThrows = $this->players[$currplayer]->getLastTwoThrows();

		if (count($this->players[$currplayer]->getLastTwoThrows()) == 0) {
			$this->players[$currplayer]->setLastTwoThrows([$pins]);
		} else if (count($this->players[$currplayer]->getLastTwoThrows()) == 1) {
			$lastTwoThrows[] = $pins;
			$this->players[$currplayer]->setLastTwoThrows($lastTwoThrows);
		} else if (count($this->players[$currplayer]->getLastTwoThrows()) == 2) {
			// Strike
			if ($lastTwoThrows[0] == 10) {
				$this->players[$currplayer]->setScore($this->players[$currplayer]->getScore + $lastTwoThrows[0] + ($lastTwoThrows[1] + $pins));
			} else if ($lastTwoThrows[0] + $lastTwoThrows[1] == 10) {
				$this->players[$currplayer]->setScore($this->players[$currplayer]->getScore + $lastTwoThrows[0] + $lastTwoThrows[1] + $pins);
			} else {
				$this->players[$currplayer]->setScore($this->players[$currplayer]->getScore() + $lastTwoThrows[0] + $lastTwoThrows[1]);
				$this->players[$currplayer]->setLastTwoThrows([$pins]);
			}
		}
		print_r($this->players[$currplayer]->getLastTwoThrows());
	}

	public function endScore()
	{
		$currplayer = $this->currentPlayer;
		$lastTwoThrows = $this->players[$currplayer]->getLastTwoThrows();
	}

    public function printStatus()
    {
		echo '[Status]' . PHP_EOL;
		echo 'Current Player: ' . $this->players[$this->currentPlayer]->getName() . PHP_EOL;
		foreach ($this->players as $player) {
			echo $player->getName() . PHP_EOL;
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
