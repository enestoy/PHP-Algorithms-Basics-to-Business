<?php

// Z-Algorithm function
function zAlgorithm($text) {
    // Get the length of the text
    $textLength = strlen($text);
    
    // Create the Z-array (initially all elements are 0)
    $zArray = array_fill(0, $textLength, 0);
    
    // Z[0] is always the length of the text
    $zArray[0] = $textLength;
    
    // Initialize two pointers (window)
    $left = 0;
    $right = 0;
    
    // Calculate the Z-array
    for ($i = 1; $i < $textLength; $i++) {
        // If the current index is outside the right boundary
        if ($i > $right) {
            $left = $right = $i;
            // Start character comparison
            while ($right < $textLength && $text[$right] == $text[$right - $left]) {
                $right++;
            }
            // Update the Z-array
            $zArray[$i] = $right - $left;
            $right--;
        } else {
            // Use the values in Z[left..right] range for the current index
            $k = $i - $left;
            // If the comparison does not go beyond the right boundary
            if ($zArray[$k] < $right - $i + 1) {
                $zArray[$i] = $zArray[$k];
            } else {
                // Start a new comparison
                $left = $i;
                while ($right < $textLength && $text[$right] == $text[$right - $left]) {
                    $right++;
                }
                // Update the Z-array
                $zArray[$i] = $right - $left;
                $right--;
            }
        }
    }
    
    return $zArray;
}

// Example usage
$text = "abacabadabacaba";  // Text to search
$zArray = zAlgorithm($text);

// Print the result
echo "Z-array: ";
print_r($zArray);

?>
