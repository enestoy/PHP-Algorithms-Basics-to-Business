# Counting Sort

**Counting Sort** is a sorting algorithm that works based on the **frequencies** of numbers. This algorithm counts the occurrences of each element in the array and uses this information to sort them. **Counting Sort** is particularly efficient for sorting **positive integers**.

## Working Principle of the Algorithm

Counting Sort generally follows these steps:

1. **Creating the Frequency Array**:
   - First, the smallest and largest elements in the array are identified.
   - A "frequency array" is created to store the number of times each element appears within this range.

2. **Counting Frequencies**:
   - The occurrences of each element in the array are counted.

3. **Computing Cumulative Counts**:
   - The frequency array is updated to determine the correct position of each element in the sorted array.

4. **Building the Sorted Array**:
   - Finally, the sorted array is constructed using the updated frequency array.

## Step-by-Step Example

Array: `[4, 2, 2, 8, 3, 3, 1]`

1. **Creating the Frequency Array**:
   - Counting occurrences:
     - 1 appears once.
     - 2 appears twice.
     - 3 appears twice.
     - 4 appears once.
     - 8 appears once.

2. **Counting Frequencies**:
   - Frequency array:
     - `[0, 1, 2, 2, 1, 0, 0, 0, 1]` (from 0 to 8)

3. **Computing Cumulative Counts**:
   - Updating the array to store cumulative sums:
     - `[0, 1, 3, 5, 6, 6, 6, 6, 7]`

4. **Building the Sorted Array**:
   - Using this updated array to construct the sorted sequence:
     - Sorted output: `[1, 2, 2, 3, 3, 4, 8]`

## Time Complexity

- **Best Case**: O(n + k)
- **Average Case**: O(n + k)
- **Worst Case**: O(n + k)

Where:
- **n**: Number of elements in the array
- **k**: The largest number in the array (i.e., the range of numbers to be sorted)

### Advantages

- **Fast**: Extremely efficient when working with numbers within a limited range. If **k** is smaller than **n**, Counting Sort performs very well.
- **Stable**: Preserves the relative order of equal elements.
- **Non-Comparative**: Does not compare elements directly.

### Disadvantages

- **Limited to Positive Numbers**: Counting Sort does not handle negative numbers or complex data types efficiently.
- **Large Range Problem**: If the numbers have a very large range, the frequency array becomes too large, leading to high memory consumption.

### Use Cases

- **Sorting Numbers**: Used when quickly sorting positive integers.
- **Digital Data Sorting**: Suitable for efficiently sorting numbers within a specific range.
