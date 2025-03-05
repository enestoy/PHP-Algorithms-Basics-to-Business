# Linear Search Algorithm

## What is Linear Search?

Linear Search is one of the simplest search algorithms. It checks each element in a list (or array) sequentially from the beginning to the end to find a specific element. If the target element is found, its index is returned. If not, it typically returns `-1` or a "Not Found" message.

## Working Principle

1. Start from the first element of the list.
2. Compare the target element with each element in the list.
3. If a match is found, return the index.
4. If no match is found after checking all elements, return `-1`.

## Time Complexity

- **Worst case:** O(n) → The element is at the end of the list or not present, requiring a full scan.
- **Best case:** O(1) → The element is the first one, found immediately.
- **Average case:** O(n) → The element is in a random position, requiring a search through half of the list on average.

## Advantages

✅ Simple and easy to understand.  
✅ Ideal for small lists.  
✅ No need for the list to be sorted.  

## Disadvantages

❌ Slow for large datasets.  
❌ Less efficient compared to algorithms like Binary Search.  

---
This method is suitable for small-scale searches, but for larger lists and datasets, more efficient algorithms should be considered.
