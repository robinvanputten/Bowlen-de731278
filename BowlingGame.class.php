<?php
include 'ScoreBoard.class.php';

class BowlingGame
{
	private $scoreBoard;
	private $amountOfPlayers;
	private $currentround;

	function __construct()
	{
		$this->scoreboard = new ScoreBoard();
		$this->currentround = 1;
	}

	public function start()
	{
		$amountOfPlayers = readline("Amount of players? ");
		$this->amountOfPlayers = $amountOfPlayers;
		for ($i = 0; $i < $amountOfPlayers; $i++) {
			$play = $i + 1;
			$playerName = readline("Name of player " . (string)$play . " ");
			$this->scoreboard->addPlayer($playerName);
		}
		$this->scoreboard->printStatus();
	}

	public function round()
	{
		echo "Round " . $this->currentround . PHP_EOL;

		for ($i = 0; $i < $this->amountOfPlayers; $i++) {
			// Echo current player
			echo "Current Player: " . $this->scoreboard->getCurrentPlayer()->getName() . PHP_EOL;

			// First throw
			while (true) {
				$trow = readline("First throw: ");
				if (is_numeric($trow)) {
					break;
				}
				echo "Not a number";
			}
			$this->scoreboard->registerPinsDown($trow);

			if ($trow < 10) {
				// Second trow
				while (true) {
					$trow = readline("Second throw: ");
					if (is_numeric($trow)) {
						break;
					}
					echo "Not a number";
				}
			}
			$this->scoreboard->registerPinsDown($trow);

			// Next player
			$this->scoreboard->nextPlayer();
		}
		$this->currentround++;
		$this->scoreboard->printStatus();
	}

	public function end()
	{
		echo "Winner is: " . $this->scoreboard->getWinner() . PHP_EOL;
	}
}
