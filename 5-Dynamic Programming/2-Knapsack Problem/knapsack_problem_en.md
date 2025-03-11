# Knapsack Problem Algorithm (Dynamic Programming Approach)

## 1. What is the Knapsack Problem?

The Knapsack Problem is a problem in which you aim to place objects with specific weights and values into a knapsack (backpack) with limited capacity to achieve the maximum possible value. This problem is commonly used in resource allocation and optimization scenarios.

### 2. Problem Definition

- **Given:**
  - N number of objects
  - Each object has a weight and a value
  - Maximum weight capacity W of the knapsack
- **Goal:** Find the combination of objects that maximizes the total value without exceeding the total weight capacity W.

### 3. Solution Using Dynamic Programming

The Knapsack Problem is solved using the **Tabulation (Bottom-Up Approach)** in Dynamic Programming.

#### a) State Definition

- `DP[i][w]` represents the maximum value that can be obtained with the first `i` objects and a knapsack capacity of `w`.

#### b) Transition Formula

- If the weight of the object is less than or equal to the capacity `w`:
  ```DP[i][w] = max(DP[i-1][w], Value[i] + DP[i-1][w - Weight[i]])```
- Otherwise, the object cannot be included:
  ```DP[i][w] = DP[i-1][w]```

#### c) Filling the Table

- The first row and first column are typically initialized to zero.
- Each cell in the table is filled based on previous computations.

### 4. Why Use Dynamic Programming?

- **Classic Recursive Solution** is inefficient due to repeated calculations.
- **Dynamic Programming** avoids redundant computations by storing results, improving efficiency.
- **Time Complexity:** `O(N * W)`, which is significantly faster than the recursive approach.

### 5. Conclusion

The Knapsack Problem is a common optimization problem. Using Dynamic Programming, the problem can be solved more efficiently and optimally.
