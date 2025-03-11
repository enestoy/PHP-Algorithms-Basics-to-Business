# Longest Increasing Subsequence (LIS) Algorithm (Dynamic Programming Approach)

## 1. What is LIS (Longest Increasing Subsequence)?

LIS (Longest Increasing Subsequence) is a problem that involves finding the longest subsequence in a given array that is sorted in increasing order. This problem plays an important role in sorting, analysis, and data processing areas.

### 2. Problem Definition

- **Given:**
  - An array with `n` elements
  - We need to find the longest subsequence that is sorted in increasing order within the array.
- **Goal:** To determine the length and content of this subsequence.

### 3. Solution Using Dynamic Programming

The LIS problem can be solved with brute-force in `O(2^N)` time complexity, but it can be solved more efficiently with Dynamic Programming in `O(N^2)` time complexity.

#### a) State Definition

- `DP[i]` represents the length of the longest increasing subsequence up to the `i`-th element.

#### b) Transition Formula

- For each element, all previous elements are checked and updated as follows:
  ```DP[i] = max(DP[j] + 1) (if array[i] > array[j] and j < i)```
- Initially, all elements are set as `DP[i] = 1`.

#### c) Filling the Table

- The `DP` array is filled by checking the previous elements for each element.
- The length of the longest subsequence is found by `max(DP[i])`.

### 4. Why Use Dynamic Programming?

- **Brute-force method** performs a lot of redundant calculations, while the **DP method stores previous computations**, providing a more efficient approach.
- **O(N^2) time complexity** is slower compared to the **O(N log N) solution**, but the DP method is more popular in terms of clarity and usage.
- **In real-world problems**, it can be used in data analysis and optimization processes.

### 5. Conclusion

The LIS problem can be efficiently solved using Dynamic Programming. By using a DP table, the longest increasing subsequence can be obtained, and the sequence elements can be found through backtracking when necessary.
