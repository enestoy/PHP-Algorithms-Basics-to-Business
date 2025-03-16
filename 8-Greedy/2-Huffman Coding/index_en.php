<?php

/**
 * Huffman Node Class
 * Creates a node structure that contains a character and its frequency.
 */
class Node {
    public string $character;
    public int $frequency;
    public ?Node $left;
    public ?Node $right;
    
    public function __construct(string $character, int $frequency, ?Node $left = null, ?Node $right = null) {
        $this->character = $character;
        $this->frequency = $frequency;
        $this->left = $left;
        $this->right = $right;
    }
}

/**
 * Function to Build the Huffman Tree
 * @param array $frequencies - An array containing characters and their frequencies
 * @return Node - The root node of the Huffman tree
 */
function buildHuffmanTree(array $frequencies): Node {
    // Priority queue to sort the nodes by frequency
    $nodes = [];
    foreach ($frequencies as $character => $frequency) {
        $nodes[] = new Node($character, $frequency);
    }
    
    // Sort nodes from lowest to highest frequency
    usort($nodes, fn($a, $b) => $a->frequency <=> $b->frequency);
    
    while (count($nodes) > 1) {
        // Take the two nodes with the lowest frequency
        $left = array_shift($nodes);
        $right = array_shift($nodes);
        
        // Create a new internal node (without a character)
        $newNode = new Node("", $left->frequency + $right->frequency, $left, $right);
        
        // Add the new node to the queue
        $nodes[] = $newNode;
        
        // Re-sort the nodes by frequency
        usort($nodes, fn($a, $b) => $a->frequency <=> $b->frequency);
    }
    
    return $nodes[0]; // Return the root node
}

/**
 * Function to Generate Huffman Codes
 * @param Node $root - The root node of the Huffman tree
 * @param string $code - The generated code
 * @param array $codes - An array containing the character and its corresponding code
 */
function generateHuffmanCodes(Node $root, string $code = "", array &$codes = []) {
    if ($root->character !== "") {
        $codes[$root->character] = $code;
        return;
    }
    
    generateHuffmanCodes($root->left, $code . "0", $codes);
    generateHuffmanCodes($root->right, $code . "1", $codes);
}

// Example Usage
$text = "BABAABB";

// Calculate the frequencies of characters
$frequencies = array_count_values(str_split($text));

// Build the Huffman tree
$root = buildHuffmanTree($frequencies);

// Generate Huffman codes
$codes = [];
generateHuffmanCodes($root, "", $codes);

// Print the results
echo "Huffman Codes:<br>";
foreach ($codes as $character => $code) {
    echo "$character: $code<br>";
}

?>
