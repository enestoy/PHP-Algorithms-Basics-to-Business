<?php

// Heap Sort algorithm function to sort the array
function heapSort($array) {
    // Get the size of the array
    $n = count($array);
    
    // Build a max heap by performing the heapify operation from the middle to the root
    for ($i = floor($n / 2) - 1; $i >= 0; $i--) {
        heapify($array, $n, $i);
    }
    // floor() is a PHP math function that returns the largest integer less than or equal to the given number.

    // Sorting operation
    for ($i = $n - 1; $i > 0; $i--) {
        // Swap the root element (the largest element) with the last element
        $temp = $array[0];
        $array[0] = $array[$i];
        $array[$i] = $temp;

        // Re-adjust the new root element using heapify
        heapify($array, $i, 0);
    }

    return $array;
}

// Heapify function (adjusts the array to maintain the heap property)
function heapify(&$array, $n, $i) {
    $largest = $i; // Start by assuming the root is the largest
    $left = 2 * $i + 1; // Left child
    $right = 2 * $i + 2; // Right child

    // Check if the left child is smaller than the size of the array
    if ($left < $n && $array[$left] > $array[$largest]) {
        $largest = $left;
    }

    // Check if the right child is smaller than the size of the array
    if ($right < $n && $array[$right] > $array[$largest]) {
        $largest = $right;
    }

    // If the largest element is not the root, swap the elements and heapify again
    if ($largest != $i) {
        $temp = $array[$i];
        $array[$i] = $array[$largest];
        $array[$largest] = $temp;

        // Recursively call the heapify function
        heapify($array, $n, $largest);
    }
}

// Define a fixed array
$array = [4, 10, 3, 5, 1];

// Sort the array using the Heap Sort algorithm
$sortedArray = heapSort($array);

// Display the sorted array
echo "Sorted array: " . implode(", ", $sortedArray) . "\n";

?>
