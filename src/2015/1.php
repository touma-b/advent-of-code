<?php

$time_start = microtime(true);

$input = trim(file_get_contents("./inputs/1.txt"));

// Solution 1
$up = substr_count($input, '(');
$down = substr_count($input, ')');

echo $up - $down . PHP_EOL;

echo 'Total execution time in seconds: ' . (microtime(true) - $time_start) . PHP_EOL;


// Solution 2
$floor = 0;
$cursor = 1;
$arr = str_split($input);
foreach ($arr as  $key => $char) {
    switch ($char) {
    case '(':
      $floor++;
      break;
    case ")":
      if ($floor == 0) {
          echo 'Position is: ' .$key + 1;
          exit;
      }
      $floor--;
      break;
  }
}

echo PHP_EOL;
