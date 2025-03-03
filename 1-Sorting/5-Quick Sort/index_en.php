<?php

// Quick Sort algorithm function to sort the array
function quickSort($array) {
    // If the array has one or fewer elements, no sorting is needed
    if (count($array) <= 1) {
        return $array;
    }

    // Select the pivot element (in this example, the last element is selected as the pivot)
    $pivot = array_pop($array);
    // array_pop() is a PHP function that removes and returns the last element of an array
    
    // Arrays to hold the elements smaller and greater than the pivot
    $smaller = [];
    $greater = [];

    // Iterate through the array and compare each element with the pivot to categorize them
    foreach ($array as $element) {
        if ($element < $pivot) {
            $smaller[] = $element;  // Add elements smaller than the pivot to the smaller array
        } else {
            $greater[] = $element;  // Add elements greater than the pivot to the greater array
        }
    }

    // Recursively sort the smaller array, place the pivot in the correct position, and recursively sort the greater array
    return array_merge(quickSort($smaller), [$pivot], quickSort($greater));
}

// Define a fixed array
$array = [10, 80, 30, 90, 40, 50, 70];

// Sort the array using the Quick Sort algorithm
$sortedArray = quickSort($array);

// Display the sorted array
echo "Sorted array: " . implode(", ", $sortedArray) . "\n";

?>
