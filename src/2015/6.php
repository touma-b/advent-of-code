<?php

// --- Day 6: Probably a Fire Hazard ---

function getActionAndPosition(string $input) {
  preg_match('/^(?P<verb>turn on|turn off|toggle) (?P<startX>\d+),(?P<startY>\d+) through (?P<endX>\d+),(?P<endY>\d+)$/', $input, $matches);
  return [
    'verb' => $matches['verb'],
    'startX' => $matches['startX'],
    'startY' => $matches['startY'],
    'endX' => $matches['endX'],
    'endY' => $matches['endY'],
  ];
}

function light(array &$grid, array $match) {
  for ($row = $match['startX']; $row <= $match['endX']; $row++) {
    for ($column = $match['startY']; $column <= $match['endY']; $column++) {
      switch ($match['verb']) {
        case 'turn on':
          $grid[$row][$column] = true;
          break;
        case 'turn off':
          $grid[$row][$column] = false;
          break;
        case 'toggle':
          $grid[$row][$column] = !$grid[$row][$column]; 
          break;
      }
    }
  }
}

function adujstBrightness(array &$grid, array $match) {
  for ($row = $match['startX']; $row <= $match['endX']; $row++) {
    for ($column = $match['startY']; $column <= $match['endY']; $column++) {
      switch ($match['verb']) {
        case 'turn on':
          $grid[$row][$column] = $grid[$row][$column]+1;
          break;
        case 'turn off':
          if($grid[$row][$column] > 0) {
            $grid[$row][$column] = $grid[$row][$column]-1;
          }
          break;
        case 'toggle':
          $grid[$row][$column] = $grid[$row][$column]+2; 
          break;
      }
    }
  }
}

function solution1(array $file): void {
  $grid = array_fill(0, 1000, array_fill(0, 1000, false));
  foreach($file as $line) {
    $line = trim($line);
    $match = getActionAndPosition($line);
    light($grid, $match);
  }

  // Use array_filter to get all true values
  $trueValues = array_filter(array_merge(...$grid));

  echo 'The count of lights is: ' . count($trueValues);
  echo PHP_EOL;
}

function solution2(array $file): void {
  $grid = array_fill(0, 1000, array_fill(0, 1000, 0));
  foreach($file as $line) {
    $line = trim($line);
    $match = getActionAndPosition($line);
    adujstBrightness($grid, $match);
  }

  // Flatten the grid using array_merge(...$grid)
  $flattenedGrid = array_merge(...$grid);

  // Calculate the sum of all values
  $sum = array_sum($flattenedGrid);

  echo 'The brightness sum is of lights is: ' . $sum;
  echo PHP_EOL;
}

$time_start = microtime(true);
$file = file("./inputs/6.txt");
solution1($file);
solution2($file);
echo 'Total execution time in seconds: ' . (microtime(true) - $time_start) . PHP_EOL;
