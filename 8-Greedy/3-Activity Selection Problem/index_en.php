<?php

/**
 * Event class holds the start and end times of each event.
 */
class Event {
    public int $start;
    public int $end;
    
    public function __construct(int $start, int $end) {
        $this->start = $start;
        $this->end = $end;
    }
}

/**
 * Function to select the maximum number of events using the Greedy method.
 * @param Event[] $events - An array of events.
 * @return Event[] - List of selected events.
 */
function selectEvents(array $events): array {
    // Sort events by end time in ascending order
    usort($events, fn($a, $b) => $a->end <=> $b->end);
    
    $selectedEvents = [];
    $lastSelectedEndTime = 0;
    
    foreach ($events as $event) {
        // If the event does not overlap with the previously selected event, add it
        if ($event->start >= $lastSelectedEndTime) {
            $selectedEvents[] = $event;
            $lastSelectedEndTime = $event->end;
        }
    }
    
    return $selectedEvents;
}

// Example Usage
$events = [
    new Event(1, 3),
    new Event(2, 5),
    new Event(3, 9),
    new Event(6, 8),
    new Event(5, 7),
    new Event(8, 9)
];

$result = selectEvents($events);

echo "Selected Events:<br>";
foreach ($result as $index => $event) {
    echo "Event ".($index+1).": Start = {$event->start}, End = {$event->end}\n<br>";
}

?>
