# Huffman Coding Algorithm

## Problem Definition

Huffman Coding is a technique used in data compression algorithms. It creates variable-length bit sequences based on character frequencies to reduce the storage space required for data.

## Greedy Approach

The Huffman algorithm constructs a tree by merging the two lowest-frequency nodes at each step. As a result, more frequently used characters are represented with shorter codes, while less frequent characters are assigned longer codes.

### Steps

1. **Determine Character Frequencies:** Count the occurrences of each character in the input text.
2. **Create a Min Heap (Priority Queue):** Generate a list of nodes sorted by increasing frequency.
3. **Build the Tree Structure:** Select the two smallest nodes, merge them, and create a new node.
4. **Assign Codes:** Assign `0` to the left branch and `1` to the right branch to create bit sequences for each character.
5. **Compress the Data:** Replace characters with their corresponding bit sequences to generate the compressed data.

## Example Scenario

### Input

- **Text:** "BABAABB"

### Frequencies

| Character | Frequency |
|-----------|-----------|
| A         | 3         |
| B         | 4         |

### Huffman Tree Construction

1. Merge nodes `A (3)` and `B (4)`.
2. Place `A` on the left and `B` on the right of the new node.
3. Assign code `0` to `A` and `1` to `B`.

### Encoding Result

| Character | Huffman Code |
|-----------|-------------|
| A         | 0           |
| B         | 1           |

### Compressed Output

Text: `BABAABB`  
Huffman Code: `1010101`

## Conclusion

Huffman Coding is widely used in text compression algorithms (e.g., ZIP, JPEG). Using a greedy approach, it ensures minimal bit-length representation by making the best choice at each step.
