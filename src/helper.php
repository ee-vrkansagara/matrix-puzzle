<?php

/**
 * Helper file
 *
 * @author Vallabhdas Kansagara <v.kansagara@easternenterprise.com>
 */

declare(strict_types=1);

function combinationGeneratorForString($chars, $size, $expectedcombinations = [])
{
    # in case of first iteration, the first set of combinations is the same as the set of characters
    if (empty($expectedcombinations)) {
        $expectedcombinations = $chars;
    }
    # size 1 indicates we are done
    if ($size == 1) {
        return $expectedcombinations;
    }
    # initialise array to put new values into it
    $finalCombinations = [];
    # loop through the existing combinations and character set to create strings
    foreach ($expectedcombinations as $combination) {
        foreach ($chars as $char) {
            $finalCombinations[] = strtoupper($combination . $char);
        }
    }

    # call the same function again for the next iteration as well
    return combinationGeneratorForString($chars, $size - 1, $finalCombinations);
}

function generatePossibleInputStringByReplacingSearchTarget(
    array $combinations,
    string $inputString,
    string $searchTarget
): array {
    $allPossiblePaths = [];
    // Let''s mix possibility of generated string into input string.
    foreach ($combinations as $combination) {
        $newPossibleString = $inputString;
        for ($index = 0; $index < strlen($combination); $index++) {
            $possitionOfFistOccurance = strpos($newPossibleString, $searchTarget);
            $newPossibleString[$possitionOfFistOccurance] = $combination[$index];
        }
        $allPossiblePaths[] = $newPossibleString;
    }
    return $allPossiblePaths;
}
