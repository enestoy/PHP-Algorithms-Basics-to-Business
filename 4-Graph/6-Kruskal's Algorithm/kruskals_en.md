# Kruskal's Algorithm

Kruskal's algorithm is used to find the **minimum spanning tree (MST)** of a graph. This algorithm works by sorting the edges of the graph and selecting the smallest weighted edges to build the tree.

## Key Features

- **Minimum Spanning Tree (MST)**: The minimum spanning tree of a graph is a tree that connects all the vertices of the graph with the minimum total edge weight.
- **Weighted Edges**: Kruskal's algorithm operates on graphs with weighted edges.
- **Time Complexity**: O(E log E), where E represents the number of edges. This complexity arises from the sorting of the edges and the union-find operations.

## How the Algorithm Works

1. **Sort the Edges**: Initially, the edges of the graph are sorted by their weights.
2. **Union-Find**: Then, for each edge, if the starting and ending vertices of the edge do not belong to the same set, the edge is added to the tree. As edges are added, the sets of connected vertices are merged.
3. **Tree Completion**: This process continues until all vertices are connected.

## Step-by-Step Algorithm

1. **Initialization**:
   - Sort the edges of the graph in increasing order of weight.

2. **Process the Edges**:
   - For each edge, check if its starting and ending vertices are in different sets. If they are, select the edge and unite the two sets.

3. **Result**:
   - The result is the minimum spanning tree (MST).

## Example

Consider the following graph:

```A --(1)--> B --(4)--> C --(2)--> D --(3)--> A```

In the first step, we sort the edges by weight:

- A-B: 1
- C-D: 2
- D-A: 3
- B-C: 4

Next, we combine the edges to form the minimum spanning tree.

## Conclusion

Kruskal's algorithm always finds the minimum spanning tree and inspects each edge only once. This algorithm is especially useful in problems related to **tree structures** and **networks**. However, since the edges must be sorted for the algorithm to work efficiently, the time complexity increases when the graph has a large number of edges.
