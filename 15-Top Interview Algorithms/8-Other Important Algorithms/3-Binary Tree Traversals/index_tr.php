<?php
/* 
Mülakat Sorusu:

Bir şirketin çalışan hiyerarşisini temsil eden bir binary tree yapısı düşünelim. 
Her düğüm, bir çalışanı temsil eder ve çalışanın adını içerir. 
Bu ağaç yapısı üzerinde farklı traversal yöntemlerini kullanarak çalışanları listelememiz gerekiyor. 

Örneğin:
- Inorder Traversal: Çalışanları hiyerarşik sırayla listelemek için kullanılabilir.

- Preorder Traversal: Çalışanları kökten başlayarak listelemek için kullanılabilir.

- Postorder Traversal: Çalışanları alt düzeyden başlayarak listelemek için kullanılabilir.

Problem:
- Bir binary tree yapısı oluşturun.

- Bu ağaç üzerinde Inorder, Preorder ve Postorder traversal işlemlerini gerçekleştirin.

- Her bir traversal yöntemi için çalışanların adlarını listeleyin.
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
     * Inorder Traversal: Sol → Kök → Sağ
     *
     * @param TreeNode $node
     * @param array $result
     */
    public function inorderTraversal($node, &$result) {
        if ($node === null) {
            return;
        }
        $this->inorderTraversal($node->left, $result); // Sol alt ağaç
        $result[] = $node->value; // Kök
        $this->inorderTraversal($node->right, $result); // Sağ alt ağaç
    }

    /**
     * Preorder Traversal: Kök → Sol → Sağ
     *
     * @param TreeNode $node
     * @param array $result
     */
    public function preorderTraversal($node, &$result) {
        if ($node === null) {
            return;
        }
        $result[] = $node->value; // Kök
        $this->preorderTraversal($node->left, $result); // Sol alt ağaç
        $this->preorderTraversal($node->right, $result); // Sağ alt ağaç
    }

    /**
     * Postorder Traversal: Sol → Sağ → Kök
     *
     * @param TreeNode $node
     * @param array $result
     */
    public function postorderTraversal($node, &$result) {
        if ($node === null) {
            return;
        }
        $this->postorderTraversal($node->left, $result); // Sol alt ağaç
        $this->postorderTraversal($node->right, $result); // Sağ alt ağaç
        $result[] = $node->value; // Kök
    }

    /**
     * Traversal sonuçlarını döndürür.
     *
     * @param string $type Traversal türü (inorder, preorder, postorder)
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
                throw new Exception("Geçersiz traversal türü.");
        }
        return $result;
    }
}

// Örnek Kullanım:
// Ağaç yapısını oluştur:
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