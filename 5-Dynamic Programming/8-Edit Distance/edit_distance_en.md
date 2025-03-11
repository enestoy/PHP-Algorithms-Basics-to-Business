# Edit Distance (Levenshtein Distance) - Dynamic Programming

## Problem Overview

The Edit Distance or Levenshtein Distance problem is used to measure the difference between two words. This difference is defined as the minimum number of edit operations required to transform one word into another. The edit operations are as follows:

1. **Insertion**: Adding a character.
2. **Deletion**: Removing a character.
3. **Substitution**: Replacing one character with another.

The goal is to find the minimum number of these operations needed to convert one word into the other.

## Problem Definition

Given two words \( A \) and \( B \), the objective is to determine the minimum number of operations required to transform \( A \) into \( B \).

For example:

- \( A = "kitten" \)
- \( B = "sitting" \)

In this case, the minimum edit distance is calculated to find the difference between the words.

## Approach: Dynamic Programming

The Levenshtein Distance problem can be solved using dynamic programming. In this problem, we use the solutions to subproblems for each character of both words to compute the overall result.

### Steps

1. **Initial Case:**
   If both words are empty, the distance is zero. If one word is empty, all characters of the other word must be inserted.

2. **Cost Matrix:**
   A table (matrix) is created for each character of the two words. Each cell in this matrix stores the total number of edit operations required up to that point.

3. **Dynamic Programming Iteration:**
   The matrix is computed step-by-step. If the characters of the words match, the value from the previous cell is copied. If they don’t match, the value in the cell is updated with the minimum cost of an insertion, deletion, or substitution.

4. **Result:**
   The result is found in the bottom-right corner of the matrix, representing the minimum edit distance between the two words.

### Base Case

Initially, the number of operations required to transform an empty word into the other word is calculated.

### Example

- \( A = "kitten" \)
- \( B = "sitting" \)

In this case, the minimum edit distance is calculated with the following steps:

1. "k" and "s" are different, so a substitution is made.
2. "i" and "i" are the same, no change is needed.
3. "t" and "t" are the same, no change is needed.
4. "t" and "t" are the same, no change is needed.
5. "e" and "i" are different, so a substitution is made.
6. "n" and "n" are the same, no change is needed.
7. "sitting" has an extra "g", requiring an insertion.

A total of 3 operations are required.

## Conclusion

The Levenshtein Distance problem is a classic problem that uses dynamic programming to calculate the difference between two words. It combines the solutions to subproblems to determine the minimum number of edit operations needed to transform one word into another.
