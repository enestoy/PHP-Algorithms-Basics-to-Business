<?php
/* 
Interview Question:

Problem:
Given a text ($text) and a substring ($pattern), 
find how many times the substring occurs in the text and at which positions using the KMP algorithm.
*/


function KMPSearch($pattern, $text) {
    $n = strlen($text);
    $m = strlen($pattern);
    $positions = []; // To store matching positions

    // Create the prefix table (LPS)
    $lps = computeLPSArray($pattern);

    $i = 0; // Text index
    $j = 0; // Pattern index

    while ($i < $n) {
        if ($pattern[$j] == $text[$i]) {
            $i++;
            $j++;
        }

        // If the pattern is completely matched
        if ($j == $m) {
            $positions[] = $i - $j; // Store the matching position
            $j = $lps[$j - 1]; // Shift the pattern
        } elseif ($i < $n && $pattern[$j] != $text[$i]) {
            // If there is no match, use the LPS table to shift the pattern
            if ($j != 0) {
                $j = $lps[$j - 1];
            } else {
                $i++;
            }
        }
    }

    return $positions;
}

function computeLPSArray($pattern) {
    $m = strlen($pattern);
    $lps = array_fill(0, $m, 0); // Initialize LPS table with zeros
    $len = 0; // Length of the previous longest prefix/suffix
    $i = 1;

    while ($i < $m) {
        if ($pattern[$i] == $pattern[$len]) {
            $len++;
            $lps[$i] = $len;
            $i++;
        } else {
            if ($len != 0) {
                $len = $lps[$len - 1];
            } else {
                $lps[$i] = 0;
                $i++;
            }
        }
    }

    return $lps;
}

// Example usage
$text = "ABABDABACDABABCABAB";
$pattern = "ABABCABAB";
$positions = KMPSearch($pattern, $text);

echo "Pattern found at positions: " . implode(", ", $positions) . "\n";

?>
