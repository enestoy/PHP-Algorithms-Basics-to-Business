# Bucket Sort

**Bucket Sort** is a sorting algorithm that works efficiently when the numbers are distributed within a specific range and are relatively close to each other. This algorithm divides the array into multiple buckets, sorts each bucket separately, and then combines them to produce the sorted array.

## Working Principle of the Algorithm

1. **Creating Buckets**:
   - First, a set of buckets is created based on the values of the elements to be sorted.
   - These buckets are typically designed to distribute the elements within a specific range. The number of buckets is often equal to or slightly greater than the number of elements in the array.

2. **Distributing Elements into Buckets**:
   - Each element is placed into its appropriate bucket based on its value.

3. **Sorting Each Bucket**:
   - The elements in each bucket are sorted individually, usually using a fast sorting algorithm such as **Insertion Sort**.

4. **Merging Buckets**:
   - Finally, the sorted buckets are combined to form the final sorted array.

## Step-by-Step Example

Array: `[0.42, 0.32, 0.23, 0.51, 0.12, 0.33]`

1. **Creating Buckets**:
   - Based on the given range (between 0 and 1), we can create 5 buckets.

2. **Distributing Elements into Buckets**:
   - The elements are distributed as follows:
     - Bucket 1: `[0.12]`
     - Bucket 2: `[0.23]`
     - Bucket 3: `[0.32, 0.33]`
     - Bucket 4: `[0.42]`
     - Bucket 5: `[0.51]`

3. **Sorting Each Bucket**:
   - Each bucket is sorted individually:
     - Bucket 1: `[0.12]`
     - Bucket 2: `[0.23]`
     - Bucket 3: `[0.32, 0.33]`
     - Bucket 4: `[0.42]`
     - Bucket 5: `[0.51]`

4. **Merging Buckets**:
   - Finally, the sorted buckets are merged:
     - `[0.12, 0.23, 0.32, 0.33, 0.42, 0.51]`

## Time Complexity

- **Best Case**: O(n + k)
- **Average Case**: O(n + k)
- **Worst Case**: O(n²) (if all elements end up in the same bucket and require additional sorting)

Where:

- **n**: Number of elements in the array
- **k**: Number of buckets (or the range of values in the array)

### Advantages

- **Efficient for Certain Distributions**: Bucket Sort works well when the elements are evenly distributed within a specific range.
- **Fast Sorting**: If sorting within buckets is minimal, the algorithm runs very efficiently.

### Disadvantages

- **Poor Performance for Uneven Distributions**: If elements are not evenly distributed, Bucket Sort may not perform well.
- **Memory Usage**: Requires additional memory for storing buckets.

### Use Cases

- **Sorting Numerical Data**: Particularly useful for sorting numbers within a specific range.
- **Handling Complex Numbers**: If numbers are concentrated within a certain range, Bucket Sort can be an effective choice.
