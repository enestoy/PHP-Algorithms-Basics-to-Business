# Reservoir Sampling Algorithm

Reservoir Sampling is an algorithm used to select a fixed number of items from a large or unknown-sized data stream. This algorithm is particularly useful when we cannot load the entire data into memory.

## Key Concept

In a data stream, random samples are selected continuously to keep the probability of selecting each element equal. This is an effective method, especially when the size of the data is unknown or very large.

## Steps of the Algorithm

1. **Initial State:**
   - In the first step, the first `k` items (the number of samples) are directly added to the reservoir.

2. **As More Data Arrives:**
   - When the `k+1`th item arrives, a random number `r` (between 0 and `i`, where `i` is the current item number) is generated.
   - If `r` is smaller than `k`, a random item from the reservoir is selected, and this new item replaces it.

3. **Result:**
   - Once the entire data stream is processed, the `k` items in the reservoir represent a randomly selected sample from the data stream.

## Example

- Suppose we want to select 3 items (k=3) from the data stream.
- The first 3 items are directly added to the reservoir: `[X1, X2, X3]`.
- When the 4th item `X4` arrives:
  - A random number is generated, e.g., `r = 2`.
  - If `r < k`, an item is removed from the reservoir and replaced with `X4`.

These steps continue until the data stream is complete.

## Advantages

- **Memory Efficiency**: Only `k` items are stored, which saves memory when working with large datasets.
- **Equal Selection Probability**: Each data item has an equal chance of being selected.
- **Continuous Data Stream**: You can perform sampling dynamically when the length of the data stream is unknown at the start.

## Applications

- Large dataset sampling (data analytics).
- Stream data analysis.
- Online algorithms.
