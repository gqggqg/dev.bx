<?php

function readFromConsole(string $message, $input = null)
{
	if ($input == null)
	{
		echo $message;
		$input = trim(fgets(STDIN));
	}

	if ($input == '!stop')
	{
		$input = null;
	}
	elseif ($input == 'true')
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
