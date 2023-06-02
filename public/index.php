<?php

declare(strict_types=1);

use Vrkansagara\Puzzle\Matrix;
use Vrkansagara\Puzzle\Puzzle;

define('START_TIME', microtime(true));

require __DIR__ . '/../vendor/autoload.php';

$defaultInputString = 'RRRRDDDL??';

if (! empty($argv[1])) {
    $defaultInputString = (string) $argv[1];
}

echo sprintf("Given instructions is [ %s ]", $defaultInputString) . PHP_EOL;

$matrix = new Matrix();
$matrix->setRow(5);
$matrix->setColumn(5);


$puzzle = new Puzzle();
$puzzle->setInputString($defaultInputString);
$puzzle->process($matrix);

echo PHP_EOL . sprintf("Script execution complete in %2.3f milliseconds", floor((microtime(true) - START_TIME) * 1000));
