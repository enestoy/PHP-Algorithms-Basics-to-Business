
# Jump Search Algorithm

## What is Jump Search?

Jump Search is an algorithm for searching an element in a sorted list or array. It works by jumping ahead by a fixed number of steps and checking if the element exists in the block. If the element is not found within the block, the search continues to the next block, and so on.

## How It Works

1. The list must be sorted.
2. Define a step size `k` (usually the square root of the list size).
3. Start at the beginning of the list and jump ahead by `k` steps.
4. Check if the target element is within the current block.
5. If the element is not in the block, move to the next block by jumping `k` steps.
6. If the element is found within the block, perform a linear search within that block to find the exact position.

## Time Complexity

- **Worst-case:** O(√n) → The algorithm jumps forward in steps, resulting in fewer checks than Linear Search.
- **Best-case:** O(1) → The element may be found immediately in the first jump.
- **Average-case:** O(√n) → Generally faster than Linear Search for larger datasets.

## Advantages

✅ Faster than Linear Search for large datasets.  
✅ Works efficiently with sorted data.  
✅ Reduces the number of comparisons by skipping over elements in blocks.  

## Disadvantages

❌ The list must be sorted before searching.  
❌ Not as efficient as Binary Search for large datasets with a small number of blocks.  

---
Jump Search is commonly used when the data is sorted, and the problem needs faster search times compared to linear search.
