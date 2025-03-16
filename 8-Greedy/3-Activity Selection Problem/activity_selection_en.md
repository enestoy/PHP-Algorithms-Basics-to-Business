# Activity Selection Problem

## Problem Definition

The Activity Selection problem is an optimization problem that aims to select the maximum number of non-overlapping activities from a given set of activities with specified start and finish times.

## Greedy Approach

This problem can be efficiently solved using a **Greedy Algorithm**. The idea is to always select the activity that finishes the earliest, allowing the most activities to be scheduled.

### Steps

1. **Sort Activities by Finish Time**: Arrange all activities in ascending order based on their finish times.
2. **Select the First Activity**: Choose the activity that finishes first and add it to the schedule.
3. **Continue Selecting Non-Overlapping Activities**:
   - Select the next activity that starts after the finish time of the previously selected activity.
   - Repeat this process for all activities.
4. **Result**: Return the list of selected activities.

## Example Scenario

### Input

| Activity | Start | Finish |
|----------|-------|--------|
| A        | 1     | 3      |
| B        | 2     | 5      |
| C        | 3     | 9      |
| D        | 6     | 8      |
| E        | 5     | 7      |
| F        | 8     | 9      |

### Sorted List

| Activity | Start | Finish |
|----------|-------|--------|
| A        | 1     | 3      |
| B        | 2     | 5      |
| E        | 5     | 7      |
| D        | 6     | 8      |
| C        | 3     | 9      |
| F        | 8     | 9      |

### Selection Process

1. **Select A** (1-3)
2. **Select E** (5-7) (Does not overlap with A)
3. **Select F** (8-9) (Does not overlap with E)

### Final Selection

- Selected activities: **A, E, F**

## Conclusion

The greedy algorithm ensures **maximum activity selection** by making the optimal choice at each step. This method is particularly useful in scheduling and time management problems.
