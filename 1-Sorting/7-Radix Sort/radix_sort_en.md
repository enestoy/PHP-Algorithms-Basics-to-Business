# Radix Sort

**Radix Sort** is a **sorting algorithm** that sorts numbers based on their individual digits. This algorithm works by considering each digit of a number, making it particularly effective for **integer sorting**, especially when dealing with large numbers or focusing on specific digit positions.

## Working Principle of the Algorithm

Radix Sort performs sorting **digit-by-digit** following these steps:

1. **Start from the Least Significant Digit**:
   - Sorting begins with the least significant digit (usually the ones place).
   - For example, in numbers 123 and 456, it first considers the ones digits (3 and 6).

2. **Move to the Next Digit**:
   - Once sorting is completed based on the first digit, the next digit (tens, hundreds, etc.) is considered.

3. **Sorting Process**:
   - This process is repeated for each digit until the most significant digit is reached.

4. **Finalizing the Array**:
   - Once all digits have been considered, the entire array becomes sorted.

## Step-by-Step Example

Array: `[170, 45, 75, 90, 802, 24, 2, 66]`

1. **Sorting by Ones Place**:
   - `[170, 90, 802, 2, 24, 45, 75, 66]` (Ones digits: 0, 0, 2, 2, 4, 5, 5, 6)

2. **Sorting by Tens Place**:
   - `[170, 802, 2, 24, 45, 66, 75, 90]` (Tens digits: 7, 0, 0, 2, 4, 6, 7, 9)

3. **Sorting by Hundreds Place**:
   - `[2, 24, 45, 66, 75, 90, 170, 802]` (Hundreds digits: 0, 0, 0, 0, 0, 0, 1, 8)

4. **Final Result**:
   - The sorted array: `[2, 24, 45, 66, 75, 90, 170, 802]`

## Time Complexity

- **Best Case**: O(nk)
- **Average Case**: O(nk)
- **Worst Case**: O(nk)

Where:
- **n**: Number of elements in the array
- **k**: Number of digits in the largest number

### Advantages

- **Fast**: Efficient when dealing with large numbers, as it sorts based on digits.
- **Stable**: The order of equal elements is preserved.
- **Direct Sorting**: No element comparisons are required; sorting is purely digit-based.

### Disadvantages

- **Limited to Numbers**: Radix Sort is primarily used for numerical data and is not suited for other data types.
- **Memory Usage**: Requires additional memory for sorting, which may be problematic for very large datasets.

## Use Cases

- **Sorting digital data**: Used in large datasets that involve numbers and dates.
- **Fast numeric sorting**: Suitable for applications that require efficient number sorting.
