<?php

class Deque
{
    private $deque = []; // Array representing the deque

    // Adds an element to the front of the deque
    public function addFront($element)
    {
        array_unshift($this->deque, $element); // Adds an element to the front of the deque
    }

    // Adds an element to the back of the deque
    public function addBack($element)
    {
        array_push($this->deque, $element); // Adds an element to the back of the deque
    }

    // Removes an element from the front of the deque
    public function removeFront()
    {
        if ($this->isDequeEmpty()) {
            return "The deque is empty!"; // Returns an error message if the deque is empty
        }
        return array_shift($this->deque); // Removes the element from the front of the deque
    }

    // Removes an element from the back of the deque
    public function removeBack()
    {
        if ($this->isDequeEmpty()) {
            return "The deque is empty!"; // Returns an error message if the deque is empty
        }
        return array_pop($this->deque); // Removes the element from the back of the deque
    }

    // Shows the element at the front of the deque
    public function frontElement()
    {
        if ($this->isDequeEmpty()) {
            return "The deque is empty!"; // Returns an error message if the deque is empty
        }
        return $this->deque[0]; // Returns the element at the front of the deque
    }

    // Shows the element at the back of the deque
    public function backElement()
    {
        if ($this->isDequeEmpty()) {
            return "The deque is empty!"; // Returns an error message if the deque is empty
        }
        return end($this->deque); // Returns the element at the back of the deque
    }

    // Checks if the deque is empty
    public function isDequeEmpty()
    {
        return empty($this->deque); // Returns true if the deque is empty, otherwise false
    }

    // Prints the contents of the deque
    public function printDeque()
    {
        if ($this->isDequeEmpty()) {
            echo "The deque is empty!\n"; // Displays a message if the deque is empty
            return;
        }

        foreach ($this->deque as $element) {
            echo $element . " "; // Prints all elements in the deque
        }
        echo "\n";
    }
}

// Example usage
$deque = new Deque();
$deque->addFront(10); // Adds 10 to the front of the deque
$deque->addBack(20); // Adds 20 to the back of the deque
$deque->addFront(30); // Adds 30 to the front of the deque
$deque->addBack(40); // Adds 40 to the back of the deque

$deque->printDeque(); // Deque: 30 10 20 40

echo "Element Removed from Front: " . $deque->removeFront() . "\n"; // 30 is removed
$deque->printDeque(); // Deque: 10 20 40

echo "Element Removed from Back: " . $deque->removeBack() . "\n"; // 40 is removed
$deque->printDeque(); // Deque: 10 20

echo "Front Element: " . $deque->frontElement() . "\n"; // 10
echo "Back Element: " . $deque->backElement() . "\n"; // 20
?>
