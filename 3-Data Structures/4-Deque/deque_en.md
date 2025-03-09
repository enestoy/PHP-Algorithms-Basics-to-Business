# Deque (Double Ended Queue) Data Structure

A Deque (Double Ended Queue) is a data structure where elements can be added and removed from both ends. In other words, elements can be inserted and deleted from both the front and the back of the queue.

A deque can be considered a combination of both Queue and Stack data structures. While a Queue only allows insertion at the back, a Deque allows insertion at both ends. Similarly, like a Stack, elements in a Deque can be removed from either end.

## Basic Elements of a Deque

1. **Enqueue Front (Insert at Front):**
    - Adds an element to the front of the deque.

2. **Enqueue Back (Insert at Back):**
    - Adds an element to the back of the deque.

3. **Dequeue Front (Remove from Front):**
    - Removes an element from the front of the deque.

4. **Dequeue Back (Remove from Back):**
    - Removes an element from the back of the deque.

5. **Peek Front (View Front Element):**
    - Retrieves the front element without removing it.

6. **Peek Back (View Back Element):**
    - Retrieves the back element without removing it.

7. **isEmpty (Is Empty?):**
    - Checks whether the deque is empty.

## Applications of Deque

- **Data flow control:** Deques are used in scenarios where data flow needs to be controlled in both directions.
- **Combination of LIFO and FIFO:** Since it supports both FIFO (First In, First Out) and LIFO (Last In, First Out) principles, it is suitable for complex data operations.
- **Navigation in nested menus:** Deques can be used for forward and backward navigation in UI menus.

## Fundamental Deque Operations

1. **Enqueue Front:** Adds a new element to the front of the deque.
2. **Enqueue Back:** Adds a new element to the back of the deque.
3. **Dequeue Front:** Removes and returns the front element.
4. **Dequeue Back:** Removes and returns the back element.
5. **Peek Front:** Returns the front element without removing it.
6. **Peek Back:** Returns the back element without removing it.
7. **isEmpty:** Checks whether the deque is empty.

## Conclusion

A deque allows operations from both ends, making it a highly flexible and efficient data structure. Its ability to function as both a FIFO and LIFO structure makes it useful in various applications. The versatility of deques enables efficient solutions in many algorithms and data processing scenarios.
