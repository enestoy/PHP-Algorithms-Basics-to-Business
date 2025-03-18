<?php

/* 
Interview Question:

An e-commerce platform has a sorted list of product IDs.
You need to check whether a specific product ID exists in this list. Since the product IDs are sorted, you are expected to use the Binary Search algorithm to perform this operation.
Additionally, you should provide a solution that explains each step in detail.
*/

/**
 * Searches for an element in a sorted array using the Binary Search algorithm.
 *
 * @param array $array Sorted array.
 * @param int $target Element to search for.
 * @return int|null Index of the element (if found) or null (if not found).
 */

function binarySearch(array $array, int $target): ?int
{
    $low = 0;
    $high = count($array) - 1;

    while ($low <= $high) {
        $mid = (int)(($low + $high) / 2);

        // Check the middle element.
        if ($array[$mid] === $target) {
            return $mid; // Element found.
        }

        // If the target is smaller than the middle element, search in the left half.
        if ($array[$mid] > $target) {
            $high = $mid - 1;
        } else {
            // If the target is larger than the middle element, search in the right half.
            $low = $mid + 1;
        }
    }

    return null; // Element not found.
}

/**
 * Explains the Binary Search process step by step.
 *
 * @param array $array Sorted array.
 * @param int $target Element to search for.
 * @return int|null Index of the element (if found) or null (if not found).
 */
function explainBinarySearch(array $array, int $target): ?int
{
    echo "Sorted Array: " . implode(", ", $array) . "\n";
    echo "Target Element: $target\n";

    $low = 0;
    $high = count($array) - 1;
    $step = 1;

    while ($low <= $high) {
        $mid = (int)(($low + $high) / 2);
        echo "\nStep $step:\n";
        echo "  Low: $low, High: $high, Mid: $mid\n";
        echo "  Middle Element: {$array[$mid]}\n";

        if ($array[$mid] === $target) {
            echo "  Target found! Index: $mid\n";
            return $mid;
        }

        if ($array[$mid] > $target) {
            echo "  Target is smaller than the middle element, searching left half.\n";
            $high = $mid - 1;
        } else {
            echo "  Target is larger than the middle element, searching right half.\n";
            $low = $mid + 1;
        }

        $step++;
    }

    echo "\nTarget not found.\n";
    return null;
}

// Example usage:
$productIDs = [101, 203, 305, 407, 509, 612, 714, 815, 917, 1020];
$targetID = 509;

echo "Starting Binary Search...\n";
$result = explainBinarySearch($productIDs, $targetID);

if ($result !== null) {
    echo "Product ID $targetID found at index $result.\n";
} else {
    echo "Product ID $targetID not found.\n";
}

?>