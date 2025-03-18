<?php
/* 
Interview Question:

Consider a social network application where there are friendship connections between users. 
Each user is represented as a node, and the friendship connections are the edges connecting these nodes. 
Our goal is to quickly check if two users belong to the same friendship group, and to update these groups as new friendship connections are added.

Problem:
- There are n users.
- There are m friendship connections.
- Each friendship connection connects two users.
- We need to check if two users are in the same friendship group.
- We need to update the groups as new friendship connections are added.
 */

class UnionFind {
    private $parent = [];
    private $rank = [];

    // Constructor: Initializes each user as their own parent and sets the rank to 1.
    public function __construct($n) {
        for ($i = 0; $i < $n; $i++) {
            $this->parent[$i] = $i;
            $this->rank[$i] = 1;
        }
    }

    // Find: Finds the root node of a user and applies path compression.
    public function find($x) {
        if ($this->parent[$x] != $x) {
            $this->parent[$x] = $this->find($this->parent[$x]); // Path compression
        }
        return $this->parent[$x];
    }

    // Union: Merges the root nodes of two users and performs union by rank.
    public function union($x, $y) {
        $rootX = $this->find($x);
        $rootY = $this->find($y);

        if ($rootX != $rootY) {
            // Union by rank
            if ($this->rank[$rootX] > $this->rank[$rootY]) {
                $this->parent[$rootY] = $rootX;
            } elseif ($this->rank[$rootX] < $this->rank[$rootY]) {
                $this->parent[$rootX] = $rootY;
            } else {
                $this->parent[$rootY] = $rootX;
                $this->rank[$rootX]++;
            }
            return true; // Successfully merged
        }
        return false; // Already in the same group
    }

    // Checks if two users are in the same group.
    public function connected($x, $y) {
        return $this->find($x) == $this->find($y);
    }
}

// Example usage:
$n = 5; // 5 users
$uf = new UnionFind($n);

$uf->union(0, 1); // User 0 and 1 are friends
$uf->union(2, 3); // User 2 and 3 are friends
$uf->union(1, 4); // User 1 and 4 are friends

echo $uf->connected(0, 4) ? "In the same group\n" : "In different groups\n"; // In the same group
echo $uf->connected(2, 4) ? "In the same group\n" : "In different groups\n"; // In different groups

?>
