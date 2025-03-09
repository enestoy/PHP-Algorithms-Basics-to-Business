# AVL Tree (Adelson-Velsky and Landis Tree)

## What is an AVL Tree?

An AVL Tree (Adelson-Velsky and Landis Tree) is a type of **self-balancing binary search tree**. In an AVL tree, the height difference (balance factor) between the left and right subtrees of each node must be at most 1. This ensures the tree remains balanced, keeping the time complexity of search, insertion, and deletion operations at O(log n).

## Basic Properties of an AVL Tree

1. **Binary Search Tree Properties:**
   - All elements in the left subtree of a node are smaller than that node, and all elements in the right subtree are greater than that node.

2. **Balance Condition:**
   - The balance factor of each node is calculated by subtracting the height of the right subtree from the height of the left subtree.
   - The balance factor is calculated as:
     - **Balance Factor = Height(Left Subtree) - Height(Right Subtree)**
   - The balance factor must be 1, 0, or -1. If the balance factor is outside this range, the tree is unbalanced and needs to be rebalanced.

3. **Balancing (Rebalancing):**
   - To maintain balance in an AVL tree, **rotations** are performed. There are four types of rotations:
     - **Right Rotation:** Performed when the balance factor is -2 and the left subtree has more depth.
     - **Left Rotation:** Performed when the balance factor is 2 and the right subtree has more depth.
     - **Left-Right Rotation:** Performed when the right child of the left subtree is deeper.
     - **Right-Left Rotation:** Performed when the left child of the right subtree is deeper.

## Basic Operations in an AVL Tree

1. **Insertion (Insert):**
   - When inserting a new node, just like in a Binary Search Tree (BST), the correct position is found by traversing down the tree.
   - However, after each insertion, the balance of the tree is checked, and if necessary, a rotation is performed to rebalance the tree.

2. **Search (Search):**
   - Searching in an AVL tree is done similarly to a binary search tree. However, since the AVL tree is always balanced, search operations are faster.

3. **Deletion (Delete):**
   - After deleting a node, like in insertion, the tree needs to be rebalanced.
   - After deletion, each node in the tree is checked again, and if the balance is disturbed, appropriate rotations are performed.

4. **Rotation Operations:**
   - **Right Rotation:** A right rotation is performed where the left subtree of the root node is shifted to the right.
   - **Left Rotation:** A left rotation is performed where the right subtree of the root node is shifted to the left.
   - **Left-Right Rotation:** When the right subtree of the left child is deeper, a left rotation is first performed on the left child, followed by a right rotation on the root.
   - **Right-Left Rotation:** When the left subtree of the right child is deeper, a right rotation is first performed on the right child, followed by a left rotation on the root.

## Advantages of an AVL Tree

- **Balance:** The AVL tree is always balanced, making operations like search, insertion, and deletion faster (O(log n)).
- **Fast Access:** The data in an AVL tree is stored in a sorted manner, allowing for faster access in each operation.

## Disadvantages of an AVL Tree

- **Rotation Operations:** Since rotations must be performed after every insertion and deletion, these operations incur additional cost.
- **More Complex Structure:** The AVL tree is more complex than a standard binary search tree and requires more attention in terms of coding and logic.

## Application Areas

- **Database Indexing:** AVL trees can be used for fast data searching and sorting in databases.
- **File Systems:** AVL trees can be used to store files in a sorted order in file systems.
- **Tree Structures:** Many other tree structures in computer science are based on AVL trees.

## Conclusion

The AVL Tree is a self-balancing binary search tree that consistently maintains its balance and delivers high performance in every operation. Search, insertion, and deletion operations are faster compared to other tree structures and ensure the tree remains balanced at all times.
