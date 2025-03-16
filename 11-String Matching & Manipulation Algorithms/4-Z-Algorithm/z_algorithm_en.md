# What is Z-Algorithm?

The Z-Algorithm is an algorithm applied to a string (or sequence) and is commonly used in **string matching** and **string manipulation** problems. This algorithm calculates the **self-similarity** length up to each index of a string.

## Z-Array

To understand Z-Algorithm, we need to understand the concept of the **Z-array**. The Z-array is an array that calculates the longest **prefix match** from each position of the string.

For example:

Let’s consider a string: `s = "abac"`

We calculate the Z-array as follows:

1. Start from the first character: "abac" matches completely with "abac", so Z[0] = 4.
2. Start from the second character: "b" matches with "abac" only at the beginning, so Z[1] = 0.
3. Start from the third character: "a" matches with "abac" at the beginning with "a", so Z[2] = 1.
4. Start from the fourth character: "c" matches with "abac" at the beginning but does not match, so Z[3] = 0.

The resulting Z-array is: `[4, 0, 1, 0]`

## How Does Z-Algorithm Work?

The Z-Algorithm enables efficient calculation of the Z-array. Instead of recalculating the prefix match for each position from scratch, we use previously computed results to speed up the process.

Steps:

1. The Z[0] is always the length of the string.
2. For the other indices, we use the results of previous calculations to find the matches.
3. If a match is found, it is recorded in the Z-array.
4. This process is done in a loop, and typically operates in O(n) time complexity.

## Applications of Z-Algorithm

The Z-Algorithm is especially useful in **string matching** problems (for example, finding a pattern in a text). It is commonly used for efficiently finding specific substrings within a string.

## Summary

The Z-Algorithm calculates the **self-similarity** lengths at each position of a string, providing an efficient solution for string manipulation and searching operations. This algorithm is commonly used to optimize more complex operations.
