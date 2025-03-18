<?php
/* 
Mülakat Sorusu:

Problem:
Bir metin verildiğinde, bu metindeki karakterlerin frekanslarını kullanarak Huffman Coding algoritmasıyla her bir karakter için bir ikili kod oluşturun. 
Ardından, bu kodları kullanarak metni sıkıştırın.
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
    // Öncelik kuyruğu (min-heap) oluştur
    $heap = new SplMinHeap();
    foreach ($frequencies as $char => $freq) {
        $heap->insert(new HuffmanNode($char, $freq));
    }

    // Huffman ağacını oluştur
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

    // Yaprak düğümse, karakterin kodunu kaydet
    if ($node->char !== null) {
        $codes[$node->char] = $code;
        return;
    }

    // Sol ve sağ alt ağaçları dolaş
    buildHuffmanCodes($node->left, $code . '0', $codes);
    buildHuffmanCodes($node->right, $code . '1', $codes);
}

function huffmanEncode($text) {
    // Karakter frekanslarını hesapla
    $frequencies = array_count_values(str_split($text));

    // Huffman ağacını oluştur
    $huffmanTree = buildHuffmanTree($frequencies);

    // Huffman kodlarını oluştur
    $huffmanCodes = [];
    buildHuffmanCodes($huffmanTree, '', $huffmanCodes);

    // Metni Huffman kodlarıyla sıkıştır
    $encodedText = '';
    foreach (str_split($text) as $char) {
        $encodedText .= $huffmanCodes[$char];
    }

    return [
        'codes' => $huffmanCodes,
        'encodedText' => $encodedText,
    ];
}

// Örnek kullanım
$text = "hello world";
$result = huffmanEncode($text);

echo "Huffman Codes:\n";
foreach ($result['codes'] as $char => $code) {
    echo "$char: $code\n";
}

echo "Encoded Text: " . $result['encodedText'] . "\n";

?>