<?php

/**
 * Function to calculate the length of the Longest Increasing Subsequence (LIS) using Dynamic Programming
 *
 * @param array $array The input array of numbers
 * @return int The length of the longest increasing subsequence
 */
function calculateLIS(array $array): int {
    $length = count($array);
    if ($length === 0) return 0;
    
    // DP array initialized with 1 for each element
    $dp = array_fill(0, $length, 1);
    
    // Calculate LIS
    for ($i = 1; $i < $length; $i++) {
        for ($j = 0; $j < $i; $j++) {
            if ($array[$i] > $array[$j] && $dp[$i] < $dp[$j] + 1) {
                $dp[$i] = $dp[$j] + 1;
            }
        }
    }
    
    // Return the length of the longest increasing subsequence
    return max($dp);
}

// Example usage
$array = [10, 22, 9, 33, 21, 50, 41, 60, 80];
echo "Length of the longest increasing subsequence: " . calculateLIS($array);

?>