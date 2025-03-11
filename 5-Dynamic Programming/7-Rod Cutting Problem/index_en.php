<?php

// Define the prices for different lengths of the rod
$prices = [0, 2, 5, 7, 8]; // p[1] = 2, p[2] = 5, p[3] = 7, p[4] = 8
$length = 4; // Length of the rod

// Dynamic programming function
function maxProfit($prices, $length) {
    // Initialize the dp array (to store the maximum profit for each length)
    $dp = array_fill(0, $length + 1, 0);

    // Calculate the maximum profit for each length
    for ($i = 1; $i <= $length; $i++) {
        // Find the maximum profit by dividing the length into different parts
        for ($j = 1; $j <= $i; $j++) {
            $dp[$i] = max($dp[$i], $prices[$j] + $dp[$i - $j]);
        }
    }

    // Return the result, which is the maximum profit for the given length
    return $dp[$length];
}

// Calculate the maximum profit from cutting the rod
$maxProfit = maxProfit($prices, $length);

// Print the result
echo "Maximum profit: " . $maxProfit;

?>