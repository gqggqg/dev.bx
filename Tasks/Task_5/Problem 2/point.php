<?php

/*
 * Integer point.
 */

class Point
{
	protected $x;
	protected $y;

	function __construct(int $x = 0, int $y = 0)
	{
		$this->x = $x;
		$this->y = $y;
	}

	public function getX(): int
	{
		return $this->x;
	}

	public function getY(): int
	{
		return $this->y;
	}

	public function equal(Point $point): bool
	{
		return ($this->x == $point->x) & ($this->y == $point->y);
	}

	public function getCoordinateDifference(Point $point): Point
	{
		return (new Point(abs($this->x - $point->x), abs($this->y - $point->y)));
	}
}