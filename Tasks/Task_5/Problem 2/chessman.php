<?php

require_once 'point.php';
require_once 'line.php';

abstract class Chessman
{
	protected $position;

	public function __construct(Point $position = null)
	{
		if (empty($position) || !($this->currentPosition($position)))
		{
			$position = new Point(1, 1);
		}
		$this->position = $position;
	}

	public function getPosition(): Point
	{
		return $this->position;
	}

	public function setPosition(Point $position): void
	{
		if (!$this->currentPosition($position))
		{
			return;
		}
		$this->position = $position;
	}

	protected function currentPosition(Point $position): bool
	{
		$xPoint = $position->getX();
		$yPoint = $position->getY();
		return 1 <= $xPoint && $xPoint <= 8 && 1 <= $yPoint && $yPoint <= 8;
	}

	abstract public function makeMove(Point $position): bool;
}

class Queen extends Chessman
{
	public function makeMove(Point $position): bool
	{
		if (!($this->currentPosition($position)))
		{
			return false;
		}
		if ($this->position->equal($position))
		{
			return true;
		}

		$point = $this->position->getCoordinateDifference($position);
		if ((new Line(1, 0))->containsPoint($point) || (new Line(0, 1))->containsPoint($point) || (new Line(1, -1))->containsPoint($point))
		{
			return true;
		}

		return false;
	}
}