<?php

/**
 * Rabin-Karp string matching algorithm implementation
 * 
 * This algorithm finds the occurrences of a pattern within a text using hash values.
 * By using hash values, it minimizes character-by-character comparisons.
 */
class RabinKarpSearch {
    
    /**
     * Prime number used for hash calculation
     * @var int
     */
    private $primeNumber = 101;
    
    /**
     * Character set size (256 for ASCII)
     * @var int
     */
    private $charSetSize = 256;
    
    /**
     * Calculates hash value for a string
     * 
     * @param string $text Text to calculate hash value for
     * @param int $length Length of the text
     * @return int Hash value
     */
    private function calculateHash(string $text, int $length): int {
        $hash = 0;
        
        // Calculate hash value for the first 'length' characters
        for ($i = 0; $i < $length; $i++) {
            $hash = ($this->charSetSize * $hash + ord($text[$i])) % $this->primeNumber;
        }
        
        return $hash;
    }
    
    /**
     * Updates hash value for sliding window
     * 
     * @param int $oldHash Previous hash value
     * @param string $text Text
     * @param int $oldIndex Index of character to be removed
     * @param int $newIndex Index of character to be added
     * @param int $patternLength Pattern length
     * @return int New hash value
     */
    private function updateHash(int $oldHash, string $text, int $oldIndex, int $newIndex, int $patternLength): int {
        $newHash = $oldHash;
        
        // Remove the character to be excluded from hash
        $newHash = ($newHash - ord($text[$oldIndex]) * $this->pow($this->charSetSize, $patternLength - 1)) % $this->primeNumber;
        if ($newHash < 0) {
            $newHash += $this->primeNumber;
        }
        
        // Add new character to the hash
        $newHash = ($newHash * $this->charSetSize + ord($text[$newIndex])) % $this->primeNumber;
        
        return $newHash;
    }
    
    /**
     * Modular exponentiation
     * 
     * @param int $base Base value
     * @param int $exponent Exponent value
     * @return int Result
     */
    private function pow(int $base, int $exponent): int {
        $result = 1;
        $base = $base % $this->primeNumber;
        
        while ($exponent > 0) {
            // If exponent is odd, multiply base with result
            if ($exponent % 2 == 1) {
                $result = ($result * $base) % $this->primeNumber;
            }
            
            // Exponent is halved
            $exponent = $exponent >> 1;
            // Square the base
            $base = ($base * $base) % $this->primeNumber;
        }
        
        return $result;
    }
    
    /**
     * Searches for a pattern in text using the Rabin-Karp algorithm
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
        
        // Calculate pattern hash value
        $patternHash = $this->calculateHash($pattern, $patternLength);
        
        // Calculate hash value for first 'patternLength' characters of text
        $textHash = $this->calculateHash($text, $patternLength);
        
        // Search using sliding window through the text
        for ($i = 0; $i <= $textLength - $patternLength; $i++) {
            // If hash values match, check character by character
            if ($textHash === $patternHash) {
                $matches = true;
                
                // Compare characters
                for ($j = 0; $j < $patternLength; $j++) {
                    if ($text[$i + $j] !== $pattern[$j]) {
                        $matches = false;
                        break;
                    }
                }
                
                // When a complete match is found
                if ($matches) {
                    $matches[] = $i;
                }
            }
            
            // Update hash value for next window
            if ($i < $textLength - $patternLength) {
                $textHash = $this->updateHash(
                    $textHash,
                    $text,
                    $i,
                    $i + $patternLength,
                    $patternLength
                );
            }
        }
        
        return $matches;
    }
}

/**
 * Example usage of the Rabin-Karp algorithm
 */
function exampleUsage() {
    $rabinKarpSearch = new RabinKarpSearch();
    
    // Test text and pattern
    $text = "Example implementation of the Rabin-Karp algorithm for algorithm analysis class. Rabin-Karp is a very efficient algorithm.";
    $pattern = "Rabin-Karp";
    
    // Search for the pattern in the text
    $matches = $rabinKarpSearch->search($text, $pattern);
    
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