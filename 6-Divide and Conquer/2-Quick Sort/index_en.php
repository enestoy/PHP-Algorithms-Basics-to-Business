<?php

// Function implementing the Quick Sort algorithm
function quickSort(array $array): array {
    // If the array has 1 or fewer elements, it is already sorted
    if (count($array) < 2) {
        return $array;
    }
    
    // Select a pivot element (usually the first element)
    $pivot = $array[0];
    
    // Separate smaller and larger elements into different arrays
    $smaller = [];
    $greater = [];
    
    for ($i = 1; $i < count($array); $i++) {
        if ($array[$i] < $pivot) {
            $smaller[] = $array[$i];
        } else {
            $greater[] = $array[$i];
        }
    }
    
    // Recursively sort subarrays and merge the results
    return array_merge(quickSort($smaller), [$pivot], quickSort($greater));
}

// Define a sample array for testing
$array = [38, 27, 43, 3, 9, 82, 10];

// Apply the Quick Sort algorithm
$sortedArray = quickSort($array);

// Print the sorted array
echo "Sorted Array: " . implode(", ", $sortedArray);

?>
