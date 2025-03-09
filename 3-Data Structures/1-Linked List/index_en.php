<?php

class Node
{
    public $data;    // Data in the node
    public $next;    // Pointer to the next node

    // When the node is created, data and the next pointer are initialized
    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

class LinkedList
{
    public $head; // Points to the first element in the list

    // Initializes the linked list
    public function __construct()
    {
        $this->head = null;
    }

    // Adds an element to the list (adds to the end)
    public function addElement($data)
    {
        $newNode = new Node($data);

        // If the list is empty, the new node becomes the first element
        if ($this->head === null) {
            $this->head = $newNode;
        } else {
            $lastNode = $this->head;
            while ($lastNode->next !== null) {
                $lastNode = $lastNode->next; // Reach the last node
            }
            $lastNode->next = $newNode; // Add the new node at the end
        }
    }

    // Prints the list to the screen
    public function printList()
    {
        if ($this->head === null) {
            echo "The list is empty.\n";
            return;
        }

        $currentNode = $this->head;
        while ($currentNode !== null) {
            echo $currentNode->data . " -> ";
            $currentNode = $currentNode->next;
        }
        echo "End.\n";
    }

    // Searches for a specific value in the list
    public function searchElement($searchData)
    {
        $currentNode = $this->head;
        while ($currentNode !== null) {
            if ($currentNode->data === $searchData) {
                return true; // Element found
            }
            $currentNode = $currentNode->next;
        }
        return false; // Element not found
    }
}

// Example usage:
$linkedList = new LinkedList();

// Adding elements
$linkedList->addElement(10);
$linkedList->addElement(20);
$linkedList->addElement(30);

// Printing the list
$linkedList->printList(); // 10 -> 20 -> 30 -> End.

// Searching for an element
$isFound = $linkedList->searchElement(20);
echo $isFound ? "Element found.\n" : "Element not found.\n"; // Element found.
?>
