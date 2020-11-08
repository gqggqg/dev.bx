<?php

function readFromConsole(string $string = ""): ?float
{
	while (true)
	{
		echo $string;
		$input = trim(fgets(STDIN));
		if ($input == "stop")
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