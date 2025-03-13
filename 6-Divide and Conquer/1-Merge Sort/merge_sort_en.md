# Merge Sort Algorithm

Merge Sort is an efficient sorting algorithm that uses the "Divide and Conquer" strategy. The algorithm sorts an array by breaking it into smaller parts and then combining these parts to form a sorted array.

## Working Principle of Merge Sort

1. **Divide:**
   - The array is split in half into subarrays.
   - This process continues until each subarray contains a single element.

2. **Conquer:**
   - Subarrays with a single element are already sorted.
   - They are merged in pairs to form sorted subarrays.
   - Smaller subarrays are combined to create larger sorted subarrays.

3. **Combine:**
   - The subarrays are merged through comparisons, resulting in a completely sorted array.

## Time Complexity of Merge Sort

- **Best case:** O(n log n)
- **Average case:** O(n log n)
- **Worst case:** O(n log n)

Therefore, Merge Sort is a highly efficient sorting algorithm for large datasets.

## Advantages of Merge Sort

- **It is a stable algorithm:** The relative order of elements with equal values is preserved.
- **It is efficient for large datasets.**
- **It maintains an O(n log n) complexity even in the worst-case scenario.**

## Disadvantages of Merge Sort

- **Requires extra memory:** It uses O(n) additional memory to create new arrays.
- **It may be slower for small datasets.**

Merge Sort is especially preferred for large datasets where sorting order is important.
