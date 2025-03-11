# Longest Common Subsequence (LCS) Algorithm (Dynamic Programming Approach)

## 1. What is LCS (Longest Common Subsequence)?

LCS (Longest Common Subsequence) is the problem of finding the longest subsequence that is common to two strings while preserving the order of characters. This problem is widely used in bioinformatics, text comparison, and file difference analysis.

### 2. Problem Definition

- **Given:**
  - Two strings `X` and `Y`
  - The longest common subsequence must be found while preserving the order of characters in both strings.
- **Goal:** Determine the length and content of the longest common subsequence.

### 3. Solution Using Dynamic Programming

The LCS problem can be solved using recursive and brute-force methods, but these approaches have high time complexity. Dynamic Programming (DP) provides a more efficient solution.

#### a) State Definition

- `DP[i][j]` represents the length of the longest common subsequence between the first `i` characters of `X` and the first `j` characters of `Y`.

#### b) Transition Formula

- If `X[i] == Y[j]`:
  ```DP[i][j] = DP[i-1][j-1] + 1```
- If `X[i] != Y[j]`:
  ```DP[i][j] = max(DP[i-1][j], DP[i][j-1])```

#### c) Filling the Table

- The `DP` table is filled based on the two strings.
- The first row and first column are typically initialized with `0`.
- After filling the table, `DP[m][n]` gives the length of the longest common subsequence.

### 4. Why Use Dynamic Programming?

- **Brute-force method** has a time complexity of `O(2^N)`, while the **DP method** works with a time complexity of `O(m*n)`, making it much faster.
- **Stores previous computations** to avoid redundant calculations.
- Provides a more efficient approach for **real-world problems** (e.g., DNA sequencing, text comparison).

### 5. Conclusion

The LCS problem can be efficiently solved using Dynamic Programming. The longest common subsequence can be obtained using backtracking on the constructed DP table.
