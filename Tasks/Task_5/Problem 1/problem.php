<?php

/*
 * Reads the sequence of natural numbers from the console.
 * Calculates and outputs the number of maximum elements in a sequence.
 * The sign of the end of input is the word "stop".
 * If there is a non-natural number in the water, it informs about incorrect input and skips the element.
 */

require_once 'number_maximums_sequence.php';
require_once '../../console_read.php';

echo 'Counting the number of maximum elements in a sequence of natural numbers'.PHP_EOL;
echo 'Enter one natural number each. Enter "stop" to complete the reading.'.PHP_EOL;

$array = [];

while(($number = readFromConsole('Enter number: ', 'stop')) !== null)
{
	if (!is_int($number))
	{
		echo 'Incorrect input. Enter one natural number. Enter "stop" to end the input.'.PHP_EOL;
		continue;
	}

	$array[] = $number;
}

echo 'The number of maximums in a sequence: '.numberMaximumsSequence($array).PHP_EOL;
