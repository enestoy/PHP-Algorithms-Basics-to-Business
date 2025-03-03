<?php

// Function to implement the Bucket Sort algorithm
function bucketSort($array) {
    // Find the minimum and maximum values in the array
    $minValue = min($array);
    $maxValue = max($array);

    // Determine the number of buckets
    $bucketCount = count($array);
    
    // Create empty buckets
    $buckets = array_fill(0, $bucketCount, []);

    // Place elements into appropriate buckets
    foreach ($array as $value) {
        // Calculate the index of the bucket where the value should be placed
        $bucketIndex = floor(($value - $minValue) / ($maxValue - $minValue + 1) * $bucketCount);
        $buckets[$bucketIndex][] = $value;
    }

    // Sort the elements within each bucket
    foreach ($buckets as &$bucket) {
        sort($bucket);
    }

    // Merge all buckets into a single sorted array
    $sortedArray = [];
    foreach ($buckets as $bucket) {
        foreach ($bucket as $value) {
            $sortedArray[] = $value;
        }
    }

    return $sortedArray;
}

// Example array
$array = [0.42, 0.32, 0.23, 0.51, 0.12, 0.33];

// Sort the array using Bucket Sort
$sortedArray = bucketSort($array);

// Display the sorted array
echo "Sorted array: " . implode(", ", $sortedArray) . "\n";

?>
