<?php
/* 
Interview Question:

Problem:
Given an amount of money ($amount) and a list of coins ($coins), find the minimum number of coins required to make the amount.
If the amount cannot be made with the given coins, return -1.
*/

function coinChange($coins, $amount) {
    // Create DP table and set initial values
    $dp = array_fill(0, $amount + 1, $amount + 1); // Start with maximum value
    $dp[0] = 0; // 0 amount requires 0 coins

    // Fill the DP table
    for ($i = 1; $i <= $amount; $i++) {
        foreach ($coins as $coin) {
            if ($coin <= $i) {
                // Update the minimum number of coins for the current amount
                $dp[$i] = min($dp[$i], $dp[$i - $coin] + 1);
            }
        }
    }

    // If $dp[$amount] has not been updated, no solution exists
    return $dp[$amount] > $amount ? -1 : $dp[$amount];
}

// Example usage
$coins = [1, 2, 5];
$amount = 11;
$result = coinChange($coins, $amount);
echo "Minimum number of coins needed: " . $result; // Output: 3 (5 + 5 + 1)

?>
