<?php

/*
 * TDD
 */

require_once 'assert_equals.php';
require_once 'console_read.php';

$variables = [1, -5, 0.5, +1e6, true, false, 'test_string'];
foreach ($variables as $value)
{
	$parameter = is_string($value) ? $value : var_export($value, true);
	assertEquals($value, readFromConsole('', $parameter), "readFromConsole('', {$parameter}) return " . varDumbToString($value));
}

assertEquals(NULL, readFromConsole('', '!stop'), "readFromConsole('', '!stop') return NULL");

function varDumbToString($var = null)
{
	ob_start();
	var_dump($var);
	$content = trim(ob_get_contents());
	ob_end_clean();
	return $content;
}