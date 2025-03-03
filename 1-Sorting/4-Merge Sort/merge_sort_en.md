# Merge Sort

**Merge Sort** is a sorting algorithm based on the divide and conquer approach. This algorithm aims to solve a large problem by breaking it into smaller subproblems. It first divides the array into smaller subarrays, sorts them, and finally merges the sorted subarrays.

## Working Principle of the Algorithm

1. **Divide**:  
   - The array is split into two halves.  
   - This process continues until the array is divided into single-element subarrays.  

2. **Conquer**:  
   - Each subarray is recursively sorted.  
   - Since single-element arrays are already sorted, the next step is merging these sorted arrays.  

3. **Merge**:  
   - Two sorted arrays are merged by comparing the smallest elements of both arrays.  
   - This process continues until all subarrays are merged into a fully sorted array.  

## Step-by-Step Example

Array: `[38, 27, 43, 3, 9, 82, 10]`

1. **Dividing**:  
   - First, the array is split into two parts: `[38, 27, 43]` and `[3, 9, 82, 10]`.  
   - These parts are further divided: `[38]`, `[27, 43]`, and `[3, 9]`, `[82, 10]`, and so on.  

2. **Sorting and Merging**:  
   - Then, the smaller arrays are sorted and merged:  
     - `[27, 43]` is sorted and merged: `[27, 43]`  
     - `[3, 9]` is sorted and merged: `[3, 9]`  
     - `[82, 10]` is sorted and merged: `[10, 82]`  

   - Finally, these sorted arrays are merged into a fully sorted array: `[3, 9, 10, 27, 38, 43, 82]`.  

## Time Complexity

- **Best Case**: O(n log n)  
- **Average Case**: O(n log n)  
- **Worst Case**: O(n log n)  

Since **Merge Sort** has a time complexity of O(n log n) in all cases, it is very efficient for large datasets.

## Advantages

- It is a **stable sorting algorithm** (equal elements maintain their original relative order after sorting).  
- It is fast and efficient for large arrays due to its O(n log n) complexity.  

## Disadvantages

- **Requires extra memory**: It needs additional space when splitting and merging the arrays.  
