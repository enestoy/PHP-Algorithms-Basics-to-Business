<?php
/* 
Interview Question:

Problem:
Given a text ($text) and a substring ($pattern), 
find how many times the substring occurs in the text and at which positions using the Rabin-Karp algorithm.
*/

function rabinKarp($text, $pattern) {
    $n = strlen($text);
    $m = strlen($pattern);
    $prime = 101; // Prime number for hash calculation
    $positions = []; // To store the matching positions

    // Calculate hash values for pattern and the first window of the text
    $patternHash = calculateHash($pattern, $prime);
    $textHash = calculateHash(substr($text, 0, $m), $prime);

    // Slide the window over the text
    for ($i = 0; $i <= $n - $m; $i++) {
        // If hash values match, compare the characters
        if ($patternHash == $textHash && substr($text, $i, $m) == $pattern) {
            $positions[] = $i; // Store the matching position
        }

        // Update hash value for the next window
        if ($i < $n - $m) {
            $textHash = recalculateHash($text, $i, $m, $textHash, $prime);
        }
    }

    return $positions;
}

function calculateHash($string, $prime) {
    $hash = 0;
    $length = strlen($string);
    for ($i = 0; $i < $length; $i++) {
        $hash = ($hash * 256 + ord($string[$i])) % $prime;
    }
    return $hash;
}

function recalculateHash($text, $oldIndex, $patternLength, $oldHash, $prime) {
    $newHash = ($oldHash - ord($text[$oldIndex]) * pow(256, $patternLength - 1)) % $prime;
    $newHash = ($newHash * 256 + ord($text[$oldIndex + $patternLength])) % $prime;
    return $newHash < 0 ? $newHash + $prime : $newHash;
}

// Example usage
$text = "ABCCDABECCAB";
$pattern = "AB";
$positions = rabinKarp($text, $pattern);

echo "Pattern found at positions: " . implode(", ", $positions) . "\n";

?>
