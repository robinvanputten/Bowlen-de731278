<?php
include 'ScoreBoard.class.php';

$scoreboard = new ScoreBoard();

// Add 3 new players
$scoreboard->addPlayer('testPlayer1');
$scoreboard->addPlayer('testPlayer2');
$scoreboard->addPlayer('testPlayer3');

// Test getCurrentPlayer function
for ($i = 0; $i < 4; $i++) {
    var_dump($scoreboard->getCurrentPlayer());
    $scoreboard->nextPlayer();
}

$scoreboard->registerPinsDown(10);
$scoreboard->printStatus();
$scoreboard->nextPlayer();
$scoreboard->registerPinsDown(1);
$scoreboard->registerPinsDown(14);
$scoreboard->printStatus();
$scoreboard->nextPlayer();
$scoreboard->registerPinsDown(5);
$scoreboard->registerPinsDown(2);

$scoreboard->getWinner();
?>
