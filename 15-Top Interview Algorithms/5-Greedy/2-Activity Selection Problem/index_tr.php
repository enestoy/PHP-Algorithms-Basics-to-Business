<?php
/* 
Mülakat Sorusu:

Problem:
Bir dizi etkinlik verildiğinde, her etkinliğin bir başlangıç zamanı (start) ve bitiş zamanı (end) vardır. 
Bu etkinlikler arasından birbirleriyle çakışmayan en fazla sayıda etkinliği seçin.

*/

function activitySelection($activities) {
    // Etkinlikleri bitiş zamanına göre sırala
    usort($activities, function ($a, $b) {
        return $a['end'] - $b['end'];
    });

    $selectedActivities = [];
    $lastEndTime = -INF; // Son seçilen etkinliğin bitiş zamanı

    foreach ($activities as $activity) {
        // Eğer etkinliğin başlangıç zamanı, son seçilen etkinliğin bitiş zamanından büyük veya eşitse
        if ($activity['start'] >= $lastEndTime) {
            $selectedActivities[] = $activity; // Etkinliği seç
            $lastEndTime = $activity['end']; // Son bitiş zamanını güncelle
        }
    }

    return $selectedActivities;
}

// Örnek kullanım
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