<?php

function readFromConsole(string $string = "", string $end = "exit"): ?float
{
	while (true)
	{
		echo $string;
		$input = trim(fgets(STDIN));
		if ($input == $end)
		{
			return null;
		}
		elseif (is_numeric($input))
		{
			return $input;
		}
		else
		{
			echo "Некорректный ввод.\n";
		}
	}
}