<?php

// Function to implement the Counting Sort algorithm
function countingSort($array) {
    // Find the maximum value in the array
    $maxValue = max($array);

    // Create the frequency array and initialize it to 0
    $frequencyArray = array_fill(0, $maxValue + 1, 0);

    // Count the occurrences of each number and mark its place in the frequency array
    foreach ($array as $number) {
        $frequencyArray[$number]++;
    }

    // Create the sorted array
    $sortedArray = [];
    for ($i = 0; $i <= $maxValue; $i++) {
        while ($frequencyArray[$i] > 0) {
            $sortedArray[] = $i;
            $frequencyArray[$i]--;
        }
    }

    return $sortedArray;
}

// Example array
$array = [4, 2, 2, 8, 3, 3, 1];

// Sort the array using Counting Sort
$sortedArray = countingSort($array);

// Display the sorted array
echo "Sorted array: " . implode(", ", $sortedArray) . "\n";

?>
