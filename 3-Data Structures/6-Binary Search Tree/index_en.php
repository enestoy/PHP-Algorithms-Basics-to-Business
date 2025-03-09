<?php

class Node
{
    public $value;
    public $left;
    public $right;

    public function __construct($value)
    {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}

class BinarySearchTree
{
    private $root;

    // Constructor
    public function __construct()
    {
        $this->root = null;
    }

    // Adds a new node to the tree
    public function add($value)
    {
        $newNode = new Node($value);
        if ($this->root === null) {
            $this->root = $newNode; // If the tree is empty, new node becomes the root
        } else {
            $this->root = $this->addNode($this->root, $newNode); // Place node at the correct position
        }
    }

    // Helper function to add a node
    private function addNode($currentNode, $newNode)
    {
        if ($newNode->value < $currentNode->value) {
            // Left subtree
            if ($currentNode->left === null) {
                $currentNode->left = $newNode;
            } else {
                $currentNode->left = $this->addNode($currentNode->left, $newNode);
            }
        } else {
            // Right subtree
            if ($currentNode->right === null) {
                $currentNode->right = $newNode;
            } else {
                $currentNode->right = $this->addNode($currentNode->right, $newNode);
            }
        }

        return $currentNode;
    }

    // Search for a node
    public function search($value)
    {
        return $this->searchNode($this->root, $value);
    }

    // Helper function to search for a node
    private function searchNode($currentNode, $value)
    {
        if ($currentNode === null || $currentNode->value === $value) {
            return $currentNode; // Node found
        }

        if ($value < $currentNode->value) {
            // Search in the left subtree
            return $this->searchNode($currentNode->left, $value);
        } else {
            // Search in the right subtree
            return $this->searchNode($currentNode->right, $value);
        }
    }

    // Delete a node
    public function delete($value)
    {
        $this->root = $this->deleteNode($this->root, $value);
    }

    // Helper function to delete a node
    private function deleteNode($currentNode, $value)
    {
        if ($currentNode === null) {
            return null; // If node is not found, return null
        }

        if ($value < $currentNode->value) {
            // Search in the left subtree
            $currentNode->left = $this->deleteNode($currentNode->left, $value);
        } elseif ($value > $currentNode->value) {
            // Search in the right subtree
            $currentNode->right = $this->deleteNode($currentNode->right, $value);
        } else {
            // Node found
            if ($currentNode->left === null) {
                return $currentNode->right; // Right child takes its place
            } elseif ($currentNode->right === null) {
                return $currentNode->left; // Left child takes its place
            }

            // If the node has two children, get the smallest node from the right subtree
            $minNode = $this->minNode($currentNode->right);
            $currentNode->value = $minNode->value;
            $currentNode->right = $this->deleteNode($currentNode->right, $minNode->value);
        }

        return $currentNode;
    }

    // Find the minimum node in the right subtree
    private function minNode($node)
    {
        while ($node->left !== null) {
            $node = $node->left;
        }
        return $node;
    }

    // Print the tree in inorder traversal
    public function inorderTraversal()
    {
        $this->inorderNode($this->root);
    }

    // Helper function for inorder traversal
    private function inorderNode($currentNode)
    {
        if ($currentNode !== null) {
            $this->inorderNode($currentNode->left);
            echo $currentNode->value . " ";
            $this->inorderNode($currentNode->right);
        }
    }
}

// Example usage
$binarySearchTree = new BinarySearchTree();
$binarySearchTree->add(50);
$binarySearchTree->add(30);
$binarySearchTree->add(70);
$binarySearchTree->add(20);
$binarySearchTree->add(40);
$binarySearchTree->add(60);
$binarySearchTree->add(80);

// Print the tree in inorder traversal
echo "Inorder Traversal: ";
$binarySearchTree->inorderTraversal(); // 20 30 40 50 60 70 80

// Search for a key
echo "\n60 is " . ($binarySearchTree->search(60) ? "found" : "not found") . ".<br><br>"; // Found

// Delete a key
$binarySearchTree->delete(70);
echo "70 deleted, Inorder Traversal: ";
$binarySearchTree->inorderTraversal(); // 20 30 40 50 60 80

?>
