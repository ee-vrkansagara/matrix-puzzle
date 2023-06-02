<?php

/**
 * Puzzle class
 *
 * @author Vallabhdas Kansagara <v.kansagara@easternenterprise.com>
 */

declare(strict_types=1);

namespace Vrkansagara\Puzzle;

class Puzzle
{
    private string $inputString;

    /**
     * @return string
     */
    public function getInputString(): string
    {
        return $this->inputString;
    }

    /**
     * @param string $inputString
     */
    public function setInputString(string $inputString): void
    {
        $this->inputString = $inputString;
    }


    public function process(Matrix $matrix, $searchTarget = '?', $method = ['r','d'])
    {
        $allPossiblePathToTravel = $this->generateAllPossiblePath($this->getInputString(), $searchTarget, $method);

        foreach ($allPossiblePathToTravel as $possibleString) {
            $validMatrix = $matrix->primtMatrixWithPath($possibleString);

            if (
                isset($validMatrix[$matrix->getRow() - 1][$matrix->getColumn() - 1])
                && ! empty($validMatrix[$matrix->getRow() - 1][$matrix->getColumn() - 1])
            ) {
                echo sprintf(
                    "Execute these instruction [ %s] which require [ %d ] steps to reach at end of the matrix.",
                    $possibleString,
                    strlen($possibleString)
                ) . PHP_EOL;

                if ($matrix->printMatrix) {
                    $matrix->print($validMatrix);
                }

                if (! $matrix->printAllPossibility) {
                    break;
                }
            }
        }
    }

    private function generateAllPossiblePath(
        string $inputString,
        string $searchTarget,
        array $combinationCharacter
    ): array {
        $countOfSearchTarget = substr_count($inputString, $searchTarget); // ? = 3
        $allPossibleCombinationsCount = pow(count($combinationCharacter), $countOfSearchTarget);// 2^3 = 8
        $allPossibleCombinations = combinationGeneratorForString($combinationCharacter, $countOfSearchTarget);

        if (count($allPossibleCombinations) !== $allPossibleCombinationsCount) {
            die("All possible count is not matched with generated string count.");
        }

        return generatePossibleInputStringByReplacingSearchTarget(
            $allPossibleCombinations,
            $inputString,
            $searchTarget
        );
    }
}
