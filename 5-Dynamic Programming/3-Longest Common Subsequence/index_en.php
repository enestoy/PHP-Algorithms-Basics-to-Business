<?php

/**
 * Function to find the Longest Common Subsequence (LCS) between two strings using Dynamic Programming
 *
 * @param string $string1 The first string
 * @param string $string2 The second string
 * @return string The longest common subsequence
 */
function calculateLCS(string $string1, string $string2): string {
    $length1 = strlen($string1);
    $length2 = strlen($string2);
    
    // Create the dynamic programming table
    $dp = array_fill(0, $length1 + 1, array_fill(0, $length2 + 1, 0));
    
    // Fill the table
    for ($i = 1; $i <= $length1; $i++) {
        for ($j = 1; $j <= $length2; $j++) {
            if ($string1[$i - 1] === $string2[$j - 1]) {
                $dp[$i][$j] = $dp[$i - 1][$j - 1] + 1;
            } else {
                $dp[$i][$j] = max($dp[$i - 1][$j], $dp[$i][$j - 1]);
            }
        }
    }
    
    // Backtracking to find the LCS
    $i = $length1;
    $j = $length2;
    $result = "";
    
    while ($i > 0 && $j > 0) {
        if ($string1[$i - 1] === $string2[$j - 1]) {
            $result = $string1[$i - 1] . $result;
            $i--;
            $j--;
        } elseif ($dp[$i - 1][$j] > $dp[$i][$j - 1]) {
            $i--;
        } else {
            $j--;
        }
    }
    
    return $result;
}

// Example usage
$string1 = "ACDBE";
$string2 = "ABCDE";

echo "Longest Common Subsequence: " . calculateLCS($string1, $string2);

?>