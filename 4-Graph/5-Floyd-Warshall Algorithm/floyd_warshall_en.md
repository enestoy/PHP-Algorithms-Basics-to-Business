# Floyd-Warshall Algorithm

The Floyd-Warshall algorithm is used to find the shortest paths between all pairs of nodes in a graph. This algorithm can detect negative weight edges and negative weight cycles. It is based on dynamic programming and calculates the shortest paths for every pair of nodes.

## Key Features

- **Shortest Path for All Pairs**: The Floyd-Warshall algorithm finds the shortest paths between every pair of nodes (source-destination).
- **Negative Weight Edges**: It can handle graphs with negative weight edges.
- **Negative Cycle Detection**: If a graph contains a negative weight cycle, the algorithm can detect it.
- **Time Complexity**: O(V^3), where V is the number of vertices.

## How the Algorithm Works

1. **Initial Setup**: Initially, we set the distances between all nodes. If there is an edge between two nodes, we set the distance to the weight of that edge. If no edge exists, the distance is set to infinity.

2. **Dynamic Programming**: Using dynamic programming, we check if the shortest path between each pair of nodes can be improved by passing through a third node. This process is done for each node in the graph.

3. **Result**: The result gives the shortest path and distance between every pair of nodes.

## Step-by-Step Algorithm

1. **Initialization**:
   - Set the initial distances between all nodes. If there is an edge, set the distance to the edge weight, otherwise set it to infinity.
   - Set the distance from each node to itself as 0.

2. **Triple Nested Loop**:
   - For every pair of nodes (u, v), check if the shortest path can be found by passing through a third node (k).
   - If the path from u to v through k is shorter than the direct path from u to v, update the distance.

3. **Negative Cycle Detection**:
   - If the distance from any node to itself becomes negative, it indicates the presence of a negative cycle in the graph.

## Example

Consider the following graph:

```A --(3)--> B --(1)--> C --(2)--> A```

In the first step, the distances are as follows:

- `A -> B: 3`
- `B -> C: 1`
- `C -> A: 2`

In Floyd-Warshall, for every pair of nodes, we check if a shorter path can be found through a third node. If a shorter path is found, we update the distance.

## Conclusion

The Floyd-Warshall algorithm is an excellent choice for finding the shortest paths between all pairs of nodes. However, with a time complexity of O(V^3), it may not be efficient for large graph structures. Nevertheless, it is valuable because it can detect both negative weight edges and negative cycles.
