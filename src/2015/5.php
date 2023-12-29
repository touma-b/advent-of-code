<?php

// --- Day 5: Doesn't He Have Intern-Elves For This? ---

define("MIN_NUM_OF_VOWELS", 3);

function hasMinThreeVowels(string $string): bool {
  preg_match_all('/[aeiou]/i', $string, $matches);

  return count(reset($matches)) >= MIN_NUM_OF_VOWELS;
}

function hasDuplicatedLetter(string $string): bool {
  return preg_match('/(.)\1/', $string);
}

function isNotBlacklisted(string $string): bool {
  return !preg_match('/(?:ab|cd|pq|xy)/', $string);
}

function hasPairOfAnyTwoLetters(string $string): bool {
  return preg_match('/(\w\w).*\1/', $string);
}


function hasADifferentLetterBetweenPairs(string $string): bool {
  return preg_match('/(\w).\1/', $string);
}

$file = file("./inputs/5.txt");
function solution1(array $file): void {
  $count = 0;
  foreach($file as $line) {
    $line = trim($line);
    if(hasMinThreeVowels($line) && hasDuplicatedLetter($line) && isNotBlacklisted($line)) {
      $count++;
    }
  }

  echo 'The count for part 1 is: ' . $count;
  echo PHP_EOL;
}

function solution2(array $file): void {
  $count = 0;
  foreach($file as $line) {
    $line = trim($line);
    if(hasPairOfAnyTwoLetters($line) && hasADifferentLetterBetweenPairs($line)) {
      $count++;
    }
  }

  echo 'The count for part 2 is: ' . $count;
  echo PHP_EOL;
}
solution1($file);
solution2($file);

