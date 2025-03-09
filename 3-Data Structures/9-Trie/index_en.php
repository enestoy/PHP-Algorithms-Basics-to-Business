<?php

// Class representing a Trie Node
class TrieNode
{
    public $children = []; // Array to hold child nodes
    public $isEndOfWord = false; // Indicates if this node is the end of a word

    public function __construct()
    {
        // Initially, children are set to an empty array, and isEndOfWord is false
        $this->children = [];
        $this->isEndOfWord = false;
    }
}

// Class representing the Trie data structure
class Trie
{
    private $root; // Root node of the Trie

    public function __construct()
    {
        // When a Trie is created, initialize the root node
        $this->root = new TrieNode();
    }

    // Adds a new word to the Trie
    public function insertWord($word)
    {
        $currentNode = $this->root; // Start from the root node

        // Loop through each character of the word and create or use existing nodes
        for ($i = 0; $i < strlen($word); $i++) {
            $character = $word[$i];

            // If no node exists for the character, create a new node
            if (!isset($currentNode->children[$character])) {
                $currentNode->children[$character] = new TrieNode();
            }

            // Move to the current character's node
            $currentNode = $currentNode->children[$character];
        }

        // Mark the end of the word
        $currentNode->isEndOfWord = true;
    }

    // Checks if a word exists in the Trie
    public function searchWord($word)
    {
        $currentNode = $this->root; // Start from the root node

        // Loop through each character of the word and check if the corresponding node exists
        for ($i = 0; $i < strlen($word); $i++) {
            $character = $word[$i];

            // If the node for the character does not exist, the word is not in the Trie
            if (!isset($currentNode->children[$character])) {
                return false;
            }

            // Move to the current character's node
            $currentNode = $currentNode->children[$character];
        }

        // If the node at the end of the word marks the end of a word, return true
        return $currentNode->isEndOfWord;
    }

    // Finds all words that start with a given prefix
    public function findWordsStartingWith($prefix)
    {
        $currentNode = $this->root; // Start from the root node
        $result = []; // Array to hold found words

        // Traverse through the prefix and check if each character has a corresponding node
        for ($i = 0; $i < strlen($prefix); $i++) {
            $character = $prefix[$i];

            // If no node exists for the character, no words with this prefix exist
            if (!isset($currentNode->children[$character])) {
                return $result;
            }

            // Move to the current character's node
            $currentNode = $currentNode->children[$character];
        }

        // Find all words that start with the given prefix
        $this->findAllWords($currentNode, $prefix, $result);

        return $result;
    }

    // Helper function to find all words starting from a given node
    private function findAllWords($node, $prefix, &$result)
    {
        // If the current node marks the end of a word, add it to the result
        if ($node->isEndOfWord) {
            $result[] = $prefix;
        }

        // Traverse through all child nodes
        foreach ($node->children as $character => $childNode) {
            $this->findAllWords($childNode, $prefix . $character, $result);
        }
    }
}

// Example Usage
$trie = new Trie();

// Insert words into the Trie
$trie->insertWord("apple");
$trie->insertWord("app");
$trie->insertWord("banana");
$trie->insertWord("bat");

// Word search examples
echo "'apple' is in the Trie? " . ($trie->searchWord("apple") ? "Yes" : "No") . "<br>"; // Yes
echo "'app' is in the Trie? " . ($trie->searchWord("app") ? "Yes" : "No") . "<br>"; // Yes
echo "'appl' is in the Trie? " . ($trie->searchWord("appl") ? "Yes" : "No") . "<br>"; // No

// Prefix search examples
echo "Words starting with 'app': " . implode(", ", $trie->findWordsStartingWith("app")) . "<br>"; // apple, app
echo "Words starting with 'ba': " . implode(", ", $trie->findWordsStartingWith("ba")) . "<br>"; // banana, bat
?>
