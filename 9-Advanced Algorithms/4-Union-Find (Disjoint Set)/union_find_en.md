# Union-Find (Disjoint Set)

Union-Find (or Disjoint Set) is a data structure used to manage the relationships between a set of elements or items. This data structure allows performing union and find operations on items grouped into sets. It is commonly used in problems like finding connected components in graphs.

## Key Features of the Algorithm

- **Find**: The operation of determining which set an element belongs to.
- **Union**: The operation of merging two sets.
- **Disjoint**: The sets are not connected, meaning each element is only related to one set.

## Steps of the Algorithm

1. **Initialization**:
   - Initially, each element is placed in its own set. That is, each element forms a set by itself.

2. **Find Operation**:
   - To find which set an element belongs to, we trace up to the root of the set. If the element is the root of a set, it is the representative of that set.
   - The find operation can be optimized with a technique called "path compression." When finding the root of an element, we link all the elements along the path directly to the root, thus speeding up future find operations.

3. **Union Operation**:
   - When two sets need to be merged, we merge the roots of both sets.
   - To keep the sets balanced, we can use either "rank" (depth of the tree) or "size" (number of elements in the set). The smaller set is attached to the larger set's root.
   - The union operation can be optimized with "union by rank" or "union by size."

4. **Completion**:
   - After all the union and find operations are completed, the Union-Find data structure provides information about which set each element belongs to. Relationships can be managed with the merged sets.

## Time Complexity

- **Find**: O(α(n)) — Where α(n) is the inverse Ackermann function, which grows extremely slowly and is practically considered constant for typical values of n.
- **Union**: O(α(n)) — The union operation is also very fast because it only requires changing the roots of the sets.

Overall, the Union-Find data structure is often considered to have a **near O(1)** time complexity for both operations.

## Example

Consider a group of students. Each student initially belongs to their own group, i.e., their own set. Some of these students need to change groups. The Union-Find algorithm works as follows:

Initially, each student is in their own group:

[1], [2], [3], [4], [5]

1. Students 1 and 2 should be in the same group. The union operation merges these two sets:
   [1, 2], [3], [4], [5]
2. Students 3 and 4 should be in the same group. The union operation merges these two sets:
   [1, 2], [3, 4], [5]
3. Students 2 and 4 should be in the same group. The union operation merges these two sets:
   [1, 2, 3, 4], [5]
4. Students 1 and 5 should be in the same group. The union operation merges these two sets:
   [1, 2, 3, 4, 5]

As a result, all the students are merged into a single group.

## Conclusion

The Union-Find (Disjoint Set) algorithm is a data structure that efficiently handles union and find operations on sets. It is commonly used in network theory, set operations, and some graph algorithms (e.g., minimum spanning tree algorithms).
