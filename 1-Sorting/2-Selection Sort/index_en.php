<?php

// Selection Sort function
function selectionSort($array) {
    // Get the length of the array
    $length = count($array);

    // Iterate over each element of the array
    for ($i = 0; $i < $length - 1; $i++) {
        // Assume the current element is the smallest one
        $smallestIndex = $i;

        // Compare with the remaining elements
        for ($j = $i + 1; $j < $length; $j++) {
            if ($array[$j] < $array[$smallestIndex]) {
                $smallestIndex = $j;  // A smaller element is found
            }
        }

        // After finding the smallest element, swap it with the current element
        if ($smallestIndex != $i) {
            $temp = $array[$i];
            $array[$i] = $array[$smallestIndex];
            $array[$smallestIndex] = $temp;
        }
    }

    // Return the sorted array
    return $array;
}

// Test array
$inputArray = [64, 34, 25, 12, 22, 11, 90];

// Apply Selection Sort algorithm
$sortedArray = selectionSort($inputArray);

// Display the result
echo "Sorted Array: ";
foreach ($sortedArray as $element) {
    echo $element . " ";
}

?>
