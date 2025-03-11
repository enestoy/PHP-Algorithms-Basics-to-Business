# Fibonacci Sequence Algorithm (Dynamic Programming Approach)

## 1. What is the Fibonacci Sequence?

The Fibonacci sequence is a series of numbers where each number is the sum of the two preceding ones. The first two elements of the sequence are typically defined as 0 and 1.

Example Fibonacci sequence:
```0, 1, 1, 2, 3, 5, 8, 13, 21, 34, ...```

### 2. Calculating Fibonacci Using Dynamic Programming

Dynamic Programming (DP) is a technique that stores previously computed results to avoid redundant calculations. There are two main ways to calculate the Fibonacci sequence using DP:

#### a) Memoization (Top-Down Approach)

- **Explanation:** Stores computed Fibonacci values in an array or dictionary to prevent redundant calculations.
- **Advantage:** Eliminates unnecessary computations and improves performance.
- **Disadvantage:** Requires additional memory usage.

#### b) Tabulation (Bottom-Up Approach)

- **Explanation:** Solves smaller subproblems first and builds up to the solution of the larger problem.
- **Advantage:** Optimizes memory usage.
- **Disadvantage:** Requires all smaller subproblems to be computed first.

### 3. Why Use Dynamic Programming?

- The classic recursive method is inefficient because it recalculates the same values multiple times.
- DP eliminates redundant computations by storing results.
- It reduces time complexity for large inputs, significantly improving performance.

### 4. Conclusion

Using Dynamic Programming to calculate the Fibonacci sequence greatly reduces computation time and provides an efficient approach for larger numbers. Especially for large inputs, the optimization offered by DP ensures that calculations are completed much faster.
