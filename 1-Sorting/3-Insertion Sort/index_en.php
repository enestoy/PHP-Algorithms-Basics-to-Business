<?php

// Insertion Sort algorithm function to sort the array
function insertionSort($array) {
    // Sorting operation for each element in the array
    for ($i = 1; $i < count($array); $i++) {
        // Get the current element
        $key = $array[$i];
        
        // Find the previous element in the sorted portion
        $j = $i - 1;

        // If an element in the sorted portion is greater than the current element, it will be shifted to the right
        while ($j >= 0 && $array[$j] > $key) {
            $array[$j + 1] = $array[$j];  // Shift element to the right
            $j--;  // Move to the previous element
        }

        // Place the current element in the correct position
        $array[$j + 1] = $key;
    }

    return $array;
}

// Define a fixed array
$numbers = [12, 5, 9, 1, 15, 6, 3];

// Sort the array using Insertion Sort algorithm
$sortedNumbers = insertionSort($numbers);

// Display the sorted array
echo "Sorted numbers: " . implode(", ", $sortedNumbers) . "\n";

?>
