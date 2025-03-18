<?php

/* 
Interview Question:

Problem:
Given two text strings, find the longest common subsequence (LCS) between them.
For example, given "ABCBDAB" and "BDCAB", the LCS can be "BCAB" or "BDAB".
*/

function longestCommonSubsequence($text1, $text2) {
    $m = strlen($text1);
    $n = strlen($text2);

    // Create and initialize the DP table with zeros
    $dp = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));

    // Fill the DP table
    for ($i = 1; $i <= $m; $i++) {
        for ($j = 1; $j <= $n; $j++) {
            if ($text1[$i - 1] == $text2[$j - 1]) {
                // If characters match, add 1 to the previous diagonal value
                $dp[$i][$j] = $dp[$i - 1][$j - 1] + 1;
            } else {
                // If no match, take the maximum of the left or top cell
                $dp[$i][$j] = max($dp[$i - 1][$j], $dp[$i][$j - 1]);
            }
        }
    }

    // Trace back the DP table to get the LCS
    $lcs = "";
    $i = $m;
    $j = $n;
    while ($i > 0 && $j > 0) {
        if ($text1[$i - 1] == $text2[$j - 1]) {
            // Match found, add to LCS
            $lcs = $text1[$i - 1] . $lcs;
            $i--;
            $j--;
        } elseif ($dp[$i - 1][$j] > $dp[$i][$j - 1]) {
            // Move left if the value is greater
            $i--;
        } else {
            // Move up otherwise
            $j--;
        }
    }

    return $lcs;
}

// Example usage
$text1 = "ABCBDAB";
$text2 = "BDCAB";
echo "Longest Common Subsequence: " . longestCommonSubsequence($text1, $text2); // Output: BCAB or BDAB

?>
