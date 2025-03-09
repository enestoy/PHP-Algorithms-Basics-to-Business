<?php

class Stack
{
    private $stack = []; // Array representing the stack

    // Adds an element to the stack
    public function pushElement($element)
    {
        array_push($this->stack, $element); // Adds a new element to the stack
    }

    // Removes an element from the stack
    public function popElement()
    {
        if ($this->isStackEmpty()) {
            return "The stack is empty!"; // Returns error message if the stack is empty
        }
        return array_pop($this->stack); // Removes the top element from the stack
    }

    // Shows the top element of the stack
    public function topElement()
    {
        if ($this->isStackEmpty()) {
            return "The stack is empty!"; // Returns error message if the stack is empty
        }
        return end($this->stack); // Returns the top element of the stack
    }

    // Checks if the stack is empty
    public function isStackEmpty()
    {
        return empty($this->stack); // Returns true if the stack is empty, otherwise false
    }

    // Prints the contents of the stack
    public function printStack()
    {
        if ($this->isStackEmpty()) {
            echo "The stack is empty!\n"; // Shows message if the stack is empty
            return;
        }

        foreach ($this->stack as $element) {
            echo $element . " "; // Prints all elements in the stack
        }
        echo "\n";
    }
}

// Example usage
$stack = new Stack();
$stack->pushElement(10); // Adds 10 to the stack
$stack->pushElement(20); // Adds 20 to the stack
$stack->pushElement(30); // Adds 30 to the stack

$stack->printStack(); // Stack: 10 20 30

echo "Popped Element: " . $stack->popElement() . "\n"; // Pops 30
$stack->printStack(); // Stack: 10 20

echo "Top Element: " . $stack->topElement() . "\n"; // 20
?>
