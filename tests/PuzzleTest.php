<?php

/**
 * PuzzleTest class
 *
 * @author Vallabhdas Kansagara <v.kansagara@easternenterprise.com>
 */

declare(strict_types=1);

namespace Vrkansagara\Puzzle;

use PHPUnit\Framework\TestCase;

class PuzzleTest extends TestCase
{
    public $dataSet = [
        [
            'input' => 'R?D?DRDD',
            'output' => 'RRDRDRDD'
        ],
        [
            'input' => 'RRRRDDDL??',
            'output' => 'RRRRDDDLDR'
        ],
        [
            'input'  => 'RRDLDLD?RUR?RD',
            'output' => 'RRDLDLDDRURRRD'
        ],
    ];

    /** @test */
    public function stringMustHaveQuestionMark()
    {
        $totalDataSet = count($this->dataSet) - 1;
        $data = $this->dataSet[rand(1, $totalDataSet)];
        extract($data);
        $input = strtolower($input);
        $this->assertStringContainsString('?', $input);
    }

    /** @test */
    public function processedStringMustNotHaveQuestionMark()
    {
        $totalDataSet = count($this->dataSet) - 1;
        $data = $this->dataSet[rand(1, $totalDataSet)];
        extract($data);
        $puzzle = new Puzzle();
        $puzzle->setInputString($input);
        $finalOutPut = $puzzle->getProcessedString();
        $this->assertStringNotContainsString('?', $finalOutPut);
    }
}
