<?php
// Exponential Search Function
function exponentialSearch($array, $target) {
    $arraySize = count($array);
    
    // Check the first element
    if ($array[0] == $target) {
        return 0; // If the first element matches the target, return index 0
    }
    
    // Define the search range (expanding the range)
    $i = 1;
    while ($i < $arraySize && $array[$i] <= $target) {
        $i *= 2;  // Double the search range
    }

    // Perform Binary Search
    return binarySearch($array, $target, intdiv($i, 2), min($i, $arraySize - 1));
}

// intdiv() in PHP returns the integer division result of two numbers, discarding the decimal part.

// Binary Search Function
function binarySearch($array, $target, $left, $right) {
    while ($right >= $left) {
        $middle = intdiv($left + $right, 2);
        
        // Found the target value
        if ($array[$middle] == $target) {
            return $middle; // Return the index of the target
        }
        
        // If the target is smaller, search in the left half
        if ($array[$middle] > $target) {
            $right = $middle - 1;
        } else {
            // If the target is larger, search in the right half
            $left = $middle + 1;
        }
    }
    
    return -1;  // If the element is not found, return -1
}

// Test section
$array = [1, 3, 5, 7, 9, 11, 15, 19, 25, 30];
$target = 15; // The target value we are searching for
$result = exponentialSearch($array, $target);

// Print the result
if ($result != -1) {
    echo "Element found at index " . $result . ".\n";
} else {
    echo "Element not found in the array.\n";
}
?>
