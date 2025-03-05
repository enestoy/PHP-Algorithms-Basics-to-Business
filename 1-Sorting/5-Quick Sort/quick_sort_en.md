# Quick Sort

**Quick Sort** is a fast sorting algorithm that follows the **divide and conquer** approach. It aims to sort an array quickly by breaking it into smaller subarrays. The algorithm typically has an **average time complexity of O(n log n)**.

## Working Principle of the Algorithm

1. **Pivot Selection (Partitioning)**:
   - First, a "pivot" is selected from the array. The pivot is used to partition the array.
   - The array is split into two subarrays:
     - Elements smaller than the pivot go into one subarray.
     - Elements larger than the pivot go into another subarray.
     - The pivot is placed in its correct position in the sorted array.

2. **Sorting the Subarrays**:
   - The same process (pivot selection and partitioning) is recursively applied to the left and right subarrays.
   - This continues until all subarrays contain only a single element.

3. **Merging**:
   - Once all subarrays are sorted, they are merged to form the final sorted array.

## Step-by-Step Example

Array: `[10, 80, 30, 90, 40, 50, 70]`

1. **Pivot Selection and Partitioning**:
   - Choose `70` as the pivot.
   - Elements smaller than `70`: `[10, 30, 40, 50]`
   - Elements larger than `70`: `[80, 90]`
   - Pivot placed correctly: `[10, 30, 40, 50, 70, 80, 90]`

2. **Sorting the Subarrays**:
   - Left subarray: `[10, 30, 40, 50]` → Choose `50` as the pivot, sort the subarray.
   - Right subarray: `[80, 90]` → Choose `90` as the pivot, sort the subarray.

3. **Result**:
   - Final sorted array: `[10, 30, 40, 50, 70, 80, 90]`

## Time Complexity

- **Best Case**: O(n log n) (if the pivot is always chosen optimally)
- **Average Case**: O(n log n)
- **Worst Case**: O(n²) (if the pivot is always the smallest or largest element)

## Advantages

- **Fast**: On average, it performs very well with **O(n log n)** time complexity.
- **In-place sorting**: Does not require additional memory for sorting.

## Disadvantages

- **Worst-case performance**: If the pivot selection is poor, the algorithm degrades to **O(n²)**.
- **Unstable sorting**: Quick Sort is not a stable sorting algorithm, meaning equal elements may not retain their relative order.
