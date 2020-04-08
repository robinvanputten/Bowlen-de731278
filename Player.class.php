<?php

class Speler
{
	private int $score = 0;
	private array $lastTwoThrows;
	private string $name;

	function __construct($name)
	{
		$this->name = $name;
		$this->lastTwoThrows = [];
	}

	function getName()
	{
		return $this->name;
	}

    function setScore($value): void
    {
        $this->score = $value;
	}

    function getScore(): int
    {
        return $this->score;
	}

    function setLastTwoThrows($throws): void
    {
		$this->lastTwoThrows = $throws;
	}

    function getLastTwoThrows(): array
    {
		return $this->lastTwoThrows;
	}
}
