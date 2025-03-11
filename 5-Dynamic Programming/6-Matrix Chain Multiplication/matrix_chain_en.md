# Matrix Chain Multiplication - Dynamic Programming

## Problem Overview

Matrix Chain Multiplication is a classic dynamic programming problem. The goal is to find the most efficient way to multiply a given sequence of matrices. Matrix multiplication is associative, meaning the order of multiplication does not change the result, but it does affect the computation cost.

Given a sequence of matrices, the objective is to determine the optimal way to parenthesize and multiply them with the minimum number of scalar multiplications.

## Problem Definition

Given a sequence of matrices \( A_1, A_2, A_3, \dots, A_n \), where each matrix \( A_i \) has dimensions \( p_{i-1} \times p_i \), the goal is to determine the order of multiplication that minimizes the number of scalar multiplications.

For example, consider three matrices with the following dimensions:

- \( A_1 \): \( 10 \times 20 \)
- \( A_2 \): \( 20 \times 30 \)
- \( A_3 \): \( 30 \times 40 \)

We can multiply \( A_1 \) and \( A_2 \) first, then multiply the result by \( A_3 \), or we can first multiply \( A_2 \) and \( A_3 \), then multiply the result by \( A_1 \). The number of scalar multiplications differs based on the chosen order.

## Approach: Dynamic Programming

Dynamic programming is used to solve the Matrix Chain Multiplication problem by breaking it down into smaller subproblems and building the solution incrementally.

### Steps

1. **Matrix Dimensions:**
   Define the matrix dimensions as an array. For example, if there are 3 matrices, the dimensions will be \( p_0, p_1, p_2, p_3 \), where \( A_1 \) has dimensions \( p_0 \times p_1 \), \( A_2 \) has dimensions \( p_1 \times p_2 \), and so on.

2. **Cost Matrix:**
   Create a 2D table `dp` where `dp[i][j]` represents the minimum number of scalar multiplications required to multiply matrices from \( A_i \) to \( A_j \). This table is filled using the formula:
   $$
   dp[i][j] = \min(dp[i][k] + dp[k+1][j] + p_i \times p_k \times p_j)
   $$
   where \( i \leq k < j \). This formula splits the sequence and selects the lowest-cost solution.

3. **Base Case:**
   If a single matrix is considered, there is no multiplication cost, so:
   $$ dp[i][i] = 0 $$

4. **Iterative Calculation:**
   As chain lengths increase, check all possible split points to determine the minimum cost.

5. **Final Result:**
   The final result is stored in `dp[1][n-1]`, representing the minimum number of scalar multiplications required to multiply all matrices.

## Example

Consider the following matrix dimensions:

- \( A_1 \): \( 10 \times 20 \)
- \( A_2 \): \( 20 \times 30 \)
- \( A_3 \): \( 30 \times 40 \)

The dimension array will be \( [10, 20, 30, 40] \). Using dynamic programming, the optimal parenthesization is determined, minimizing the number of scalar multiplications.

## Conclusion

Matrix Chain Multiplication is a classic problem that demonstrates the power of dynamic programming. By breaking a complex problem into smaller subproblems and solving each efficiently, we can derive the optimal solution. This approach is applicable to real-world matrix multiplication problems as well.
