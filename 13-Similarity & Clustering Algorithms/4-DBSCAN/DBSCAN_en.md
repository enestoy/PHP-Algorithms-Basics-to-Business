# DBSCAN Algorithm

## What is DBSCAN?

DBSCAN (Density-Based Spatial Clustering of Applications with Noise) is a density-based clustering algorithm. It identifies clusters based on density regions and can distinguish noisy (outlier) data points.

## Working Principle of DBSCAN Algorithm

1. **Initialization:** A random data point is selected.
2. **Density Check:** The number of neighbors within the specified distance (epsilon, ε) is examined for the selected point.
3. **Clustering:**
   - If the point has enough neighbors, it is designated as the core of a cluster, and its neighbors are included in the cluster.
   - If it has insufficient neighbors, the point is marked as noise.
4. **Expansion:** Newly added points are similarly checked, and clusters expand.
5. **Repetition:** The process continues until all points are visited.

## Advantages of the DBSCAN Algorithm

- The number of clusters does not need to be predetermined.
- Can detect outlier (noise) data points.
- Effectively captures clusters of different shapes.

## Disadvantages of the DBSCAN Algorithm

- Does not perform well when cluster densities are very different.
- High computational cost for large datasets.
- The parameters (ε and minimum number of neighbors) need to be selected correctly.

## Applications of DBSCAN

- Anomaly detection
- Geospatial data analysis
- Image processing
- Customer segmentation

The DBSCAN algorithm is an effective method, particularly for datasets requiring density-based clustering, and is more flexible compared to classical clustering algorithms.
