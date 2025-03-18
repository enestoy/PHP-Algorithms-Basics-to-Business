<?php
/* 
Interview Question:

Problem:
Given a set of activities, each with a start time and an end time, 
select the maximum number of activities that do not overlap with each other.
*/

function activitySelection($activities) {
    // Sort activities by their end time
    usort($activities, function ($a, $b) {
        return $a['end'] - $b['end'];
    });

    $selectedActivities = [];
    $lastEndTime = -INF; // End time of the last selected activity

    foreach ($activities as $activity) {
        // If the start time of the activity is greater than or equal to the end time of the last selected activity
        if ($activity['start'] >= $lastEndTime) {
            $selectedActivities[] = $activity; // Select the activity
            $lastEndTime = $activity['end']; // Update the end time of the last selected activity
        }
    }

    return $selectedActivities;
}

// Example usage
$activities = [
    ['start' => 1, 'end' => 4],
    ['start' => 3, 'end' => 5],
    ['start' => 0, 'end' => 6],
    ['start' => 5, 'end' => 7],
    ['start' => 8, 'end' => 9],
];

$result = activitySelection($activities);
echo "Selected Activities:\n";
foreach ($result as $activity) {
    echo "Start: " . $activity['start'] . ", End: " . $activity['end'] . "<br>";
}

?>
