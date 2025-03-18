<?php
/* 
Interview Question:

Problem:
Given a text, create a binary code for each character using the frequencies of the characters and the Huffman Coding algorithm. 
Then, compress the text using these codes.
*/

class HuffmanNode {
    public $char;
    public $freq;
    public $left;
    public $right;

    public function __construct($char, $freq) {
        $this->char = $char;
        $this->freq = $freq;
        $this->left = null;
        $this->right = null;
    }
}

function buildHuffmanTree($frequencies) {
    // Create a priority queue (min-heap)
    $heap = new SplMinHeap();
    foreach ($frequencies as $char => $freq) {
        $heap->insert(new HuffmanNode($char, $freq));
    }

    // Build the Huffman tree
    while ($heap->count() > 1) {
        $left = $heap->extract();
        $right = $heap->extract();
        $merged = new HuffmanNode(null, $left->freq + $right->freq);
        $merged->left = $left;
        $merged->right = $right;
        $heap->insert($merged);
    }

    return $heap->extract();
}

function buildHuffmanCodes($node, $code = '', &$codes = []) {
    if ($node === null) return;

    // If it's a leaf node, save the character's code
    if ($node->char !== null) {
        $codes[$node->char] = $code;
        return;
    }

    // Traverse left and right subtrees
    buildHuffmanCodes($node->left, $code . '0', $codes);
    buildHuffmanCodes($node->right, $code . '1', $codes);
}

function huffmanEncode($text) {
    // Calculate character frequencies
    $frequencies = array_count_values(str_split($text));

    // Build the Huffman tree
    $huffmanTree = buildHuffmanTree($frequencies);

    // Build the Huffman codes
    $huffmanCodes = [];
    buildHuffmanCodes($huffmanTree, '', $huffmanCodes);

    // Compress the text with Huffman codes
    $encodedText = '';
    foreach (str_split($text) as $char) {
        $encodedText .= $huffmanCodes[$char];
    }

    return [
        'codes' => $huffmanCodes,
        'encodedText' => $encodedText,
    ];
}

// Example usage
$text = "hello world";
$result = huffmanEncode($text);

echo "Huffman Codes:\n";
foreach ($result['codes'] as $char => $code) {
    echo "$char: $code\n";
}

echo "Encoded Text: " . $result['encodedText'] . "\n";

?>
