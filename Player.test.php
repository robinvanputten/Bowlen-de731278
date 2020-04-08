<?php
include 'Player.class.php';

// create a new class
$player = new Speler('testPlayer');

// Get player name
var_dump($player->getName());

// Set player score
$player->setScore(9);

// Get player score
var_dump($player->getScore());

// Set last two trows
$player->setLastTwoThrows([4,3]);

// Get last two trows
var_dump($player->getLastTwoThrows());
?>
