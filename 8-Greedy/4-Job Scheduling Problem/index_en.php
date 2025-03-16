<?php

/**
 * Job class holds the name, profit, and deadline of each job.
 */
class Job {
    public string $name;
    public int $profit;
    public int $deadline;
    
    public function __construct(string $name, int $profit, int $deadline) {
        $this->name = $name;
        $this->profit = $profit;
        $this->deadline = $deadline;
    }
}

/**
 * Function to schedule jobs to maximize profit using the Greedy method.
 * @param Job[] $jobs - An array of jobs.
 * @return array - Selected jobs and total profit.
 */
function scheduleJobs(array $jobs): array {
    // Sort jobs by profit in descending order
    usort($jobs, fn($a, $b) => $b->profit <=> $a->profit);
    
    // Determine the maximum deadline
    $maxDeadline = max(array_map(fn($job) => $job->deadline, $jobs));
    
    // Schedule array
    $schedule = array_fill(1, $maxDeadline, null);
    $totalProfit = 0;
    
    foreach ($jobs as $job) {
        // Check from the latest possible time backward for a free slot
        for ($time = $job->deadline; $time > 0; $time--) {
            if ($schedule[$time] === null) {
                $schedule[$time] = $job;
                $totalProfit += $job->profit;
                break;
            }
        }
    }
    
    return [
        'selectedJobs' => array_filter($schedule),
        'totalProfit' => $totalProfit
    ];
}

// Example Usage
$jobs = [
    new Job("A", 100, 2),
    new Job("B", 50, 1),
    new Job("C", 200, 2),
    new Job("D", 20, 1),
    new Job("E", 150, 3)
];

$result = scheduleJobs($jobs);

echo "Selected Jobs:\n";
foreach ($result['selectedJobs'] as $job) {
    echo "Job: {$job->name}, Profit: {$job->profit}, Deadline: {$job->deadline}\n";
}

echo "Total Profit: {$result['totalProfit']}";

?>
