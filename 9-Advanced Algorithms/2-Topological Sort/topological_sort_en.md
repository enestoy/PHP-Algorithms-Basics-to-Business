# Topological Sort

Topological Sort is an algorithm that can only be applied to directed acyclic graphs (DAGs). This algorithm is used to sort the nodes of a graph, and the sorting is done in an order that respects the direction of each edge, from the start to the end.

## Key Features of the Algorithm

1. **Directed Acyclic Graph (DAG)**:
   - Topological Sort can only sort directed acyclic graphs (DAGs). A directed acyclic graph has no cycles.
   - If there is a cycle in the graph, topological sorting is not possible.

2. **Sorting Property**:
   - Each node appears only after its dependent nodes in the order.
   - The Topological Sort ensures that each edge appears in a linear order in the graph.

## Working Principle of the Algorithm

1. **Initialization**:
   - First, we identify the nodes with no incoming edges (in-degree). In-degree refers to the number of incoming edges to a node.
   - Nodes with an in-degree of zero can be included in the sorting as there are no other nodes that need to be sorted before them.

2. **Step 1**: Add the nodes with in-degree zero to a queue.
3. **Step 2**: Remove the node at the front of the queue and add it to the sorting list. Then, remove all edges connected to this node and reduce the in-degrees of the connected nodes by one.
4. **Step 3**: If there are any nodes with in-degree zero, add them to the queue.
5. **Step 4**: Repeat steps 2 and 3 until the queue is empty.
6. **Completion**:
   - When the queue is empty, the sorting is complete. If there are still nodes with non-zero in-degrees, there is a cycle in the graph and topological sorting is not possible.

## Steps of the Algorithm

- **Step 1**: Find the nodes with in-degree zero and add them to the queue.
- **Step 2**: Remove the node at the front of the queue and add it to the sorting list.
- **Step 3**: Remove all edges connected to the node and reduce the in-degrees of the connected nodes by one.
- **Step 4**: Add any new nodes with in-degree zero to the queue.
- **Step 5**: Repeat the process until the queue is empty.
- **Step 6**: If there are still nodes with non-zero in-degrees, a cycle exists, and sorting is not possible.

## Time Complexity

- **Time Complexity**: O(V + E), where V represents the number of nodes and E represents the number of edges.
- **Space Complexity**: O(V), as all nodes and edges of the graph are stored in memory.

## Example

Consider the following DAG:

A → B → D ↓ ↑ C → E

- Initially, the nodes with in-degree zero are A and C.
- We add A to the sorting list and remove the edge to B. B now has in-degree zero, so we add it to the queue.
- We add C to the sorting list and remove the edge to E. E now has in-degree zero, so we add it to the queue.
- We add B (the front of the queue) to the sorting list and remove the edge to D. D now has in-degree zero, so we add it to the queue.
- We add E (the front of the queue) to the sorting list.
- We add D (the front of the queue) to the sorting list.
- The final sorting order is: A → C → B → E → D.

## Conclusion

Topological Sort is particularly useful for resolving dependencies. For example, it is used in task scheduling, project planning, and compiler optimizations.
