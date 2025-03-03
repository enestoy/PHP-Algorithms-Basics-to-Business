# Bubble Sort

Bubble Sort is one of the sorting algorithms and is based on a very simple logic. This algorithm compares each element in the list and swaps them accordingly. While sorting an array, the largest (or smallest) element "bubbles" up to the end in each pass. This process continues until all elements are sorted.

## Working Principle:
1. Compares the elements in the list.
2. If an element is greater than the next element, they swap places.
3. This process continues until the entire list is sorted.

## Example:
Let's assume we want to sort the following list: `[5, 3, 8, 4, 2]`

# Bubble Sort Algorithm Steps

## Step 1 (First Pass)
- **Compare 5 and 3**, since 5 > 3, they are swapped: `[3, 5, 8, 4, 2]`
- **Compare 5 and 8**, since 5 < 8, no change: `[3, 5, 8, 4, 2]`
- **Compare 8 and 4**, since 8 > 4, they are swapped: `[3, 5, 4, 8, 2]`
- **Compare 8 and 2**, since 8 > 2, they are swapped: `[3, 5, 4, 2, 8]`

## Step 2 (Second Pass)
- **Compare 3 and 5**, since 3 < 5, no change: `[3, 5, 4, 2, 8]`
- **Compare 5 and 4**, since 5 > 4, they are swapped: `[3, 4, 5, 2, 8]`
- **Compare 5 and 2**, since 5 > 2, they are swapped: `[3, 4, 2, 5, 8]`

## Step 3 (Third Pass)
- **Compare 3 and 4**, since 3 < 4, no change: `[3, 4, 2, 5, 8]`
- **Compare 4 and 2**, since 4 > 2, they are swapped: `[3, 2, 4, 5, 8]`

## Step 4 (Fourth Pass)
- **Compare 3 and 2**, since 3 > 2, they are swapped: `[2, 3, 4, 5, 8]`

Once this process is complete, the list is fully sorted.

## Time Complexity:
- Worst and average case: **O(n²)**
- Best case: **O(n)** (If the list is already sorted)
- Suitable for small datasets but inefficient for large datasets.
