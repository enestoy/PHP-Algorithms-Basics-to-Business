# Bellman-Ford Algorithm

The Bellman-Ford algorithm is a graph algorithm used to find the shortest path from a source node to all other nodes. It differs from Dijkstra's algorithm in that it can handle graphs with negative weight edges. Bellman-Ford is particularly used for detecting negative weight cycles.

## Key Features

- **Negative Weight Edges**: Bellman-Ford can handle graphs with negative weight edges.
- **Negative Cycle Detection**: If a graph contains a negative weight cycle, Bellman-Ford can detect it.
- **Time Complexity**: O(V * E), where V is the number of vertices and E is the number of edges.

## How the Algorithm Works

1. **Initial Setup**: Initially, all distances to the nodes are set to infinity. The distance to the source node is set to 0.

2. **Edge Relaxation**: The algorithm repeatedly goes through all the edges and updates the distances for each edge. This process is repeated V-1 times (V is the number of vertices). This is sufficient because any node can be reached by at most V-1 edges.

3. **Result**: The algorithm attempts to find the shortest path for each edge. If, after V-1 iterations, an edge can still be relaxed, it means the graph contains a negative weight cycle.

## Step-by-Step Algorithm

1. **Initialization**:
   - Start by setting the distance from the source node to all other nodes to infinity.
   - Set the distance of the source node to 0.

2. **Relaxation (V-1 times)**:
   - Go through all the edges (start-node, end-node, weight).
   - If `distance[u] + weight < distance[v]`, update the distance.

3. **Negative Cycle Detection**:
   - After V-1 passes, if any edge still updates a distance, it indicates the presence of a negative cycle.

## Example

Consider the following graph:

```A --(5)--> B --(2)--> C --(-1)--> A```

- **Start Node**: `A`
- **Initial Distances**: `A=0, B=∞, C=∞`

In the first iteration, we check the edges:

- The edge `A -> B` makes the distance to B `5`.
- The edge `B -> C` makes the distance to C `7`.
- The edge `C -> A` makes the distance to A `6`.

In the second iteration:

- The edge `A -> B` is checked again, but `B` already has the shortest distance.
- The edge `B -> C` is checked again, but `C` already has the shortest distance.
- The edge `C -> A` is checked again, but the distance to `A` remains shorter, so no update occurs.

Finally, the negative cycle detection is performed. Since the graph contains a negative weight cycle, a negative cycle is detected.

## Conclusion

The Bellman-Ford algorithm is an excellent choice for processing graphs with negative weight edges. However, it is slower (O(V * E)) compared to Dijkstra's algorithm and may work better on more complex graph structures.
