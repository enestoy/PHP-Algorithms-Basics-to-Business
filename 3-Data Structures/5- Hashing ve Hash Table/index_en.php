<?php

class HashTable
{
    private $table; // Hash table

    // HashTable constructor
    public function __construct($size)
    {
        $this->table = array_fill(0, $size, null); // Initialize the hash table
    }

    // Hash function (Converts the key to an index)
    private function hashFunction($key)
    {
        return crc32($key) % count($this->table); // Generates a hash code using CRC32
    }

    // Adds a key-value pair to the hash table
    public function add($key, $value)
    {
        $index = $this->hashFunction($key); // Get the hash code of the key
        if ($this->table[$index] !== null) {
            // If there is a collision, resolve using chaining
            $this->table[$index][] = [$key, $value];
        } else {
            // If there is no collision, add directly
            $this->table[$index] = [$key, $value];
        }
    }

    // Retrieves the value corresponding to the key
    public function get($key)
    {
        $index = $this->hashFunction($key); // Get the hash code of the key
        if ($this->table[$index] !== null) {
            // If the slot is occupied and chaining is used, search for the key
            foreach ($this->table[$index] as $element) {
                if ($element[0] === $key) {
                    return $element[1]; // Return the value corresponding to the key
                }
            }
        }
        return null; // Return null if the value is not found
    }

    // Deletes the key-value pair
    public function delete($key)
    {
        $index = $this->hashFunction($key); // Get the hash code of the key
        if ($this->table[$index] !== null) {
            // If the slot is occupied and chaining is used, search for the key
            foreach ($this->table[$index] as $i => $element) {
                if ($element[0] === $key) {
                    unset($this->table[$index][$i]); // Delete the key-value pair
                    return true;
                }
            }
        }
        return false; // Return false if the key-value pair is not found
    }

    // Prints the contents of the hash table
    public function printTable()
    {
        foreach ($this->table as $index => $values) {
            if ($values !== null) {
                echo "Index $index: ";
                if (is_array($values)) {
                    foreach ($values as $element) {
                        echo "[Key: " . $element[0] . ", Value: " . $element[1] . "] ";
                    }
                } else {
                    echo "[Key: " . $values[0] . ", Value: " . $values[1] . "]";
                }
                echo "<br>";
            }
        }
    }
}

// Example usage
$hashTable = new HashTable(10); // Create a hash table with 10 slots

// Adding data
$hashTable->add("Key1", "Value1");
$hashTable->add("Key2", "Value2");
$hashTable->add("Key3", "Value3");
$hashTable->add("Key4", "Value4");

// Print the table
$hashTable->printTable();

// Retrieve value by key
echo "Value corresponding to Key2: " . $hashTable->get("Key2") . "<br>"; // Outputs Value2

// Delete a key-value pair
$hashTable->delete("Key2");

// Print the table again
$hashTable->printTable();

?>
