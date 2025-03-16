# Fermat’s Little Theorem

## What is Fermat’s Little Theorem?

**Fermat’s Little Theorem** is an important theorem related to prime numbers. It explains the properties of a prime number in modular arithmetic. The theorem states:

If **p** is a prime number and **a** is an integer not divisible by **p**, then:

\[
a^{p-1} \equiv 1 \ (\text{mod} \ p)
\]

This means that the remainder when **a** raised to the power of **p-1** is divided by **p** will be equal to 1. This theorem is widely used in number theory, encryption algorithms (especially RSA), and modular arithmetic operations.

## Explanation of the Theorem

- **p** is a prime number.
- **a** is an integer that is not divisible by **p**. In other words, **a % p != 0**.
- Fermat’s Little Theorem states that the remainder when **a** raised to the power of **p-1** is divided by **p** will be 1.

### Example

Let’s take **p = 5** and **a = 2**. According to Fermat’s Little Theorem:

\[
2^{5-1} = 2^4 = 16
\]

Now, let's find the remainder when 16 is divided by 5:

\[
16 \div 5 = 3 \ (\text{remainder} \ 1)
\]

This shows that Fermat’s Little Theorem holds true because **2^4 mod 5 = 1**.

## Applications of Fermat’s Little Theorem

1. **Cryptography Systems (RSA):**
   Fermat’s Little Theorem plays an important role in modular arithmetic operations used in the RSA algorithm. The RSA encryption algorithm relies on prime numbers and modular exponentiation.

2. **Fast Exponentiation:**
   Fermat’s Little Theorem accelerates the calculation of large exponents, especially when combined with modular arithmetic.

3. **Numerical Analysis and Cryptography:**
   Fermat’s Little Theorem is useful in number theory for various calculations and cryptographic applications.

## Important Notes on Fermat’s Little Theorem

- **Non-Prime p:** If **p** is not a prime number, Fermat’s Little Theorem may not hold. Therefore, the theorem is only valid for prime numbers.
- **Case where a is divisible by p:** If **a** is divisible by **p**, the theorem does not apply. It is important that **a** is not divisible by **p** for the theorem to hold.

## Conclusion

Fermat’s Little Theorem is a fundamental tool for operations involving prime numbers and modular arithmetic calculations. This theorem has a wide range of applications in areas like number theory and cryptography.
