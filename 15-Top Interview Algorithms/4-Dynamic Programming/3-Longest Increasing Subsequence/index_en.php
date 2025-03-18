<?php
/* 
Interview Question:

Problem:
Given an integer array, find the longest increasing subsequence (LIS) in the array.
For example, given [10, 22, 9, 33, 21, 50, 41, 60, 80], the LIS would be [10, 22, 33, 50, 60, 80].
*/

function longestIncreasingSubsequence($nums) {
    $n = count($nums);
    if ($n == 0) return [];

    // Create a DP table and initialize each element's LIS length to 1
    $dp = array_fill(0, $n, 1);
    $prev = array_fill(0, $n, -1); // To store previous indices

    // Variables to track the longest LIS's last index and length
    $maxLength = 1;
    $maxIndex = 0;

    // Fill the DP table
    for ($i = 1; $i < $n; $i++) {
        for ($j = 0; $j < $i; $j++) {
            if ($nums[$i] > $nums[$j] && $dp[$i] < $dp[$j] + 1) {
                $dp[$i] = $dp[$j] + 1;
                $prev[$i] = $j; // Update previous index
            }
        }
        // Update the longest LIS
        if ($dp[$i] > $maxLength) {
            $maxLength = $dp[$i];
            $maxIndex = $i;
        }
    }

    // Retrieve LIS by backtracking
    $lis = [];
    for ($i = $maxIndex; $i >= 0; $i = $prev[$i]) {
        array_unshift($lis, $nums[$i]);
        if ($prev[$i] == -1) break;
    }

    return $lis;
}

// Example usage
$nums = [10, 22, 9, 33, 21, 50, 41, 60, 80];
$result = longestIncreasingSubsequence($nums);
echo "Longest Increasing Subsequence: " . implode(", ", $result); // Output: 10, 22, 33, 50, 60, 80

?>
