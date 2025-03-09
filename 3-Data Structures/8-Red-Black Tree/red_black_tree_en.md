# Red-Black Tree Algorithm

A Red-Black Tree is a data structure based on binary search trees (BST). This tree structure is designed to overcome the disadvantages of a basic binary search tree and provide a more balanced structure. The Red-Black Tree performs insertion, deletion, and search operations with O(log n) time complexity.

## Basic Properties

1. **Node Colors**: Each node is either red or black. These colors are used to maintain the balance of the tree.

2. **Root Node**: The root node is always black.

3. **Leaf Nodes (NIL)**: Leaf nodes (NIL nodes) are considered black. These nodes represent the ends of the tree and do not contain any data.

4. **Red Node Rule**: A red node's children must always be black. In other words, two red nodes cannot appear consecutively.

5. **Black Height**: All paths from any node to the leaf nodes (NIL) must have the same number of black nodes. This ensures the tree remains balanced.

## Insertion Operation

When a new node is added to a Red-Black Tree, the node is initially inserted as red. However, this insertion may violate the Red-Black Tree properties. In this case, **rotation** and **color changing** operations are performed to rebalance the tree.

1. **Standard Binary Search Tree Insertion**: The new node is inserted following the standard binary search tree rules.

2. **Color Adjustment**: If the parent of the inserted node is red, it may violate the Red-Black Tree properties. In this case, the tree is rebalanced using rotation and color changing operations.

## Deletion Operation

When a node is deleted from a Red-Black Tree, rotation and color changing operations are performed to ensure the tree remains balanced. The deletion process is similar to the standard binary search tree deletion but includes additional color and balance adjustments.

1. **Standard Binary Search Tree Deletion**: The node is deleted according to the standard binary search tree rules.

2. **Color and Balance Adjustment**: If the deleted node is black, rotation and color changing operations are performed to keep the tree balanced.

## Advantages

- **Balanced Structure**: The Red-Black Tree automatically balances itself after insertion and deletion operations, ensuring that search, insertion, and deletion operations occur in O(log n) time complexity.
- **Flexibility**: Compared to AVL trees, Red-Black Trees have less strict balancing rules, which means fewer rotations are required during insertion and deletion.

## Use Cases

Red-Black Trees are used in situations where fast search, insertion, and deletion operations are required. For example, data structures like Java's `TreeMap` and `TreeSet` use Red-Black Trees internally.

## Conclusion

The Red-Black Tree is a balanced version of a binary search tree and is widely used in dynamic data structures. Thanks to its colors and rules, the tree remains balanced, and operations are performed efficiently.
