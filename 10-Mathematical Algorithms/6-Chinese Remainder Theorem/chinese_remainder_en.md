# Chinese Remainder Theorem (CRT)

## What is the Chinese Remainder Theorem?

The **Chinese Remainder Theorem** (CRT) is an important theorem related to modular arithmetic. This theorem allows the combination of systems that can be solved with different moduli. In other words, it is used to find a single solution for a system of modular equations.

Mathematically, the **Chinese Remainder Theorem** is expressed as follows:

Given a system of modular equations:

\[
\begin{cases}
x \equiv a_1 \ (\text{mod} \ m_1) \\
x \equiv a_2 \ (\text{mod} \ m_2) \\
\vdots \\
x \equiv a_n \ (\text{mod} \ m_n)
\end{cases}
\]

Each of these equations involves different moduli, so these equations can be solved under a single modulus. In other words, the solution to these equations can be combined into a specific value of **x**.

## Basic Conditions

For the Chinese Remainder Theorem to be applicable, the moduli must be **coprime** (i.e., pairwise relatively prime). That is, for each modulus **m1, m2, ..., mn**:

\[
\text{gcd}(m_i, m_j) = 1 \quad \text{(i ≠ j)}
\]

Here, **gcd** stands for the **Greatest Common Divisor**. If the moduli are not coprime, the theorem cannot be applied.

## How the Theorem Works

The basic idea behind the Chinese Remainder Theorem is to gradually combine the solutions to the given modular equations. First, a solution is found for each equation using the relationships between the moduli, and then these solutions are combined.

### Steps

1. **Calculate the product of the moduli:**
   \[
   M = m_1 \times m_2 \times \cdots \times m_n
   \]
   Here, **M** is the product of all the moduli.

2. **Calculate the helper variables for each modulus:**
   For each modulus, calculate **M_i**:
   \[
   M_i = \frac{M}{m_i}
   \]
   This is the number obtained by dividing the total product of the moduli by the modulus for each equation.

3. **Calculate the modular inverse for each M_i:**
   For each **M_i**, find its modular inverse (**N_i**):
   \[
   M_i \times N_i \equiv 1 \ (\text{mod} \ m_i)
   \]

4. **Combine the solutions:**
   The solutions are combined as follows:
   \[
   x = \sum_{i=1}^{n} a_i \times M_i \times N_i \ (\text{mod} \ M)
   \]
   Here, **a_i** is the solution to each modular equation.

## Example

Suppose we want to solve the following system of modular equations:

\[
\begin{cases}
x \equiv 2 \ (\text{mod} \ 3) \\
x \equiv 3 \ (\text{mod} \ 5) \\
x \equiv 1 \ (\text{mod} \ 7)
\end{cases}
\]

### Step 1: Calculate the product of the moduli

\[
M = 3 \times 5 \times 7 = 105
\]

### Step 2: Calculate the helper variables

\[
M_1 = \frac{105}{3} = 35, \quad M_2 = \frac{105}{5} = 21, \quad M_3 = \frac{105}{7} = 15
\]

### Step 3: Calculate the modular inverses

- **Modular inverse of 35 mod 3:** We need to find a number that, when multiplied by 35, gives a remainder of 1 when divided by 3. **35 mod 3 = 2**, so the modular inverse of 35 mod 3 is 2.
- **Modular inverse of 21 mod 5:** We need to find a number that, when multiplied by 21, gives a remainder of 1 when divided by 5. **21 mod 5 = 1**, so the modular inverse of 21 mod 5 is 1.
- **Modular inverse of 15 mod 7:** We need to find a number that, when multiplied by 15, gives a remainder of 1 when divided by 7. **15 mod 7 = 1**, so the modular inverse of 15 mod 7 is 1.

### Step 4: Combine the solutions

\[
x = 2 \times 35 \times 2 + 3 \times 21 \times 1 + 1 \times 15 \times 1
\]
\[
x = 140 + 63 + 15 = 218
\]
Now, take the result modulo **105**:
\[
x \equiv 218 \ (\text{mod} \ 105) = 218 - 2 \times 105 = 218 - 210 = 8
\]

Thus, the solution is **x = 8**.

## Applications of the Chinese Remainder Theorem

- **Cryptography:** The Chinese Remainder Theorem is used in encryption algorithms like RSA to speed up computations with large numbers.
- **Numerical Calculations:** It is used to make modular calculations with large numbers more efficient.
- **Various Algorithms:** It is also an effective method for solving other mathematical problems.

## Conclusion

The Chinese Remainder Theorem is one of the powerful tools in modular arithmetic and number theory. By combining equations with different moduli into a single equation, it provides significant advantages when working with large numbers.
