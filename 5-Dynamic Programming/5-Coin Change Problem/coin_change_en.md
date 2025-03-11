# Coin Change Problem (Dynamic Programming Approach)

## 1. What is the Coin Change Problem?

The Coin Change Problem is about finding the minimum number of coins required to make a given amount using different denominations. This problem plays an important role in financial systems and optimization.

### 2. Problem Definition

- **Given:**
  - An array (`coins`) containing different denominations.
  - A target amount (`target`).
- **Goal:** Find the minimum number of coins required to form the target amount.

### 3. Solution Using Dynamic Programming

The Coin Change problem can be solved with a brute-force approach in `O(2^N)` time complexity, but a more efficient solution can be achieved using Dynamic Programming in `O(N * M)` time complexity.

#### a) State Definition

- `DP[i]` represents the minimum number of coins needed to obtain the value `i`.

#### b) Transition Formula

- `DP[0] = 0` is set as the base case.
- While calculating `DP[i]`, the following formula is used for each `coin` denomination:
  ```DP[i] = min(DP[i], DP[i - coin] + 1)```
- This calculation is performed only if `i - coin >= 0`.

#### c) Filling the Table

- Initially, the `DP` array is filled with `∞` (infinity).
- `DP[0] = 0` is assigned.
- Then, iterating over all `coins`, the `DP` array is updated accordingly.
- Finally, `DP[target]` gives the minimum number of coins required.

### 4. Why Use Dynamic Programming?

- **Brute-force methods** involve excessive redundant calculations, whereas **the DP approach stores previous computations**, making it more efficient.
- **O(N*M) time complexity** speeds up computations even for large values.
- **In real-world applications**, it can be used in payment systems and optimization processes.

### 5. Conclusion

The Coin Change problem can be efficiently solved using Dynamic Programming. Using a DP table, the minimum number of coins required can be found, and if needed, the combination of coins can be determined using backtracking.
