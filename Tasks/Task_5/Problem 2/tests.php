<?php

require_once 'chessman.php';
require_once '../../assert_equals.php';

echo 'The chessboard is 8x8 in size. The lower left cell has coordinates (1, 1)'.PHP_EOL;

$queen = new Queen;
echo 'The queen has coordinates ('.$queen->getPosition()->getX().', '.$queen->getPosition()->getY().')'.PHP_EOL;

$canMove = $queen->makeMove(new Point()) ? 'YES' : 'NO';
assertEquals('NO', $canMove, 'The queen cannot move to the coordinate (0, 0)');

$canMove = $queen->makeMove(new Point(8, 1)) ? 'YES' : 'NO';
assertEquals('YES', $canMove, 'The queen can move to the coordinate (1, 8)');

$queen->setPosition(new Point(5, 4));
echo 'The queen has coordinates ('.$queen->getPosition()->getX().', '.$queen->getPosition()->getY().')'.PHP_EOL;

$canMove = $queen->makeMove(new Point(7, 4)) ? 'YES' : 'NO';
assertEquals('YES', $canMove, 'The queen can move to the coordinate (7, 4)');

$canMove = $queen->makeMove(new Point(7, 6)) ? 'YES' : 'NO';
assertEquals('YES', $canMove, 'The queen can move to the coordinate (7, 6)');

$canMove = $queen->makeMove(new Point(7, 3)) ? 'YES' : 'NO';
assertEquals('NO', $canMove, 'The queen cannot move to the coordinate (7, 3)');

$queen->setPosition(new Point(3, 3));
echo 'The queen has coordinates ('.$queen->getPosition()->getX().', '.$queen->getPosition()->getY().')'.PHP_EOL;

$canMove = $queen->makeMove(new Point(3, -9)) ? 'YES' : 'NO';
assertEquals('NO', $canMove, 'The queen cannot move to the coordinate (3, -9)');