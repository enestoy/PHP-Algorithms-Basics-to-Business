<?php

// Node class
class Node
{
    public $value;
    public $left;
    public $right;
    public $height;

    // Constructor to initialize the node
    public function __construct($value)
    {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
        $this->height = 1;
    }
}

// AVL Tree class
class AvlTree
{
    private $root;

    public function __construct()
    {
        $this->root = null;
    }

    // Function to insert a new node into the tree
    public function insert($value)
    {
        $this->root = $this->insertNode($this->root, $value);
    }

    // Helper function to insert a node
    private function insertNode($node, $value)
    {
        if ($node === null) {
            return new Node($value);
        }

        // Insert the value into the correct position
        if ($value < $node->value) {
            $node->left = $this->insertNode($node->left, $value);
        } else {
            $node->right = $this->insertNode($node->right, $value);
        }

        // Update the height of the current node
        $node->height = 1 + max($this->getHeight($node->left), $this->getHeight($node->right));

        // Check balance and perform rotation if necessary
        return $this->balance($node, $value);
    }

    // Function to get the height of a node
    private function getHeight($node)
    {
        if ($node === null) {
            return 0;
        }
        return $node->height;
    }

    // Function to calculate the balance factor of a node
    private function balanceFactor($node)
    {
        if ($node === null) {
            return 0;
        }
        return $this->getHeight($node->left) - $this->getHeight($node->right);
    }

    // Function to balance the tree (rotations)
    private function balance($node, $value)
    {
        $balanceFactor = $this->balanceFactor($node);

        // Left-Left case - right rotation
        if ($balanceFactor > 1 && $value < $node->left->value) {
            return $this->rightRotate($node);
        }

        // Right-Right case - left rotation
        if ($balanceFactor < -1 && $value > $node->right->value) {
            return $this->leftRotate($node);
        }

        // Left-Right case - left rotation followed by right rotation
        if ($balanceFactor > 1 && $value > $node->left->value) {
            $node->left = $this->leftRotate($node->left);
            return $this->rightRotate($node);
        }

        // Right-Left case - right rotation followed by left rotation
        if ($balanceFactor < -1 && $value < $node->right->value) {
            $node->right = $this->rightRotate($node->right);
            return $this->leftRotate($node);
        }

        return $node;
    }

    // Right rotation
    private function rightRotate($node)
    {
        $leftSubtree = $node->left;
        $node->left = $leftSubtree->right;
        $leftSubtree->right = $node;

        // Update heights
        $node->height = 1 + max($this->getHeight($node->left), $this->getHeight($node->right));
        $leftSubtree->height = 1 + max($this->getHeight($leftSubtree->left), $this->getHeight($leftSubtree->right));

        return $leftSubtree;
    }

    // Left rotation
    private function leftRotate($node)
    {
        $rightSubtree = $node->right;
        $node->right = $rightSubtree->left;
        $rightSubtree->left = $node;

        // Update heights
        $node->height = 1 + max($this->getHeight($node->left), $this->getHeight($node->right));
        $rightSubtree->height = 1 + max($this->getHeight($rightSubtree->left), $this->getHeight($rightSubtree->right));

        return $rightSubtree;
    }

    // Inorder traversal
    public function inorderTraversal()
    {
        return $this->inorderNode($this->root);
    }

    // Helper function for inorder traversal (returns an array)
    private function inorderNode($node)
    {
        // If the node is null, return an empty array
        if ($node === null) {
            return [];
        }

        // Left subtree
        $values = $this->inorderNode($node->left);

        // Root node
        $values[] = $node->value;

        // Right subtree
        $values = array_merge($values, $this->inorderNode($node->right));

        return $values;
    }
    
}

// Example usage
$avlTree = new AvlTree();
$avlTree->insert(10);
$avlTree->insert(20);
$avlTree->insert(30);
$avlTree->insert(40);
$avlTree->insert(50);
$avlTree->insert(25);

// Print the inorder traversal of the tree
echo "Inorder Traversal: ";
echo implode(", ", $avlTree->inorderTraversal()); // 10, 20, 25, 30, 40, 50
?>
