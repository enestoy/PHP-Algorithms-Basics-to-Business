# Prim's Algorithm (Minimum Spanning Tree - MST)

## Problem Definition

Prim’s Algorithm is a **Greedy Algorithm** used to construct the **Minimum Spanning Tree (MST)**. For a connected, weighted, and undirected graph, it aims to find the tree that spans all vertices with the minimum total edge weight.

## Basic Concept of the Algorithm

- The MST consists of **V vertices** and **V-1 edges** with the lowest possible total cost.
- The algorithm starts from a **random vertex** and expands by selecting the **lowest-weight adjacent edge**.
- At each step, the **smallest weight edge** connecting an already selected vertex to an unselected vertex is added.
- The process continues until all vertices are included.

## Steps

1. **Select a starting vertex** (randomly or predefined).
2. **Choose the smallest weighted edge** and add it to the MST.
3. **Expand by selecting the lowest-cost edge** from the newly included vertex.
4. **Repeat the process** until all vertices are included.

## Example Scenario

### Input - Weighted Graph

```  (A)
    /   \  
  2/     \3
  /       \  
(B)-------(C)
  \       /
  4\     /5
    \   /
     (D)     ```


### Edges and Weights

| Edge  | Weight |
|-------|--------|
| A - B | 2      |
| A - C | 3      |
| B - C | 1      |
| B - D | 4      |
| C - D | 5      |

### Algorithm Execution

1. **Start from vertex A.**
2. **Select the smallest edge (A - B, weight = 2).**
3. **From the new vertex B, select the smallest edge (B - C, weight = 1).**
4. **From C, select the next smallest edge (B - D, weight = 4 instead of A - C).**
5. **Since all vertices are now connected, the algorithm terminates.**

### Output - Minimum Spanning Tree (MST)

- **Selected Edges:** (A - B), (B - C), (B - D)
- **Total Weight:** 2 + 1 + 4 = **7**

## Applications

- **Network Design**
- **Electrical Grid Optimization**
- **Transportation and Road Planning**
- **Data Clustering**

## Conclusion

Prim’s Algorithm works by **greedily selecting the smallest weighted edge at each step**, ensuring an **optimal and efficient MST**.
