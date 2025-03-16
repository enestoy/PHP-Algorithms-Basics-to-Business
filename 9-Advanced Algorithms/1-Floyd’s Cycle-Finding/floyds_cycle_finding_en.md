# Floyd's Cycle-Finding Algorithm (Tortoise and Hare)

Floyd's Cycle-Finding Algorithm is an algorithm used to detect whether there is a cycle in a linked list or similar data structures. This algorithm works by using two pointers: the "tortoise" and the "hare". If a cycle exists, the algorithm can find the start and the length of the cycle.

## Working Principle of the Algorithm

1. **Initial State**:
   - The "Tortoise" and "Hare" pointers are placed at the first element of the list.
   - The "Tortoise" pointer moves forward by one step at a time.
   - The "Hare" pointer moves forward by two steps at a time.

2. **Cycle Detection**:
   - As both pointers move through the list, if the "Hare" pointer catches up to the "Tortoise", it means there is a cycle in the list.
   - If the "Hare" and "Tortoise" never meet, then there is no cycle in the list.

3. **Finding the Start of the Cycle**:
   - If a cycle is detected, we move the "Tortoise" pointer back to the head, i.e., the first node.
   - Then, both the "Tortoise" and "Hare" pointers move one step at a time to find the starting point of the cycle.

## Steps of the Algorithm

- **Step 1**: Initially, place both the "Tortoise" and "Hare" pointers at the first element of the list.
- **Step 2**: Move the "Tortoise" pointer one step at a time, and the "Hare" pointer two steps at a time.
- **Step 3**: If the "Tortoise" and "Hare" pointers meet, assume a cycle exists, and continue to find the start of the cycle using the above steps.
- **Step 4**: If the "Tortoise" and "Hare" pointers never meet, you've reached the end of the list, and there is no cycle.

## Advantages of the Algorithm

- **Time Complexity**: The algorithm has a time complexity of O(n).
- **Space Efficiency**: This algorithm uses only a constant amount of extra memory (O(1) space complexity).

## Example

Consider the following list: `1 → 2 → 3 → 4 → 5 → 6 → 3 (cycle start)`

- Initially, the "Tortoise" is placed at 1, and the "Hare" is also placed at 1.
- As both pointers begin to move, the "Hare" moves two nodes forward at each step, while the "Tortoise" moves just one node forward.
- Eventually, the "Hare" and "Tortoise" meet at node 3, indicating that a cycle has started.
- To find the start of the cycle, we move the "Tortoise" back to the head of the list, and then move both pointers one step at a time. They meet again at node 3, which is the start of the cycle.

## Conclusion

Floyd’s Cycle-Finding Algorithm is an ideal method for quickly and memory-efficiently detecting cycles. It is one of the fundamental ways to detect cycles in any list or linked data structure.
