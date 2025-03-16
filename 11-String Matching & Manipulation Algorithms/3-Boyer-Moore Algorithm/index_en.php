<?php

/**
 * Boyer-Moore string matching algorithm implementation
 * 
 * This algorithm finds the occurrences of a pattern within a text.
 * Boyer-Moore increases efficiency by comparing from the end of the pattern toward the beginning
 * and by using bad character and good suffix rules.
 */
class BoyerMooreSearch {
    
    /**
     * Creates bad character table
     * 
     * @param string $pattern Pattern to search for
     * @return array Bad character table
     */
    private function createBadCharTable(string $pattern): array {
        $charSetSize = 256; // ASCII
        $patternLength = strlen($pattern);
        
        // Set default value as pattern length for all characters
        $badChar = array_fill(0, $charSetSize, $patternLength);
        
        // Record the last position of each character in the pattern
        for ($i = 0; $i < $patternLength - 1; $i++) {
            $badChar[ord($pattern[$i])] = $patternLength - 1 - $i;
        }
        
        return $badChar;
    }
    
    /**
     * Creates good suffix table
     * 
     * @param string $pattern Pattern to search for
     * @return array Good suffix table
     */
    private function createGoodSuffixTable(string $pattern): array {
        $patternLength = strlen($pattern);
        $goodSuffix = array_fill(0, $patternLength, 0);
        $suffix = array_fill(0, $patternLength, 0);
        
        // Case 1: Calculate length of the last matching suffix
        $suffix[$patternLength - 1] = $patternLength;
        
        for ($i = $patternLength - 2; $i >= 0; $i--) {
            $j = $i;
            
            // Find matching characters from right to left
            while ($j >= 0 && $pattern[$j] === $pattern[$patternLength - 1 - $i + $j]) {
                $j--;
            }
            
            $suffix[$i] = $i - $j;
        }
        
        // Case 2: Calculate good suffix table
        for ($i = 0; $i < $patternLength; $i++) {
            $goodSuffix[$i] = $patternLength;
        }
        
        $j = 0;
        for ($i = $patternLength - 1; $i >= 0; $i--) {
            if ($suffix[$i] === $i + 1) {
                while ($j < $patternLength - 1 - $i) {
                    if ($goodSuffix[$j] === $patternLength) {
                        $goodSuffix[$j] = $patternLength - 1 - $i;
                    }
                    $j++;
                }
            }
        }
        
        for ($i = 0; $i < $patternLength - 1; $i++) {
            $goodSuffix[$patternLength - 1 - $suffix[$i]] = $patternLength - 1 - $i;
        }
        
        return $goodSuffix;
    }
    
    /**
     * Searches for a pattern in a text using the Boyer-Moore algorithm
     * 
     * @param string $text Text to search in
     * @param string $pattern Pattern to search for
     * @return array Starting indices of matches
     */
    public function search(string $text, string $pattern): array {
        $matches = [];
        $textLength = strlen($text);
        $patternLength = strlen($pattern);
        
        // Check for empty pattern or text
        if ($patternLength === 0 || $textLength === 0 || $patternLength > $textLength) {
            return $matches;
        }
        
        // Create bad character and good suffix tables
        $badChar = $this->createBadCharTable($pattern);
        $goodSuffix = $this->createGoodSuffixTable($pattern);
        
        $index = 0;
        
        // Search by sliding the pattern over the text
        while ($index <= $textLength - $patternLength) {
            $j = $patternLength - 1;
            
            // Compare pattern characters from right to left
            while ($j >= 0 && $pattern[$j] === $text[$index + $j]) {
                $j--;
            }
            
            // If pattern is found
            if ($j < 0) {
                $matches[] = $index;
                // Shift according to good suffix rule
                $index += $goodSuffix[0];
            } else {
                // Calculate maximum shift amount
                $badCharShift = $badChar[ord($text[$index + $j])] ?? $patternLength;
                $goodSuffixShift = $goodSuffix[$j];
                
                // Shift by the larger of the two values
                $index += max($badCharShift, $goodSuffixShift);
            }
        }
        
        return $matches;
    }
}

/**
 * Example usage of the Boyer-Moore algorithm
 */
function exampleUsage() {
    $boyerMooreSearch = new BoyerMooreSearch();
    
    // Test text and pattern
    $text = "The Boyer-Moore algorithm is an efficient algorithm developed for pattern searching in text. The characteristic of Boyer-Moore is that it compares starting from the end of the pattern.";
    $pattern = "Boyer-Moore";
    
    // Search for the pattern in the text
    $matches = $boyerMooreSearch->search($text, $pattern);
    
    // Display results
    if (count($matches) > 0) {
        echo "The pattern '" . $pattern . "' was found in the text at the following positions:\n";
        foreach ($matches as $position) {
            echo "- Index " . $position . "\n";
        }
    } else {
        echo "The pattern '" . $pattern . "' was not found in the text.\n";
    }
}

// Run the example usage
exampleUsage();
?>