# Quick Sort Algorithm

Quick Sort is a fast and efficient sorting algorithm that uses the "Divide and Conquer" strategy. The algorithm selects a pivot (a turning point) to divide the array into two subgroups: one with smaller elements and one with larger elements, then sorts these subgroups individually.

## Working Principle of Quick Sort

1. **Pivot Selection:**
   - A pivot element is chosen from the array, either randomly or according to a specific rule.

2. **Partitioning:**
   - The array is rearranged around the selected pivot element.
   - Elements smaller than the pivot are placed on the left, and elements greater than the pivot are placed on the right.

3. **Recursive Sorting:**
   - The same process is repeated for the left and right subarrays.
   - Subarrays continue to be split until they contain only one element.

## Time Complexity of Quick Sort

- **Best case:** O(n log n)
- **Average case:** O(n log n)
- **Worst case:** O(n²) *(If pivot selection is poor)*

## Advantages of Quick Sort

- **It is fast:** In the average case, it performs similarly to Merge Sort.
- **It does not require extra memory:** It operates without needing additional memory in most cases.
- **It is highly efficient in practice.**

## Disadvantages of Quick Sort

- **Poor pivot selection can degrade performance.**
- **It is not as stable as Merge Sort:** The relative order of elements with the same value may change.

Quick Sort is an effective sorting algorithm, especially preferred in large datasets and situations where memory is limited.
