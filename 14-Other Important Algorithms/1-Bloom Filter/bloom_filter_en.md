# Bloom Filter Algorithm

## What is Bloom Filter?

A Bloom Filter is a probabilistic data structure used to determine whether an element is a member of a set. While it does not provide a definitive result, it **allows false positives but never false negatives**.

## Working Principle of Bloom Filter Algorithm

1. **Initialization:** An empty bit array is created.
2. **Adding an Element:**
   - The element is passed through multiple hash functions to determine specific bit positions in the array.
   - The bits at these positions are marked as `1`.
3. **Querying an Element:**
   - The element is hashed again, and the corresponding bit positions are checked.
   - If all bits are `1`, the element is likely in the set (but not guaranteed).
   - If at least one bit is `0`, the element is definitely not in the set.

## Advantages of the Bloom Filter Algorithm

- It is a memory-efficient data structure.
- It can perform lookups in constant time.
- It requires less space than hash tables.

## Disadvantages of the Bloom Filter Algorithm

- It can give false positive results (it may incorrectly indicate that an element is in the set).
- Added elements cannot be removed (except in advanced variants).
- As the data structure fills up, the false positive rate increases.

## Applications of Bloom Filter

- Filtering malicious URLs in web browsers
- Caching in database queries
- Fast membership testing in large datasets
- Network security and monitoring systems

The Bloom Filter algorithm is a useful method for performing fast and lightweight membership tests, particularly in large-scale datasets.
