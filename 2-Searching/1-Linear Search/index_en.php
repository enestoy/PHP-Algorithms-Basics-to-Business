<?php

/**
 * Linear Search Algorithm
 *
 * @param array $list The list to search in
 * @param mixed $target The value to find
 * @return int|false The index of the found element or false if not found
 */
function linearSearch(array $list, $target)
{
    foreach ($list as $index => $value) {
        if ($value === $target) {
            return $index; // Element found, returning index
        }
    }
    return false; // Element not found
}

// Example usage
$numbers = [10, 25, 30, 45, 50];
$searchValue = 30;

$result = linearSearch($numbers, $searchValue);

if ($result !== false) {
    echo "The searched number is found at index $result.";
} else {
    echo "The searched number is not in the list.";
}

?>
