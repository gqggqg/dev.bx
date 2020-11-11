<?php

function readFromConsole(string $message, $input = NULL)
{
	echo $message;
	$input = $input ?: trim(fgets(STDIN));

	if ($input == 'true')
	{
		$input = true;
	}
	elseif ($input == 'false')
	{
		$input = false;
	}
	elseif (is_numeric($input))
	{
		$input = +$input;
	}
	else
	{
		$input = (string)$input;
	}

	return $input;
}