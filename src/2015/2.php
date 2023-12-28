<?php

$file = file("./inputs/2.txt");

$feets = 0;
$ribbon = 0;
foreach ($file as $line) {
    $size = trim($line);
    [$l, $w, $h]= explode('x', $size);

    // Calculate Day 2.1
    $wrapping_paper = (2*$l*$w) + (2*$w*$h) + (2*$h*$l);
    $slack = min([$l*$w, $w*$h, $h*$l]);
    $feets += $wrapping_paper + $slack;

    // Calculate Day 2.2
    $ribbon_needed = 2 * min([$w+$l,$w+$h,$l+$h]);
    $volumn = $l * $w * $h;
    $ribbon += $ribbon_needed + $volumn;
}
var_dump($feets);
echo PHP_EOL;
var_dump($ribbon);
