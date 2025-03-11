# Rod Cutting Problem - Dynamic Programming

## Problem Overview

The Rod Cutting problem is an optimization problem where you aim to maximize profit by cutting a rod (or pieces of a rod of a certain length). This problem typically involves determining how to cut a rod into pieces, given the prices for each length, to achieve the maximum profit.

You are given the prices for different lengths of a rod, and the goal is to cut the rod in the most efficient way possible, i.e., to maximize the total revenue (profit).

## Problem Definition

- The length of the rod is given as \( n \).
- A price list is provided for each length of the rod.
- The objective is to cut the rod into different pieces to maximize the total profit.

For example:

- Rod prices: \( p[1] = 2, p[2] = 5, p[3] = 7, p[4] = 8 \),
- Total rod length: \( n = 4 \).

In this case, there could be different strategies for cutting a rod of length 4.

## Approach: Dynamic Programming

The Rod Cutting problem is a classic optimization problem that can be solved using dynamic programming. It relies on the principle of breaking down a larger problem into smaller subproblems.

### Steps

1. **Define the Price List:**
   Define the prices of different lengths of the rod as an array: \( p[1], p[2], \dots, p[n] \).

2. **Cost Matrix:**
   `dp[i]` stores the maximum profit that can be obtained by cutting a rod of length \( i \).

3. **Dynamic Programming Iteration:**
   For each length, calculate the maximum profit by cutting the rod into different pieces, using the results of previous subproblems.

4. **Profit Calculation:**
   Using the solutions to each subproblem, compute the maximum profit for cutting a rod of length \( n \).

5. **Result:**
   The result is stored in `dp[n]`, which represents the maximum profit achievable by cutting the entire rod.

### Base Case

Initially, it is assumed that no profit is made for a rod of zero length. Thus, \( dp[0] = 0 \).

### Example

Suppose the price list and rod length are given as follows:

- \( p[1] = 2, p[2] = 5, p[3] = 7, p[4] = 8 \)
- Rod length: \( n = 4 \)

In this case, the most profitable solution would be to cut the rod into two pieces of length 2 each.

## Conclusion

The Rod Cutting problem is a classic optimization problem that can be solved using dynamic programming. The solutions to subproblems are combined to determine the maximum profit for each length of the rod. This approach can also be applied to solve many similar optimization problems.
