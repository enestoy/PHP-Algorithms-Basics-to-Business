<?php
/* 
Interview Question:

In an e-commerce platform, you need to sort customer orders based on their delivery dates. 
You have an array containing the delivery dates of the orders, and you need to sort this array in ascending order (from the oldest date to the newest date) using the Merge Sort algorithm. 
Additionally, you are expected to provide a detailed explanation of each step during the sorting process.

*/

/**
 * Sorts an array using the Merge Sort algorithm.
 *
 * @param array $array The array to be sorted.
 * @return array The sorted array.
 */

function mergeSort(array $array): array
{
    // Base case: If the array has 1 or fewer elements, it is already sorted.
    if (count($array) <= 1) {
        return $array;
    }

    // Split the array into two halves.
    $middle = (int)(count($array) / 2);
    $left = array_slice($array, 0, $middle);
    $right = array_slice($array, $middle);

    // Recursively sort the left and right halves.
    $left = mergeSort($left);
    $right = mergeSort($right);

    // Merge the sorted left and right halves.
    return merge($left, $right);
}

/**
 * Merges two sorted arrays.
 *
 * @param array $left The sorted left array.
 * @param array $right The sorted right array.
 * @return array The merged and sorted array.
 */
function merge(array $left, array $right): array
{
    $result = [];
    $i = $j = 0;

    // Compare elements from both arrays and merge them.
    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] < $right[$j]) {
            $result[] = $left[$i];
            $i++;
        } else {
            $result[] = $right[$j];
            $j++;
        }
    }

    // Add remaining elements from the left array.
    while ($i < count($left)) {
        $result[] = $left[$i];
        $i++;
    }

    // Add remaining elements from the right array.
    while ($j < count($right)) {
        $result[] = $right[$j];
        $j++;
    }

    return $result;
}

/**
 * Sorts the array and provides a detailed explanation of each step.
 *
 * @param array $array The array to be sorted.
 * @return array The sorted array.
 */
function explainMergeSort(array $array): array
{
    echo "Initial Array: " . implode(", ", $array) . "\n";

    if (count($array) <= 1) {
        echo "The array has 1 or fewer elements, it is already sorted.\n";
        return $array;
    }

    $middle = (int)(count($array) / 2);
    $left = array_slice($array, 0, $middle);
    $right = array_slice($array, $middle);

    echo "Array Split into Two Halves:\n";
    echo "  Left Array: " . implode(", ", $left) . "\n";
    echo "  Right Array: " . implode(", ", $right) . "\n";

    $left = explainMergeSort($left);
    $right = explainMergeSort($right);

    $result = merge($left, $right);
    echo "Merged Array: " . implode(", ", $result) . "\n";

    return $result;
}

// Example usage:
$deliveryDates = ["2023-10-15", "2023-09-01", "2023-11-20", "2023-08-05", "2023-12-01"];
echo "Delivery Dates to be Sorted: " . implode(", ", $deliveryDates) . "\n";

$sortedDates = explainMergeSort($deliveryDates);
echo "Final Sorted Delivery Dates: " . implode(", ", $sortedDates) . "\n";

?>