<?php
/**
 * KMP (Knuth-Morris-Pratt) string matching algorithm implementation
 * 
 * This algorithm finds the occurrences of a pattern within a text.
 * It is more efficient than normal string searching algorithms because
 * it uses information from the pattern to avoid unnecessary comparisons.
 */
class KMPSearch {
    
    /**
     * Creates a prefix table for the pattern
     * 
     * @param string $pattern The pattern to search for
     * @return array Prefix table
     */
    private function createPrefixTable(string $pattern): array {
        $patternLength = strlen($pattern);
        $prefixTable = array_fill(0, $patternLength, 0);
        
        $j = 0;
        
        // Fill the prefix table for each character of the pattern
        for ($i = 1; $i < $patternLength; $i++) {
            // When mismatch occurs, backtrack
            while ($j > 0 && $pattern[$i] !== $pattern[$j]) {
                $j = $prefixTable[$j - 1];
            }
            
            // When match occurs, increase prefix length
            if ($pattern[$i] === $pattern[$j]) {
                $j++;
            }
            
            $prefixTable[$i] = $j;
        }
        
        return $prefixTable;
    }
    
    /**
     * Searches for a pattern in a text using the KMP algorithm
     * 
     * @param string $text The text to search in
     * @param string $pattern The pattern to search for
     * @return array Starting indices of matches
     */
    public function search(string $text, string $pattern): array {
        $textLength = strlen($text);
        $patternLength = strlen($pattern);
        $matches = [];
        
        // Check for empty pattern or text
        if ($patternLength === 0 || $textLength === 0 || $patternLength > $textLength) {
            return $matches;
        }
        
        // Create prefix table
        $prefixTable = $this->createPrefixTable($pattern);
        
        $j = 0; // Pattern index
        
        // Traverse through the text
        for ($i = 0; $i < $textLength; $i++) {
            // When mismatch occurs, backtrack
            while ($j > 0 && $text[$i] !== $pattern[$j]) {
                $j = $prefixTable[$j - 1];
            }
            
            // When match occurs, increase pattern index
            if ($text[$i] === $pattern[$j]) {
                $j++;
            }
            
            // When a complete match is found
            if ($j === $patternLength) {
                // Add the starting index of the match
                $matches[] = $i - $patternLength + 1;
                // Continue for overlapping matches
                $j = $prefixTable[$j - 1];
            }
        }
        
        return $matches;
    }
}

/**
 * Example usage of the KMP algorithm
 */
function exampleUsage() {
    $kmpSearch = new KMPSearch();
    
    // Test text and pattern
    $text = "Hello KMP, this is an example text. Hello everyone!";
    $pattern = "Hello";
    
    // Search for the pattern in the text
    $matches = $kmpSearch->search($text, $pattern);
    
    // Display results
    if (count($matches) > 0) {
        echo "The pattern '" . $pattern . "' was found in the text at the following positions:<br>";
        foreach ($matches as $position) {
            echo "- Index " . $position . "<br>";
        }
    } else {
        echo "The pattern '" . $pattern . "' was not found in the text.<br>";
    }
}

// Run the example usage
exampleUsage();
?>