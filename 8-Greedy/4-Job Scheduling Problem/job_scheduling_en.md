# Job Scheduling Problem

## Problem Definition

The Job Scheduling problem is an optimization problem that aims to schedule jobs with specific profits and deadlines in a way that maximizes the total profit.

## Greedy Approach

This problem can be solved using a **Greedy Algorithm**. The goal is to schedule jobs within their deadlines while ensuring the highest possible total profit.

### Steps

1. **Sort Jobs in Descending Order of Profit**: Arrange the jobs from highest to lowest profit.
2. **Determine Maximum Deadline**: Identify the latest deadline among all jobs.
3. **Create a Scheduling Table**:
   - Initialize an empty timeline for job completion.
   - Start with the highest-profit job and place it in the latest available time slot before its deadline.
   - If no available slot exists, skip that job.
4. **Result**: Return the scheduled jobs and the maximum profit obtained.

## Example Scenario

### Input

| Job  | Profit | Deadline |
|------|--------|----------|
| A    | 100    | 2        |
| B    | 50     | 1        |
| C    | 200    | 2        |
| D    | 20     | 1        |
| E    | 150    | 3        |

### Sorted List (By Profit)

| Job  | Profit | Deadline |
|------|--------|----------|
| C    | 200    | 2        |
| E    | 150    | 3        |
| A    | 100    | 2        |
| B    | 50     | 1        |
| D    | 20     | 1        |

### Scheduling

1. **Select C** (placed in time slot 2)
2. **Select E** (placed in time slot 3)
3. **Select A** (placed in time slot 1)
4. **B and D** are skipped as no slots are available.

### Final Schedule

- Selected jobs: **A, C, E**
- Total profit: **450**

## Conclusion

The greedy algorithm ensures **maximum profit** by making the optimal choice at each step. This method is widely used in production planning, project management, and CPU scheduling.
