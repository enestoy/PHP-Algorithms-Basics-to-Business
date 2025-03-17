<?php

class RaftNode {
    private int $nodeId;
    private array $allNodes;
    private int $leaderId;

    public function __construct(int $nodeId, array $allNodes) {
        $this->nodeId = $nodeId;
        $this->allNodes = $allNodes;
        $this->leaderId = -1; // No leader initially
    }

    // Function to start the leader election process
    public function electLeader(): void {
        $candidateId = $this->nodeId;
        
        foreach ($this->allNodes as $node) {
            if ($node > $candidateId) {
                $candidateId = $node;
            }
        }
        
        $this->leaderId = $candidateId;
        echo "Node {$this->nodeId}: Leader selected as {$this->leaderId}.\n";
    }

    // Function to return the current leader
    public function getLeader(): int {
        return $this->leaderId;
    }
}

// Simulating a network by creating nodes
$nodes = [1, 2, 3, 4, 5];
$raftNodes = [];

foreach ($nodes as $id) {
    $raftNodes[$id] = new RaftNode($id, $nodes);
}

// Each node starts the leader election
foreach ($raftNodes as $node) {
    $node->electLeader();
}

?>
