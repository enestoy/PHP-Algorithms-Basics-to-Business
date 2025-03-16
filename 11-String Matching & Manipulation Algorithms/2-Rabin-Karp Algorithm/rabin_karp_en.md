# Rabin-Karp String Matching Algorithm

## Introduction

The Rabin-Karp algorithm is another efficient algorithm used to search for a substring within a text. This algorithm is especially useful when multiple searches are performed or when multiple substrings are searched within large texts. The Rabin-Karp algorithm speeds up the substring matching process by using "hashing" (hash functions).

## Basic Idea

The basic idea of the Rabin-Karp algorithm is to represent each substring by a number. These numbers are calculated using hashing. A hash value is computed for each substring of a text, and these hash values are compared. If two hash values match, then it is checked whether those substrings actually match.

## Rabin-Karp Algorithm Steps

1. **Hash Function**:
   The algorithm calculates a hash value for each substring. The hash function represents each character by a number and combines these numbers to create a hash value. This way, instead of comparing two substrings directly, their hash values are compared.

2. **Search Steps**:
   - The hash value of the substring to be searched is computed.
   - For each possible substring in the text, its hash value is computed.
   - If a substring’s hash value matches the hash value of the target substring, the two substrings are compared.
   - If no match is found, the hash values for other substrings are computed.

3. **Collisions**:
   Hash functions may produce the same hash value for different strings, which is called a "collision." In Rabin-Karp, even if the hash values match, it is necessary to check whether the substrings actually match. This is an additional step to handle collisions.

## Advantages of Rabin-Karp

- The Rabin-Karp algorithm is very fast when performing multiple searches. It provides an efficient solution for searching multiple substrings within a text.
- By using a hash function, the matching of substrings is checked with a single comparison.

## Time Complexity

The time complexity of the Rabin-Karp algorithm is **O(n + m)**, but this complexity can vary depending on the performance of the hash function and the probability of collisions.

- **n**: Length of the text
- **m**: Length of the target substring

In the worst case, the time complexity of the algorithm is **O(n * m)** because when collisions occur, each substring must be compared.

## Summary

The Rabin-Karp algorithm is an algorithm that searches for substrings by using hashing. It is especially effective when multiple searches are performed and collisions need to be managed. Thanks to hashing, the algorithm works efficiently, but additional operations are required when collisions occur.
