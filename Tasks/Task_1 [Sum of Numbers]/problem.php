<?php

require_once '..\console_read.php';

echo "Программа сумматор.\n";
echo "Введите числа для сложения. Для окончания ввода введите stop.\n";

$result = 0;

do
{
	$input = readFromConsole("Введите число: ", "stop");
	$result += $input;
} while ($input != NULL);

echo "Сумма чисел: {$result}";
