# Boyer-Moore String Matching Algorithm

## Introduction

The Boyer-Moore algorithm is one of the most efficient string matching algorithms used to search for a substring within a text. It is particularly effective when searching in large texts. The Boyer-Moore algorithm works by using a "from right to left" approach and shifts the text forward when a match is not found. This allows it to skip many comparisons.

## Basic Idea

The Boyer-Moore algorithm only performs important comparisons when comparing the text and the target substring. The algorithm efficiently shifts the substring by using every encountered mismatch (non-match). This shifting process is done with the help of two pre-defined tables: the **bad character rule** and the **good suffix rule**.

## Boyer-Moore Algorithm Steps

1. **Bad Character Rule**:
   This rule determines how to use the mismatched characters (non-matching characters) encountered in the text. If a character in the text does not match the target substring, the substring is shifted to the right from that position. The amount of the shift is determined by whether the character in the target substring is present in the text. If the character is found, it is logical to shift the substring to the position where the character appears in the text.

2. **Good Suffix Rule**:
   This rule determines how much to shift when part of the substring has matched in the text and the remaining part has not. If part of the substring has matched, there is no need to check the remainder of that part. This allows for faster shifting. If there is a non-matching part, the substring is shifted before that non-matching part.

3. **Search Steps**:
   - The text and the target substring are compared from right to left.
   - If a match is not found, the bad character and good suffix rules are used to shift the substring.
   - The shifting process is repeated for each mismatch.

## Advantages of Boyer-Moore

- The Boyer-Moore algorithm is efficient when searching in large texts because many comparisons are skipped.
- The algorithm works faster by making fewer comparisons thanks to the right-to-left approach.

## Time Complexity

The time complexity of the Boyer-Moore algorithm is **O(n/m)**.

- **n**: Length of the text
- **m**: Length of the target substring

In the worst case, the time complexity can be **O(n * m)**, but it is generally much faster.

## Summary

The Boyer-Moore algorithm quickly searches for a substring within a text by comparing from right to left. Efficient shifting is performed thanks to the bad character and good suffix rules, making the algorithm work fast in large texts.
