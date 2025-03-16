# KMP (Knuth-Morris-Pratt) String Matching Algorithm

## Introduction

The KMP algorithm is an efficient search algorithm used to find a specific substring within a string. This algorithm avoids re-checking characters that have already been matched during the search process, thus making it faster. The KMP algorithm is particularly effective in large texts and databases.

## Basic Idea

The basic idea behind the KMP algorithm is to speed up the comparison of the text and the substring being searched. If a mismatch occurs, the algorithm does not start over from the beginning. Instead, it continues from an appropriate part of the substring, based on the "prefix" and "suffix" relationships within the string.

## KMP Algorithm Steps

1. **Preprocessing - Prefix Suffix Table (LPS)**:
   The KMP algorithm first creates an "LPS" (Longest Prefix Suffix) table. This table stores the longest prefix-suffix matches for each character in the substring. This table improves the algorithm's performance. The LPS table provides the following information for each character:

   - If the longest prefix up to that character is also a suffix, it tells us how many characters can be skipped.
   - This avoids unnecessary comparisons by skipping over characters that have already been checked.

2. **Search Steps**:
   - The first character of the substring is compared with the first character of the text.
   - If a mismatch occurs, the LPS table is used to determine where to start the next comparison.
   - The LPS table tells which character can be skipped, allowing most comparisons to be skipped.

## Advantages of KMP

- The KMP algorithm ensures that each character is checked only once. Therefore, even in the worst case, the time complexity is **O(n)** (where **n** is the length of the text).
- This provides a significant speed advantage over traditional linear search algorithms.

## Time Complexity

The time complexity of the KMP algorithm is **O(n + m)**.

- **n**: Length of the text
- **m**: Length of the substring

This complexity arises from both constructing the LPS table and performing the search.

## Summary

The KMP algorithm efficiently performs substring search by making forward steps instead of going backward. This approach significantly speeds up the search process, especially in large texts.
