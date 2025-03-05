# Exponential Search Algorithm

**Exponential Search** is an algorithm used to search quickly in a sorted array. This algorithm is similar to the classic binary search, but with a key difference. It first searches in larger intervals and then completes the search using binary search.

## Algorithm Logic

1. **Initial Step**:
   - We first check the first element of the array. If the value we are looking for matches the first element, we directly return the result.

2. **Interval Expansion**:
   - If the first element does not match the target, we continue searching by doubling the search interval. We start at the 1st element, then move to the 2nd element, then the 4th element, and so on. We keep expanding the search range until we find an interval that contains the target value.

3. **Binary Search**:
   - After expanding the search interval, binary search is applied in the identified range. Binary search splits the search space in half and allows us to find the target value more quickly.

## Example Flow

Let's assume we have the following sorted array:

`[1, 3, 5, 7, 9, 11, 15, 19, 25, 30]`

- First, we check the first element of the array: `1`. Since the target value is `15`, it doesn't match `1`, so the search continues.
- Then, we move to the 2nd element, then the 4th element, and so on, expanding the search area.
- After expanding the search range, once we identify an interval where the target could be, we apply classic binary search within that range to find the target more efficiently.

## Advantages

- **Faster**: Especially for very large arrays, it can provide faster results because the search range is expanded quickly at the start.
- **Binary Search Application**: Since binary search is applied, it results in an efficient search at the end.

## Time Complexity

- **Best Case**: O(log n)
- **Worst Case**: O(log n)

This is the basic logic of the Exponential Search algorithm. When used, it provides efficient results for large arrays.
