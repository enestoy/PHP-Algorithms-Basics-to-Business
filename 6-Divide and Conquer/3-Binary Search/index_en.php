<?php

// Function implementing the Binary Search algorithm
function binarySearch(array $array, int $target, int $start, int $end): int {
    // Is the search range valid?
    if ($start > $end) {
        return -1; // Element not found
    }
    
    // Find the middle index
    $middle = intdiv($start + $end, 2);
    
    // If the middle element is the target, return its index
    if ($array[$middle] == $target) {
        return $middle;
    }
    
    // If the target is smaller than the middle element, search in the left half
    if ($target < $array[$middle]) {
        return binarySearch($array, $target, $start, $middle - 1);
    }
    
    // If the target is greater than the middle element, search in the right half
    return binarySearch($array, $target, $middle + 1, $end);
}

// Define a sorted array for testing
$array = [3, 9, 10, 27, 38, 43, 82];
$target = 27;

// Apply the Binary Search algorithm
$result = binarySearch($array, $target, 0, count($array) - 1);

// Print the result
if ($result != -1) {
    echo "Target value ($target) found at index $result.";
} else {
    echo "Target value ($target) not found in the array.";
}

?>
