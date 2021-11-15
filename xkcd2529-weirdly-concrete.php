<?php

// I've sorta given up on this one.

$n = 4;
$k = 10;

$nCounter = 0;
$kCounter = 0;
$availableDirections = ['up','down','left','right'];
$grid = [];
$position = (object) [
	'x' => 0,
	'y' => 0,
];

while ($kCounter < $k && count($availableDirections) > 0) {
	setGridCell($grid, $position, '.'); // i was here

	if ($nCounter + 1 == $n) {
		setGridCell($grid, $position, 'm'); // marble
		$kCounter++;

	}

	$nCounter = ($nCounter + 1) % $n;

	$direction = $availableDirections[rand(0, count($availableDirections) - 1)];

	switch ($direction) {
		case 'up':	$position->y++; break;
		case 'down':	$position->y--; break;
		case 'left':	$position->x++; break;
		case 'right':	$position->x--; break;
	}

	$availableDirections = [];
	if (getGridCell($grid, $position, 'up') == ' ') $availableDirections[] = 'up';
	if (getGridCell($grid, $position, 'down') == ' ') $availableDirections[] = 'down';
	if (getGridCell($grid, $position, 'left') == ' ') $availableDirections[] = 'left';
	if (getGridCell($grid, $position, 'right') == ' ') $availableDirections[] = 'right';
	
	echoGrid($grid);
	echo('----' . PHP_EOL);
}

function setGridCell(array &$grid, object $position, string $value): string {
	if (!isset($grid[$position->y])) $grid[$position->y] = [];
	$grid[$position->y][$position->x] = $value;

	return $value;
}

function getGridCell(array &$grid, object $position, ?string $direction = null): string {
        switch ($direction) {
                case 'up':      $position->y++; break;
                case 'down':    $position->y--; break;
                case 'left':    $position->x++; break;
                case 'right':   $position->x--; break;
        }

	if (!isset($grid[$position->y])) $grid[$position->y] = [];

	return $grid[$position->y][$position->x] ?? setGridCell($grid, $position, ' ');
}

function echoGrid(array $grid): void {
	global $position;

	$gridKeys = array_keys($grid);
	sort($gridKeys);

	$minGridX = 0;
	for ($i=0; $i<count($grid); $i++) {
		$row = $grid[$gridKeys[$i]];
		$rowKeys = array_keys($row);
		sort($rowKeys);

		if ($minGridX > $rowKeys[0]) $minGridX = $rowKeys[0];
	}

	for ($i = 0; $i < count($grid); $i++) {
		$rowNumber = $gridKeys[$i];
		$row = $grid[$rowNumber];

		$rowKeys = array_keys($row);
		sort($rowKeys);

		$rowMaxX = $rowKeys[count($rowKeys) - 1];

		for ($j = $minGridX; $j < $rowMaxX; $j++) {
			if ($rowNumber == 0 && $j == 0) echo "\033[42m"; // green bg
			if ($rowNumber == $position->y && $j == $position->x) echo "\033[31m"; // red fg

			echo ($row[$j] ?? ' ') . ' ';
			
			echo "\033[0m"; // reset
		}

		echo "\n";
	}
}
