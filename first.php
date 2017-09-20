<?php
$as    = [1, 0, 0];
$bs    = [2, 0, 0, 0, 0];
$words = [0, 'A', 'B', 'AB'];

array_walk(range(0, 100), function ($v) use ($as, $bs, $words) {
    $words[0] = $v;
    echo $words[$as[$v % 3] + $bs[$v % 5]] . PHP_EOL;
});