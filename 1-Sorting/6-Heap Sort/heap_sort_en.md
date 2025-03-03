# Heap Sort

**Heap Sort** is a sorting algorithm that uses the **heap** data structure. A **heap** is a special type of binary tree where each node’s value is greater than (max heap) or smaller than (min heap) its children's values. Heap Sort efficiently sorts large datasets using this structure.

## Working Principle of the Algorithm

1. **Building the Heap**:
   - The given array is first converted into a **heap**.
   - The array is transformed into a **max heap** or **min heap**.
   - **Max Heap**: Every parent node is greater than or equal to its children.
   - **Min Heap**: Every parent node is smaller than or equal to its children.

2. **Removing the Root Element**:
   - The largest (or smallest) element is removed from the heap.
   - The root of the heap holds the largest element, which is placed at the end of the array.

3. **Reorganizing the Heap**:
   - To maintain the heap structure, the remaining elements are restructured into a valid heap.

4. **Repeating the Process**:
   - The process continues until all elements are sorted.

## Step-by-Step Example

Array: `[4, 10, 3, 5, 1]`

1. **Converting to a Max Heap**:
   - The array is rearranged into a max heap: `[10, 5, 3, 4, 1]`
   
2. **Removing the Largest Element**:
   - The largest element (10) is removed from the heap and placed at the end: `[1, 5, 3, 4]`
   - The heap is restructured: `[5, 4, 3, 1]`

3. **Repeating the Process**:
   - The next largest element is removed, placed at the end, and the heap is restructured: `[4, 1, 3]`
   - The final sorted array: `[1, 3, 4, 5, 10]`

## Time Complexity

- **Best Case**: O(n log n)
- **Average Case**: O(n log n)
- **Worst Case**: O(n log n)

Since **Heap Sort** always runs in **O(n log n)** time complexity, it is highly efficient, especially in scenarios where **memory efficiency is crucial** and **extra space usage must be minimal**.

## Advantages

- **Consistent performance**: Always runs in **O(n log n)** time complexity.
- **In-place sorting**: Requires no additional memory (space complexity is O(1)).
- **Not a stable sort**: Equal elements may not retain their original order.

## Disadvantages

- **Unstable sorting**: Heap Sort is not a stable sorting algorithm, meaning that elements with the same value may have their order changed.
- **Slower compared to Quick Sort**: Although it has the same time complexity as Quick Sort, heap construction and restructuring operations make it slightly slower.
