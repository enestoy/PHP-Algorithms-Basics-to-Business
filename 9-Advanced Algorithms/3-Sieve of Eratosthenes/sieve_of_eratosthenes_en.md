# Sieve of Eratosthenes

The Sieve of Eratosthenes is an ancient and efficient algorithm used to quickly find all prime numbers up to a given number. This algorithm follows a specific method to identify prime numbers among the list of numbers.

## Key Principle of the Algorithm

1. **Initialization**:
   - Initially, we assume that all numbers from 2 up to the given number are prime.
   - These numbers are marked in an array initially.

2. **Marking**:
   - Starting with the first prime number, 2, we mark all of its multiples (4, 6, 8, ...) as non-prime, because these numbers are divisible by 2.
   - After marking the multiples of 2, we mark 2 itself as prime.
   - Next, we move to 3. All multiples of 3 (6, 9, 12, ...) are marked as non-prime because they are divisible by 3.
   - This process continues up to the given number n.

3. **Completion**:
   - Once the algorithm finishes, all numbers that are still marked as prime represent the prime numbers up to the given number.
   - The remaining numbers, which are divisible by 2, 3, or other prime numbers, are marked as non-prime.

## Steps of the Algorithm

1. **Step 1**: Add all numbers from 2 up to the given number to a list and mark them as prime initially.
2. **Step 2**: Select the first prime number (2).
3. **Step 3**: Mark all multiples of this prime number (except for the number itself) as non-prime.
4. **Step 4**: Select the next prime number and repeat step 3.
5. **Step 5**: Repeat step 4 up to the given number.
6. **Step 6**: Once the algorithm is completed, the remaining prime numbers are listed.

## Time Complexity

- **Time Complexity**: O(n log log n), where n is the given number. This makes the algorithm very fast.
- **Space Complexity**: O(n), as the algorithm requires space to mark prime numbers up to n.

## Example

When the given number is 20, the Sieve of Eratosthenes algorithm works as follows:

Initially, all numbers are assumed to be prime:  
`[2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]`

1. After marking multiples of 2 (4, 6, 8, 10, 12, 14, 16, 18, 20), the list becomes:
   `[2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]` (with multiples of 2 marked as non-prime).
2. After marking multiples of 3 (6, 9, 12, 15, 18), the list becomes:
   `[2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]` (with multiples of 3 marked as non-prime).
3. After marking multiples of 5 (10, 15, 20), the list becomes:
   `[2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]` (with multiples of 5 marked as non-prime).
4. After marking multiples of 7 (14), the list becomes:
   `[2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]` (with multiples of 7 marked as non-prime).

The remaining prime numbers are:  
`[2, 3, 5, 7, 11, 13, 17, 19]`

## Conclusion

The Sieve of Eratosthenes is one of the most efficient algorithms for finding prime numbers up to a given number. It can quickly generate a list of prime numbers even for large values of n.
