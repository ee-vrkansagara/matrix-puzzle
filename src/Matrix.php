<?php

/**
 * Matrix class
 *
 * @author Vallabhdas Kansagara <v.kansagara@easternenterprise.com>
 */

declare(strict_types=1);

namespace Vrkansagara\Puzzle;

class Matrix implements MatrixInterface
{
    private int $row;
    private int $column;
    public bool $printMatrix = false;
    public bool $printAllPossibility = false;
    public bool $doNnoOverrideCell = true;


    /**
     * @return int
     */
    public function getRow(): int
    {
        return $this->row;
    }

    /**
     * @param int $row
     */
    public function setRow(int $row): void
    {
        $this->row = $row;
    }

    /**
     * @return int
     */
    public function getColumn(): int
    {
        return $this->column;
    }

    /**
     * @param int $column
     */
    public function setColumn(int $column): void
    {
        $this->column = $column;
    }

    /**
     * @return array
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    /**
     * @param array $rules
     */
    public function setRules(array $rules): void
    {
        $this->rules = $rules;
    }


    public function print(array $matrix = []): void
    {
        for ($rowIndex = 0; $rowIndex < $this->getRow(); $rowIndex++) {
            for ($columnIndex = 0; $columnIndex < $this->getColumn(); $columnIndex++) {
                if (! isset($matrix[$rowIndex][$columnIndex])) {
                    $matrix[$rowIndex][$columnIndex] = "";
                }
                echo sprintf("%s \t", $matrix[$rowIndex][$columnIndex]);
            }
            echo PHP_EOL;
        }
    }

    public function primtMatrixWithPath(string $commandString): array
    {
        $matrix = [];
        $matrixRow = 0;
        $matrixColumn = 0;
        for ($commandIndex = 0; $commandIndex < strlen($commandString); $commandIndex++) {
            $command = strtolower($commandString[$commandIndex]);
            if ($command === 'l') {
                $matrixColumn -= 1;
            }
            if ($command === 'r') {
                $matrixColumn += 1;
            }

            if ($command === 'u') {
                $matrixRow -= 1;
            }
            if ($command === 'd') {
                $matrixRow += 1;
            }
            if (
                $this->doNnoOverrideCell
                && isset($matrix[$matrixRow][$matrixColumn])
                && ! empty($matrix[$matrixRow][$matrixColumn])
            ) {
                break;
            }
            $matrix[$matrixRow][$matrixColumn] = $command;
        }
        return $matrix;
    }
}
