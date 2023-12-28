<?php

/**
 * First solution
 */
function solution1(string $input): void {
  $houses_visited = [];
  $position = [0, 0];
  $houses_visited[] = $position;

  $instructions = str_split($input);
  foreach ($instructions as  $key => $move) {
    $next_house_position = nextHouse($position, $move);
    if(!in_array($next_house_position, $houses_visited)) {
      $houses_visited[] = $next_house_position;
    }

    $position = $next_house_position;
  }

  echo "Houses visited by Santa: " . count($houses_visited) . PHP_EOL;
}

/**
 * Second solution
 */
function solution2(string $input): void {
  $houses_visited = [];
  $santa_position = [0, 0];
  $robo_santa_position = [0 , 0];

  $houses_visited[] = $santa_position;

  $instructions = str_split($input);
  foreach ($instructions as  $key => $move) {
    if(isEven($key)) {
      $santa_next_house = nextHouse($santa_position, $move);
      if(!in_array($santa_next_house, $houses_visited)) {
        $houses_visited[] = $santa_next_house;
      }
      $santa_position = $santa_next_house;
    } else {
      $robo_santa_next_house = nextHouse($robo_santa_position, $move);
      if(!in_array($robo_santa_next_house, $houses_visited)) {
        $houses_visited[] = $robo_santa_next_house;
      }
      $robo_santa_position = $robo_santa_next_house;
    }
  }

  echo "Houses visited by Santa and Robo Santa: " . count($houses_visited) . PHP_EOL;
}

/**
 * Check if number is even
 */
function isEven(int $number): bool { 
  return ($number % 2 == 0); 
} 

/**
* Return the next house position
*/
function nextHouse(array $position, string $move) : array {
  $north = '^';
  $south = 'v';
  $east = '>';
  $west = '<';

  [$x, $y] = $position;

  if($move == $north) {
    return [$x, $y + 1];
  } elseif ($move == $south) {
    return [$x, $y - 1];
  } elseif ($move == $east) {
    return [$x + 1, $y];
  } elseif ($move == $west) {
    return [$x - 1, $y];
  }

  return $position;
}


$input = trim(file_get_contents("3.txt"));
solution1($input);
solution2($input);
