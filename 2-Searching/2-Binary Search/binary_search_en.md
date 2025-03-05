
# Binary Search Algorithm

## What is Binary Search?

Binary Search is an efficient search algorithm used to find an element quickly in a sorted list. Unlike Linear Search, which checks each element one by one, it uses the "divide and conquer" approach.

## How It Works

1. The list must be sorted in ascending order.
2. The middle element of the list is found.
3. The target element is compared with the middle element:
   - If they are equal, the index is returned.
   - If the target element is smaller, the search continues in the left half.
   - If the target element is larger, the search continues in the right half.
4. This process repeats until the element is found or the search space is exhausted.

## Time Complexity

- **Worst-case:** O(log n) → The search space is halved with each step.
- **Best-case:** O(1) → The middle element might directly be the target.
- **Average-case:** O(log n) → Very efficient for large datasets.

## Advantages

✅ Much faster than Linear Search in large lists.  
✅ Works efficiently with sorted data.  
✅ Significantly reduces the number of comparisons.  

## Disadvantages

❌ The list must be sorted before searching.  
❌ Less advantageous for small datasets compared to Linear Search.  

---
Binary Search is commonly used in applications requiring fast searches, such as databases and indexing systems.
