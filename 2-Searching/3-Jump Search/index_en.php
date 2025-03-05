<?php

/**
 * Jump Search Algorithm
 *
 * @param array $list The sorted list in which to perform the search
 * @param mixed $target The value to be searched
 * @return int|false The index of the found element or false
 */
function jumpSearch(array $list, $target)
{
    $listLength = count($list);
    $stepSize = floor(sqrt($listLength)); // Step size, typically the square root of the list length
    $leftIndex = 0;
    $rightIndex = 0;

    // Move step by step and search for the target element within the block
    while ($rightIndex < $listLength && $list[$rightIndex] < $target) {
        $leftIndex = $rightIndex;
        $rightIndex += $stepSize; // Move to the next block
    }

    // If found, perform linear search within the block
    for ($i = $leftIndex; $i < min($rightIndex, $listLength); $i++) {
        if ($list[$i] === $target) {
            return $i; // Element found, return its index
        }
    }

    return false; // Element not found
}

// Example usage
$numbers = [1, 3, 5, 7, 9, 11, 13, 15, 17, 19];
$targetNumber = 15;

$result = jumpSearch($numbers, $targetNumber);

if ($result !== false) {
    echo "The target number was found at index $result.";
} else {
    echo "The target number was not found in the list.";
}

?>
