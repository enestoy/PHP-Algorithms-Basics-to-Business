# Insertion Sort

**Insertion Sort** is a simple sorting algorithm used to sort an array by placing each element in its correct position.

## Working Principle of the Algorithm

1. **Initial State:** The algorithm starts from the second element of the array (the first element is considered already sorted).
2. **Nested Loop:** The selected element (current element) is compared with the sorted part and placed in the correct position.
3. **Placement:** If the current element is smaller than an element in the sorted part, the sorted element is shifted right, and the current element is inserted in the correct position.
4. **Repeat:** The algorithm continues until the end of the array, placing each element in the correct position.

## Step-by-Step Example

Example array: `[5, 2, 9, 1, 5, 6]`

1. First two elements: `[5, 2]`  
   Since 2 is smaller than 5, 5 is shifted right, and 2 is placed in its position.  
   New array: `[2, 5, 9, 1, 5, 6]`

2. Third element: `[2, 5, 9]`  
   9 is already in the correct position, so no change.  
   New array: `[2, 5, 9, 1, 5, 6]`

3. Fourth element: `[2, 5, 9, 1]`  
   1 is smaller than all elements in the sorted part, so they are all shifted right, and 1 is placed at the beginning.  
   New array: `[1, 2, 5, 9, 5, 6]`

4. Fifth element: `[1, 2, 5, 9, 5]`  
   5 is compared with elements in the sorted part and placed in the correct position.  
   New array: `[1, 2, 5, 5, 9, 6]`

5. Last element: `[1, 2, 5, 5, 9, 6]`  
   6 is compared with elements in the sorted part and placed in the correct position.  
   New array: `[1, 2, 5, 5, 6, 9]`

## Time Complexity

- **Best Case (Already Sorted Array):** O(n)
- **Average and Worst Case (Reverse Sorted Array):** O(n²)

## Advantages

- Simple and easy-to-understand algorithm.
- Efficient for small arrays.

## Disadvantages

- Inefficient for large arrays (O(n²)).
