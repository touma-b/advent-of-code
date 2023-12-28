<?php

/**
* Find the hash for Santa
*/
function findTheHash(string $input, string $prefix): void {
  $count = 0;

  do {
    $hash = md5($input . $count);
    $hash_starts = substr($hash, 0, strlen($prefix));

    if ($hash_starts === $prefix) {
      echo "The hash is: $hash\n";
      echo "The answer is: $count\n";
      break;
    }

    $count++;
  } while (true);
}


$time_start = microtime(true);
$input = 'yzbqklnj';

// Solution 1
findTheHash($input, '00000');

// Solution 2
findTheHash($input, '000000');

echo 'Total execution time in seconds: ' . (microtime(true) - $time_start) . PHP_EOL;
