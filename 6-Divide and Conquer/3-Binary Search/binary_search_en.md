# Binary Search Algorithm

Binary Search is an efficient search algorithm that uses the "Divide and Conquer" strategy. The algorithm repeatedly divides the sorted array in half to find a specific element.

## Working Principle of Binary Search

1. **Finding the Middle Element:**
   - The middle element of the array is selected.

2. **Comparison:**
   - If the middle element is equal to the target value, the search is complete.
   - If the target value is smaller than the middle element, the search continues in the left half.
   - If the target value is larger than the middle element, the search continues in the right half.

3. **Repeat:**
   - The search continues on the subarrays by repeating the process.
   - If the size of the array becomes zero, the target element is not found, and the process ends.

## Time Complexity of Binary Search

- **Best case:** O(1) *(If the target element is found on the first guess)*
- **Average case:** O(log n)
- **Worst case:** O(log n)

## Advantages of Binary Search

- **It is very fast:** It provides O(log n) performance even for large datasets.
- **It performs fewer operations:** Compared to linear search (O(n)), it requires significantly fewer comparisons.
- **It is memory-efficient:** It does not require extra space.

## Disadvantages of Binary Search

- **It only works on sorted arrays.**
- **It incurs additional cost if the array needs to be sorted.**

Binary Search is a highly effective search algorithm for large, sorted datasets.
