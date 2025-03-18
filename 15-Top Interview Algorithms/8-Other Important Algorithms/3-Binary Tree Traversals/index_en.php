<?php
/* 
Interview Question:

Let's consider a binary tree structure representing the employee hierarchy of a company. 
Each node represents an employee and contains the name of the employee. 
We need to list the employees using different traversal methods on this tree structure. 

For example:
- Inorder Traversal: This can be used to list employees in hierarchical order.

- Preorder Traversal: This can be used to list employees starting from the root.

- Postorder Traversal: This can be used to list employees starting from the lower levels.

Problem:
- Create a binary tree structure.

- Perform Inorder, Preorder, and Postorder traversal on this tree.

- List the names of employees for each traversal method.
*/

class TreeNode {
    public $value;
    public $left;
    public $right;

    public function __construct($value) {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}

class BinaryTree {
    private $root;

    public function __construct(TreeNode $root) {
        $this->root = $root;
    }

    /**
     * Inorder Traversal: Left → Root → Right
     *
     * @param TreeNode $node
     * @param array $result
     */
    public function inorderTraversal($node, &$result) {
        if ($node === null) {
            return;
        }
        $this->inorderTraversal($node->left, $result); // Left subtree
        $result[] = $node->value; // Root
        $this->inorderTraversal($node->right, $result); // Right subtree
    }

    /**
     * Preorder Traversal: Root → Left → Right
     *
     * @param TreeNode $node
     * @param array $result
     */
    public function preorderTraversal($node, &$result) {
        if ($node === null) {
            return;
        }
        $result[] = $node->value; // Root
        $this->preorderTraversal($node->left, $result); // Left subtree
        $this->preorderTraversal($node->right, $result); // Right subtree
    }

    /**
     * Postorder Traversal: Left → Right → Root
     *
     * @param TreeNode $node
     * @param array $result
     */
    public function postorderTraversal($node, &$result) {
        if ($node === null) {
            return;
        }
        $this->postorderTraversal($node->left, $result); // Left subtree
        $this->postorderTraversal($node->right, $result); // Right subtree
        $result[] = $node->value; // Root
    }

    /**
     * Returns traversal results.
     *
     * @param string $type Traversal type (inorder, preorder, postorder)
     * @return array
     */
    public function traverse($type) {
        $result = [];
        switch ($type) {
            case 'inorder':
                $this->inorderTraversal($this->root, $result);
                break;
            case 'preorder':
                $this->preorderTraversal($this->root, $result);
                break;
            case 'postorder':
                $this->postorderTraversal($this->root, $result);
                break;
            default:
                throw new Exception("Invalid traversal type.");
        }
        return $result;
    }
}

// Example Usage:
// Create the tree structure:
//        Ahmet
//       /     \
//    Mehmet   Fatma
//    /   \       \
// Ayşe  Ali     Zeynep

$root = new TreeNode("Ahmet");
$root->left = new TreeNode("Mehmet");
$root->right = new TreeNode("Fatma");
$root->left->left = new TreeNode("Ayşe");
$root->left->right = new TreeNode("Ali");
$root->right->right = new TreeNode("Zeynep");

$tree = new BinaryTree($root);

echo "Inorder Traversal:\n";
print_r($tree->traverse('inorder'));

echo "Preorder Traversal:\n";
print_r($tree->traverse('preorder'));

echo "Postorder Traversal:\n";
print_r($tree->traverse('postorder'));

?>
