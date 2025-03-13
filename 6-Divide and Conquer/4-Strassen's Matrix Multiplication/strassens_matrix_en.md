# Strassen's Matrix Multiplication Algorithm

The Strassen algorithm is a matrix multiplication algorithm that uses the **Divide and Conquer** approach. It is faster than the traditional matrix multiplication algorithm and is particularly effective for large matrices.

## Working Principle of the Strassen Algorithm

1. **Divide the Matrices:**
   - Two **n × n** matrices are divided into 8 submatrices of size **n/2 × n/2**.

2. **Perform Seven Special Multiplications:**
   - While the traditional method performs 8 multiplications, Strassen uses 7 special multiplications.
   - The special multiplication operations are as follows:
     - **M1 = (A11 + A22) * (B11 + B22)**
     - **M2 = (A21 + A22) * B11**
     - **M3 = A11 * (B12 - B22)**
     - **M4 = A22 * (B21 - B11)**
     - **M5 = (A11 + A12) * B22**
     - **M6 = (A21 - A11) * (B11 + B12)**
     - **M7 = (A12 - A22) * (B21 + B22)**

3. **Calculate the Result Matrix:**
   - The result matrix is formed by adding the submatrices:
     - **C11 = M1 + M4 - M5 + M7**
     - **C12 = M3 + M5**
     - **C21 = M2 + M4**
     - **C22 = M1 - M2 + M3 + M6**

4. **Recursive Application:**
   - If the matrix size is small (e.g., 2×2), direct multiplication is performed.
   - For large matrices, the same process is applied recursively to the submatrices.

## Time Complexity of Strassen Algorithm

- **Traditional matrix multiplication:** O(n³)
- **Strassen matrix multiplication:** O(n^2.81)

## Advantages of the Strassen Algorithm

- **Faster than traditional multiplication methods.**
- **Provides performance advantages for large matrices.**
- **It is suitable for parallel processing due to its recursive nature.**

## Disadvantages of the Strassen Algorithm

- **Requires more memory.**
- **Matrix dimensions must be a power of 2.**
- **For small matrices, traditional methods may be more efficient.**

The Strassen algorithm is an important algorithm that saves time when multiplying large matrices.
