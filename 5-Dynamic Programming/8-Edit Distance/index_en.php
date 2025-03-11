<?php

// Function to calculate Edit Distance
function editDistance($word1, $word2) {
    // Get the lengths of the words
    $length1 = strlen($word1);
    $length2 = strlen($word2);

    // Create the DP matrix for dynamic programming
    $dp = array();

    // Initialize the DP matrix
    for ($i = 0; $i <= $length1; $i++) {
        for ($j = 0; $j <= $length2; $j++) {
            if ($i == 0) {
                // If the first word is empty, perform insertions equal to the length of the second word
                $dp[$i][$j] = $j;
            } elseif ($j == 0) {
                // If the second word is empty, perform deletions equal to the length of the first word
                $dp[$i][$j] = $i;
            } elseif ($word1[$i - 1] == $word2[$j - 1]) {
                // If the characters match, no operation is needed, take the value from the previous state
                $dp[$i][$j] = $dp[$i - 1][$j - 1];
            } else {
                // If the characters differ, take the minimum of insert, delete, or replace operations
                $dp[$i][$j] = min(
                    $dp[$i - 1][$j] + 1,   // Deletion
                    $dp[$i][$j - 1] + 1,   // Insertion
                    $dp[$i - 1][$j - 1] + 1 // Replacement
                );
            }
        }
    }

    // The result is found in the bottom-right corner of the DP matrix
    return $dp[$length1][$length2];
}

// Example words
$word1 = "kitten";
$word2 = "sitting";

// Calculate the edit distance
$distance = editDistance($word1, $word2);

// Print the result
echo "Edit distance: " . $distance;

?>