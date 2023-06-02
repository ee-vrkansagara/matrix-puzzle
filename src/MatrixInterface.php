<?php

/**
 * Matrix interface
 *
 * @author Vallabhdas Kansagara <v.kansagara@easternenterprise.com>
 */

declare(strict_types=1);

namespace Vrkansagara\Puzzle;

interface MatrixInterface
{
    public function getRow(): int;

    public function setRow(int $row);

    public function getColumn(): int;

    public function setColumn(int $row);

    public function getRules(): array;

    public function setRules(array $row): void;

    public function print(array $matrix): void;

    public function primtMatrixWithPath(string $commandString): array;
}
