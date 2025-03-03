<?php

// Radix Sort algorithm function to sort the array
function radixSort($array) {
    // Find the largest element in the array
    $maxValue = max($array);

    // Perform sorting up to the largest digit
    for ($digit = 1; $maxValue / $digit >= 1; $digit *= 10) {
        $array = countingSortByDigit($array, $digit);
    }

    return $array;
}

// Function to perform Counting Sort by digit
function countingSortByDigit($array, $digit) {
    $n = count($array);
    $outputArray = array_fill(0, $n, 0);
    $countArray = array_fill(0, 10, 0); // Array to hold digits from 0 to 9
    // array_fill() is a PHP function that fills an array with a specified value for a given range of indices.

    // Group numbers by their digit
    foreach ($array as $number) {
        $digitValue = floor($number / $digit) % 10;
        $countArray[$digitValue]++;
    }

    // Modify the count array to determine the correct positions for the numbers
    for ($i = 1; $i < 10; $i++) {
        $countArray[$i] += $countArray[$i - 1];
    }

    // Sort the array (the actual sorting happens here)
    for ($i = $n - 1; $i >= 0; $i--) {
        $number = $array[$i];
        $digitValue = floor($number / $digit) % 10;
        $outputArray[$countArray[$digitValue] - 1] = $number;
        $countArray[$digitValue]--;
    }

    return $outputArray;
}

// Define a fixed array
$array = [170, 45, 75, 90, 802, 24, 2, 66];

// Sort the array using the Radix Sort algorithm
$sortedArray = radixSort($array);

// Display the sorted array
echo "Sorted array: " . implode(", ", $sortedArray) . "\n";

?>
