<?php

class Queue
{
    private $queue = []; // Array representing the queue

    // Adds an element to the queue
    public function enqueue($element)
    {
        array_push($this->queue, $element); // Adds an element to the end of the queue
    }

    // Removes an element from the queue
    public function dequeue()
    {
        if ($this->isQueueEmpty()) {
            return "The queue is empty!"; // Returns an error message if the queue is empty
        }
        return array_shift($this->queue); // Removes the element at the front of the queue
    }

    // Shows the element at the front of the queue
    public function frontElement()
    {
        if ($this->isQueueEmpty()) {
            return "The queue is empty!"; // Returns an error message if the queue is empty
        }
        return $this->queue[0]; // Returns the element at the front of the queue
    }

    // Checks if the queue is empty
    public function isQueueEmpty()
    {
        return empty($this->queue); // Returns true if the queue is empty, otherwise false
    }

    // Prints the contents of the queue
    public function printQueue()
    {
        if ($this->isQueueEmpty()) {
            echo "The queue is empty!\n"; // Displays a message if the queue is empty
            return;
        }

        foreach ($this->queue as $element) {
            echo $element . " "; // Prints all elements in the queue
        }
        echo "<br>";
    }
}

// Example usage
$queue = new Queue();
$queue->enqueue(10); // Adds 10 to the queue
$queue->enqueue(20); // Adds 20 to the queue
$queue->enqueue(30); // Adds 30 to the queue

$queue->printQueue(); // Queue: 10 20 30

echo "Dequeued Element: " . $queue->dequeue() . "<br>"; // 10 is dequeued
$queue->printQueue(); // Queue: 20 30

echo "Front Element: " . $queue->frontElement() . "<br>"; // 20
?>

