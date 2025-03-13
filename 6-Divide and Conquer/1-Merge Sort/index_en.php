<?php

// Function to merge two sorted subarrays
function merge(array &$array, array $left, array $right): void {
    $i = $j = $k = 0;
    
    // Compare elements of both subarrays and add to the main array
    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] < $right[$j]) {
            $array[$k++] = $left[$i++];
        } else {
            $array[$k++] = $right[$j++];
        }
    }
    
    // Add remaining elements from the left subarray if any
    while ($i < count($left)) {
        $array[$k++] = $left[$i++];
    }
    
    // Add remaining elements from the right subarray if any
    while ($j < count($right)) {
        $array[$k++] = $right[$j++];
    }
}

// Function implementing the Merge Sort algorithm
function mergeSort(array &$array): void {
    $length = count($array);
    if ($length < 2) {
        return;
    }
    
    // Divide the array into two subarrays
    $middle = intdiv($length, 2);
    $left = array_slice($array, 0, $middle);
    $right = array_slice($array, $middle);
    
    // Recursively apply Merge Sort on subarrays
    mergeSort($left);
    mergeSort($right);
    
    // Merge the sorted subarrays
    merge($array, $left, $right);
}

// Define a sample array for testing
$array = [38, 27, 43, 3, 9, 82, 10];

// Apply the Merge Sort algorithm
mergeSort($array);

// Print the sorted array
echo "Sorted Array: " . implode(", ", $array);

?>
