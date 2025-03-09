<?php

// Class representing a Max Heap data structure
class MaxHeap
{
    private $array = []; // Array representing the heap

    // Adds a new element to the heap
    public function insert($value)
    {
        $this->array[] = $value; // Add the element to the end of the array
        $this->heapifyUp(); // Maintain the heap property
    }

    // Removes and returns the root element (the largest element)
    public function removeRoot()
    {
        if ($this->isEmpty()) {
            throw new Exception("Heap is empty, no element to remove.");
        }

        $root = $this->array[0]; // Get the root element
        $lastElement = array_pop($this->array); // Remove the last element from the array

        if (!$this->isEmpty()) {
            $this->array[0] = $lastElement; // Move the last element to the root
            $this->heapifyDown(); // Maintain the heap property
        }

        return $root; // Return the root element
    }

    // Checks if the heap is empty
    public function isEmpty()
    {
        return empty($this->array);
    }

    // Prints the heap to the screen
    public function printHeap()
    {
        echo "Heap: " . implode(", ", $this->array) . "\n";
    }

    // Maintains the heap property by moving the element up the tree
    private function heapifyUp()
    {
        $index = count($this->array) - 1; // The index of the last inserted element

        while ($index > 0) {
            $parentIndex = intval(($index - 1) / 2); // The index of the parent element

            // If the parent is smaller than the current element, swap them
            if ($this->array[$parentIndex] < $this->array[$index]) {
                $this->swap($parentIndex, $index);
                $index = $parentIndex; // Update the index
            } else {
                break; // Heap property is maintained, exit the loop
            }
        }
    }

    // Maintains the heap property by moving the root element down the tree
    private function heapifyDown()
    {
        $index = 0; // The index of the root element
        $length = count($this->array);

        while (true) {
            $leftChildIndex = 2 * $index + 1; // The index of the left child
            $rightChildIndex = 2 * $index + 2; // The index of the right child
            $largestIndex = $index; // Assume the largest element is at the root

            // Check the left child
            if ($leftChildIndex < $length && $this->array[$leftChildIndex] > $this->array[$largestIndex]) {
                $largestIndex = $leftChildIndex;
            }

            // Check the right child
            if ($rightChildIndex < $length && $this->array[$rightChildIndex] > $this->array[$largestIndex]) {
                $largestIndex = $rightChildIndex;
            }

            // If the largest element is not at the root, swap them
            if ($largestIndex !== $index) {
                $this->swap($index, $largestIndex);
                $index = $largestIndex; // Update the index
            } else {
                break; // Heap property is maintained, exit the loop
            }
        }
    }

    // Swaps the elements at two indices
    private function swap($index1, $index2)
    {
        $temp = $this->array[$index1];
        $this->array[$index1] = $this->array[$index2];
        $this->array[$index2] = $temp;
    }
}

// Example Usage
$maxHeap = new MaxHeap();

// Add elements to the heap
$maxHeap->insert(10);
$maxHeap->insert(20);
$maxHeap->insert(15);
$maxHeap->insert(30);
$maxHeap->insert(5);

// Print the heap
$maxHeap->printHeap(); // Heap: 30, 20, 15, 10, 5

// Remove and print the root element
echo "Removed Root: " . $maxHeap->removeRoot() . "\n"; // Removed Root: 30
$maxHeap->printHeap(); // Heap: 20, 10, 15, 5

// Remove and print the new root element
echo "Removed Root: " . $maxHeap->removeRoot() . "\n"; // Removed Root: 20
$maxHeap->printHeap(); // Heap: 15, 10, 5
?>
