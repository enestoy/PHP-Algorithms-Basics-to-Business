<?php
/* 
Interview Question:

Problem:
Given a text ($text) and a substring ($pattern), 
find how many times the substring occurs in the text and at which positions using the Boyer-Moore algorithm.

*/

function boyerMooreSearch($text, $pattern) {
    $n = strlen($text);
    $m = strlen($pattern);
    $positions = []; // To store matching positions

    // Create the Bad Character Table
    $badCharTable = buildBadCharTable($pattern);

    $s = 0; // Shift position on the text
    while ($s <= $n - $m) {
        $j = $m - 1;

        // Compare the pattern from right to left
        while ($j >= 0 && $pattern[$j] == $text[$s + $j]) {
            $j--;
        }

        // If the pattern matches completely
        if ($j < 0) {
            $positions[] = $s; // Store the matching position
            // Update the shift amount
            $s += ($s + $m < $n) ? $m - ($badCharTable[ord($text[$s + $m])] ?? $m) : 1;
        } else {
            // Calculate the shift amount based on the bad character rule
            $s += max(1, $j - ($badCharTable[ord($text[$s + $j])] ?? -1));
        }
    }

    return $positions;
}

function buildBadCharTable($pattern) {
    $m = strlen($pattern);
    $badCharTable = [];

    // Record the rightmost index for each character in the pattern
    for ($i = 0; $i < $m; $i++) {
        $badCharTable[ord($pattern[$i])] = $i;
    }

    return $badCharTable;
}

// Example usage
$text = "ABAAABCDBBABCDDEBCABC";
$pattern = "ABC";
$positions = boyerMooreSearch($text, $pattern);

echo "Pattern found at positions: " . implode(", ", $positions) . "\n";

?>
