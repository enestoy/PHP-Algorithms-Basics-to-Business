<?php

// Node class: Represents each node in the tree.
class Node
{
    public $data;          // The data stored in the node
    public $color;         // The color of the node (true: Red, false: Black)
    public $leftChild;     // Left child node
    public $rightChild;    // Right child node
    public $parent;        // Parent node

    // Constructor method: Creates a new node.
    public function __construct($data, $color = true)
    {
        $this->data = $data;
        $this->color = $color; // Default color is red
        $this->leftChild = null;
        $this->rightChild = null;
        $this->parent = null;
    }
}

// Red-Black Tree class: Manages the tree's main operations.
class RedBlackTree
{
    private $root;   // Root node of the tree
    private $NIL;    // NIL node (represents the leaf nodes)

    // Constructor method: Initializes the tree and creates the NIL node.
    public function __construct()
    {
        $this->NIL = new Node(0, false); // NIL node is black
        $this->root = $this->NIL; // Initially, the root is NIL
    }

    // Adds a new node to the tree.
    public function insert($data)
    {
        $newNode = new Node($data); // Create a new node
        $newNode->leftChild = $this->NIL; // Set left child as NIL
        $newNode->rightChild = $this->NIL; // Set right child as NIL

        $this->insertNode($newNode); // Add the node to the tree
        $this->balanceAfterInsert($newNode); // Keep the tree balanced
    }

    // Insert the node into the tree.
    private function insertNode($newNode)
    {
        $temporaryNode = null; // Temporary node used to find the parent
        $currentNode = $this->root; // Start from the root

        // Find the correct position in the tree
        while ($currentNode !== $this->NIL) {
            $temporaryNode = $currentNode;
            if ($newNode->data < $currentNode->data) {
                $currentNode = $currentNode->leftChild; // Move to the left
            } else {
                $currentNode = $currentNode->rightChild; // Move to the right
            }
        }

        $newNode->parent = $temporaryNode; // Set the parent

        // If the tree is empty, make the new node the root
        if ($temporaryNode === null) {
            $this->root = $newNode;
        } elseif ($newNode->data < $temporaryNode->data) {
            $temporaryNode->leftChild = $newNode; // Insert as the left child
        } else {
            $temporaryNode->rightChild = $newNode; // Insert as the right child
        }
    }

    // Balances the tree after insertion.
    private function balanceAfterInsert($node)
    {
        // Balance the tree while the parent is red
        while ($node->parent !== null && $node->parent->color === true) {
            // If the parent is the left child
            if ($node->parent === $node->parent->parent->leftChild) {
                $uncle = $node->parent->parent->rightChild; // Uncle node

                // If the uncle is red, change colors
                if ($uncle->color === true) {
                    $node->parent->color = false; // Make the parent black
                    $uncle->color = false; // Make the uncle black
                    $node->parent->parent->color = true; // Make the grandparent red
                    $node = $node->parent->parent; // Check the grandparent
                } else {
                    // If the node is the right child, rotate left
                    if ($node === $node->parent->rightChild) {
                        $node = $node->parent;
                        $this->rotateLeft($node);
                    }

                    // Change colors and rotate right
                    $node->parent->color = false;
                    $node->parent->parent->color = true;
                    $this->rotateRight($node->parent->parent);
                }
            } else {
                // If the parent is the right child
                $uncle = $node->parent->parent->leftChild; // Uncle node

                // If the uncle is red, change colors
                if ($uncle->color === true) {
                    $node->parent->color = false;
                    $uncle->color = false;
                    $node->parent->parent->color = true;
                    $node = $node->parent->parent;
                } else {
                    // If the node is the left child, rotate right
                    if ($node === $node->parent->leftChild) {
                        $node = $node->parent;
                        $this->rotateRight($node);
                    }

                    // Change colors and rotate left
                    $node->parent->color = false;
                    $node->parent->parent->color = true;
                    $this->rotateLeft($node->parent->parent);
                }
            }
        }

        // Always make the root black
        $this->root->color = false;
    }

    // Left rotation operation
    private function rotateLeft($node)
    {
        $rightChild = $node->rightChild;
        $node->rightChild = $rightChild->leftChild;

        if ($rightChild->leftChild !== $this->NIL) {
            $rightChild->leftChild->parent = $node;
        }

        $rightChild->parent = $node->parent;

        if ($node->parent === null) {
            $this->root = $rightChild;
        } elseif ($node === $node->parent->leftChild) {
            $node->parent->leftChild = $rightChild;
        } else {
            $node->parent->rightChild = $rightChild;
        }

        $rightChild->leftChild = $node;
        $node->parent = $rightChild;
    }

    // Right rotation operation
    private function rotateRight($node)
    {
        $leftChild = $node->leftChild;
        $node->leftChild = $leftChild->rightChild;

        if ($leftChild->rightChild !== $this->NIL) {
            $leftChild->rightChild->parent = $node;
        }

        $leftChild->parent = $node->parent;

        if ($node->parent === null) {
            $this->root = $leftChild;
        } elseif ($node === $node->parent->rightChild) {
            $node->parent->rightChild = $leftChild;
        } else {
            $node->parent->leftChild = $leftChild;
        }

        $leftChild->rightChild = $node;
        $node->parent = $leftChild;
    }

    // Displays the tree
    public function displayTree()
    {
        $this->displayTreeRecursive($this->root);
    }

    // Recursively traverses and prints the tree nodes
    private function displayTreeRecursive($node)
    {
        if ($node !== $this->NIL) {
            $this->displayTreeRecursive($node->leftChild);
            echo $node->data . " (" . ($node->color ? "Red" : "Black") . ")\n";
            $this->displayTreeRecursive($node->rightChild);
        }
    }
}

// Example Usage
$rbTree = new RedBlackTree();
$rbTree->insert(10);
$rbTree->insert(20);
$rbTree->insert(30);
$rbTree->insert(15);
$rbTree->insert(25);

echo "Red-Black Tree Contents:\n";
$rbTree->displayTree();
?>
