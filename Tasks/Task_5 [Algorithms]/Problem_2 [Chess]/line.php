<?php

/*
 * A line with integer coefficients passing through the origin of coordinates.
 */

require_once 'point.php';

class Line
{
	// Line is given by the equation Ax + By = 0.
	private $a;
	private $b;

	public function __construct(int $a = 1, int $b = 0)
	{
		$this->a = $a;
		$this->b = $b;
	}

	public function containsPoint(Point $point): bool
	{
		return $this->a * $point->getX() + $this->b * $point->getY() == 0;
	}
}