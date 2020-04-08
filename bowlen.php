<?php
include 'BowlingGame.class.php';

$bowlinggame = new BowlingGame();
$bowlinggame->start();
for ($i = 0; $i < 10; $i++) {
    $bowlinggame->round();
}
$bowlinggame->end();
?>
