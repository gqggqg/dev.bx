<?php

/*
	Необходимо воспользоваться шаблоном проектирования "Декоратор" для того, чтобы иметь возможность
	"получать" в итоге фигуры разных цветов, например вызов декоратора:
	$redShape->draw();
	должен вывести:
	"Red colored Shape Square" либо "Red colored Shape Circle"
	в зависимости от того, какую фигуру мы оборачиваем декоратором.
 */

interface IShape
{
	public function draw(): void;
}

abstract class Shape implements IShape
{

}

class Square extends Shape
{
	public function draw(): void
	{
		echo "Shape Square\n";
	}
}

class Circle extends Shape
{
	public function draw(): void
	{
		echo "Shape Circle\n";
	}
}

abstract class ShapeDecoration implements IShape
{
	/** @var Shape */
	protected $shape;

	public function __construct(Shape $shape)
	{
		$this->shape = $shape;
	}

	public function draw(): void
	{
		$this->shape->draw();
	}
}

class ColoredShape extends ShapeDecoration
{
	/** @var Color */
	private $color;

	public function __construct(Shape $shape, Color $color)
	{
		parent::__construct($shape);
		$this->color = $color;
	}

	public function draw(): void
	{
		$this->colorizeShape();
		parent::draw();
	}

	protected function colorizeShape()
	{
		echo "{$this->color->getColor()} colored ";
	}
}

class Color
{
	/** @var string */
	private $color;

	public function __construct(string $color)
	{
		$this->color = $color;
	}

	public function getColor(): string
	{
		return $this->color;
	}
}

$redShape = new Square();
$redShape = new ColoredShape($redShape, new Color("Red"));

$blueShape = new Circle();
$blueShape = new ColoredShape($blueShape, new Color("Blue"));

$redShape->draw();
$blueShape->draw();
