<?php

// Backtracking function to find subsets that sum to the target
function findSubsetSum($array, $target, $index = 0, $currentSum = 0, $subset = []) {
    // If the target sum is reached, print the subset
    if ($currentSum === $target) {
        echo "Subset Found: " . implode(", ", $subset) . "\n";
        return true;
    }

    // If the end of the array is reached and the sum is not achieved, return false
    if ($index === count($array)) {
        return false;
    }

    // Include the current element and move to the next element
    $subset[] = $array[$index];
    if (findSubsetSum($array, $target, $index + 1, $currentSum + $array[$index], $subset)) {
        return true; // If a solution is found, return true
    }

    // Exclude the current element and move to the next element
    array_pop($subset);
    return findSubsetSum($array, $target, $index + 1, $currentSum, $subset); // Try without the element
}

// Main function
function subsetSum($array, $target) {
    if (!findSubsetSum($array, $target)) {
        echo "No subset found.\n";
    }
}

// Example usage
$array = [3, 34, 4, 12, 5, 2]; // Example array
$target = 9; // Target sum
subsetSum($array, $target);
?>
