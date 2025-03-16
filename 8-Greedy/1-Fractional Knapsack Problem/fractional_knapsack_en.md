# Fractional Knapsack Problem

## Problem Definition

The Fractional Knapsack problem is about placing items in a knapsack with a limited capacity to maximize the total value. In this problem, items are divisible, meaning we can take a fraction of an item instead of the whole.

## Greedy Approach

The Fractional Knapsack problem can be solved using greedy algorithms. The greedy approach makes the best possible choice at each step to achieve the highest total value.

### Steps

1. **Sorting Items:** Items are sorted in decreasing order based on their value/weight ratio.
2. **Selecting Items:** Items with the highest value/weight ratio are prioritized and added to the knapsack.
3. **Capacity Check:** Items are added fully or partially based on the remaining knapsack capacity.
4. **Result:** The process continues until the knapsack is full, yielding the maximum possible value.

## Example Scenario

- **Items:**
  - Item 1: Weight = 10 kg, Value = 60
  - Item 2: Weight = 20 kg, Value = 100
  - Item 3: Weight = 30 kg, Value = 120
- **Knapsack Capacity:** 50 kg

### Solution Steps

1. Calculate the value/weight ratios:
   - Item 1: 60/10 = 6
   - Item 2: 100/20 = 5
   - Item 3: 120/30 = 4
2. Add items to the knapsack starting with the highest ratio:
   - Item 1 is fully added (10 kg, 60 value)
   - Item 2 is fully added (20 kg, 100 value)
   - 20 kg of Item 3 is added (20 kg, 80 value)
3. Total value = 60 + 100 + 80 = **240**

## Conclusion

The Fractional Knapsack problem can be optimally solved using greedy algorithms. Since items are divisible, the greedy approach ensures the best choice at each step to maximize the total value.
