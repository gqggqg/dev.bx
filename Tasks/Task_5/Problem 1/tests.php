<?php

/*
 * Testing a function that calculates the number of maximums in a numerical sequence.
 */

require_once 'number_maximums_sequence.php';
require_once '../../assert_equals.php';

assertEquals(5, numberMaximumsSequence([1, 1, 1, 1, 1]), 'Number of maximums in sequence: 5');
assertEquals(2, numberMaximumsSequence([1, 2, 2, 3, 3, 2, 7, 5, 7]), 'Number of maximums in sequence: 2');
assertEquals(1, numberMaximumsSequence([7, 2, 10, 12.5, 6, 10, 10]), 'Number of maximums in sequence: 1');
assertEquals(null, numberMaximumsSequence([6, 4, 6, 10.5, 6, "fdf", 2]), 'Number of maximums in sequence: null');