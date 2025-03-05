<?php

/**
 * Binary Search Algorithm
 *
 * @param array $list The sorted list to search in
 * @param mixed $target The value to find
 * @return int|false The index of the found element or false
 */
function binarySearch(array $list, $target)
{
    $left = 0;
    $right = count($list) - 1;

    while ($left <= $right) {
        $middle = floor(($left + $right) / 2);

        if ($list[$middle] === $target) {
            return $middle; // Element found, returning index
        }

        if ($list[$middle] < $target) {
            $left = $middle + 1; // Continue searching the right half
        } else {
            $right = $middle - 1; // Continue searching the left half
        }
    }
    
    return false; // Element not found
}

// Example usage
$numbers = [5, 10, 15, 20, 25, 30, 35, 40];
$targetNumber = 25;

$result = binarySearch($numbers, $targetNumber);

if ($result !== false) {
    echo "The target number was found at index $result.";
} else {
    echo "The target number was not found in the list.";
}

?>
