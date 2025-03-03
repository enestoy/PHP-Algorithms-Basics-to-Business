# Selection Sort 

Selection Sort is one of the sorting algorithms that works by selecting the smallest (or largest) element in each pass and placing it in its correct position.

## Working Principle:
1. Find the smallest element in the array.
2. Swap the smallest element with the first element of the array.
3. Expand the sorted section and repeat the process for the remaining elements.
4. Continue this process until all elements are sorted.

## Example:
Let's assume we want to sort the following list: `[5, 3, 8, 4, 2]`

### Step 1:
- The smallest element is `2`.
- Swap `2` with `5` → `[2, 3, 8, 4, 5]`

### Step 2:
- `3` is already in the correct position → `[2, 3, 8, 4, 5]`

### Step 3:
- The smallest element is `4` → Swap `4` with `8` → `[2, 3, 4, 8, 5]`

### Step 4:
- The smallest element is `5` → Swap `5` with `8` → `[2, 3, 4, 5, 8]`

Once this process is complete, the list is fully sorted.

## Time Complexity:
- **Worst, best, and average case:** O(n²)
- **Advantage:** Fewer swaps compared to some other sorting algorithms.
- **Disadvantage:** Inefficient for large datasets.
