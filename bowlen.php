<?php
include 'BowlingGame.class.php';

$bowlinggame = new BowlingGame;
$bowlinggame->start();
for ($i=0; $i < 2; $i++) {
    $bowlinggame->round();
}
$bowlinggame->end();
?>
