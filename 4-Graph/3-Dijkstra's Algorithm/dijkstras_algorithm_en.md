# What is Dijkstra's Algorithm?

Dijkstra's Algorithm is a graph algorithm used to find the shortest paths from a source node to all other nodes. It works on weighted and directed graphs. It is used to calculate the least-cost paths.

## How the Algorithm Works

1. **Selecting the Starting Point**: The algorithm starts by selecting the source node.
2. **Assigning Distance Values**: The distance of the source node is assigned as 0, and the distance of all other nodes is considered to be infinity.
3. **Selecting the Next Node to Visit**: The node with the smallest distance is selected and visited.
4. **Updating the Neighboring Nodes**: The distances to the neighboring nodes of the visited node are calculated.
5. **Continuing Until All Nodes Are Visited**: The process continues until all nodes are visited.

## Steps of the Algorithm

1. Determine the starting node and set its distance to 0.
2. Initialize the distances of all other nodes to infinity.
3. Select the node with the lowest distance from the unvisited nodes.
4. Update the distances of the selected node’s neighbors.
5. Mark the selected node as visited.
6. Repeat the process until all nodes have been visited.

## Applications

- **Map and Navigation Systems**: Used to find the shortest path between two points.
- **Network Routing Protocols**: Used to optimize network traffic.
- **Game Development**: Determines the shortest path for characters or objects to reach a target.

Dijkstra's Algorithm does not work on graphs with negative weight edges. In such cases, other algorithms like Bellman-Ford should be used.
