<?php

/*
 * The function counts the number of maximums in a sequence of numbers.
 * Returns null if the sequence contains a non-numeric element.
 */

function numberMaximumsSequence($array): ?int
{
	$maximum = 0;
	$numberOfMaximums = 0;

	foreach ($array as $number)
	{
		if (!is_numeric($number))
		{
			return null;
		}

		if ($number > $maximum)
		{
			$maximum = $number;
			$numberOfMaximums = 1;
		}
		elseif ($number == $maximum)
		{
			$numberOfMaximums++;
		}
	}

	return $numberOfMaximums;
}
