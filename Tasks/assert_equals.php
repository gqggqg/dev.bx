<?php

function assertEquals($var1, $var2, string $message = '')
{
	echo $message . ' - ' . ($var1 === $var2 ? 'passed' : 'failed') . PHP_EOL;
}
