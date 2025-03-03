<?php

// Merge Sort algorithm function to sort the array
function mergeSort($array) {
    // If the array has only one element or is empty, return it as is
    if (count($array) <= 1) {
        return $array;
    }

    // Split the array into two halves
    $middle = floor(count($array) / 2);
    $leftArray = array_slice($array, 0, $middle);  // Left half
    $rightArray = array_slice($array, $middle);    // Right half

    // Sort the left and right arrays and merge them
    return merge(mergeSort($leftArray), mergeSort($rightArray));
}

// Function to merge two sorted arrays
function merge($leftArray, $rightArray) {
    $sortedArray = [];
    
    // Compare elements from both arrays and add the smaller one to the sorted array
    while (count($leftArray) > 0 && count($rightArray) > 0) {
        if ($leftArray[0] < $rightArray[0]) {
            $sortedArray[] = array_shift($leftArray);  // Take the smallest element from the left array
        } else {
            $sortedArray[] = array_shift($rightArray);  // Take the smallest element from the right array
        }
    }

    // If any elements are left, merge them into the sorted array
    return array_merge($sortedArray, $leftArray, $rightArray);
}

// Define a fixed array
$array = [38, 27, 43, 3, 9, 82, 10];

// Sort the array using the Merge Sort algorithm
$sortedArray = mergeSort($array);

// Display the sorted array
echo "Sorted array: " . implode(", ", $sortedArray) . "\n";

?>
