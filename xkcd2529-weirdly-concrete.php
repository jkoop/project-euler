<?php

$n = 4;
$k = 10;

$nCounter = 0;
$kCounter = 0;
$avaliableDirections = ['up','down','left','right'];
$grid = [];
$position = (object) [
	'x' => 0,
	'y' => 0,
];

while ($kCounter < $k && count($avaliableDirections) > 0) {
	setGridCell($grid, $position, '+'); // i was here

	if ($nCounter + 1 == $n) {
		setGridCell($grid, $position, 'm'); // marble
		$kCounter++;
	}

	$nCounter = ($nCounter + 1) % $n;

	$direction = $avaliableDirections[rand(0, count($avaliableDirections) - 1)];

	switch ($direction) {
		case 'up':	$position->y++; break;
		case 'down':	$position->y--; break;
		case 'left':	$position->x++; break;
		case 'right':	$position->x--; break;
	}

	$avaliableDirections = [];
	if (getGridCell($grid, $position, 'up') == '.') $avaliableDirections[] = 'up';
	if (getGridCell($grid, $position, 'down') == '.') $avaliableDirections[] = 'down';
	if (getGridCell($grid, $position, 'left') == '.') $avaliableDirections[] = 'left';
	if (getGridCell($grid, $position, 'right') == '.') $avaliableDirections[] = 'right';
}

echoGrid($grid);

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

	return $grid[$position->y][$position->x] ?? setGridCell($grid, $position, '.');
}

function echoGrid(array $grid): void {
	$gridKeys = array_keys($grid);
	sort($gridKeys);

	for ($i=0; $i<count($grid); $i++) {
		$row = $grid[$gridKeys[$i]];
		$rowKeys = array_keys($row);
		sort($rowKeys);

		for ($j=0; $j<count($row); $j++) {
			$cell = $row[$rowKeys[$j]];

			echo $cell . ', ';
		}

		echo "\n";
	}
}
