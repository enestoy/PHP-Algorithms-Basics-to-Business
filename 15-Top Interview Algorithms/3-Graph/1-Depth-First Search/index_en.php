<?php
/* 
Interview Question:

In a social network application, a graph representing the connections between users is given.
This graph shows the friendships between users.
The graph is represented as an adjacency list.
Your task is to start from a given user and find all directly and indirectly connected friends (i.e., all reachable nodes in the graph) and return a list of these users.
You must use the DFS algorithm to accomplish this task.
*/

/**
 * Finds all reachable friends of a user using the DFS algorithm.
 *
 * @param array $graph The graph representing user friendships.
 * @param string $startUser The starting user.
 * @return array A list of all reachable users.
 */
function findFriendsDFS(array $graph, string $startUser): array
{
    // Create an array to track visited users.
    $visited = [];

    // Start DFS traversal.
    dfs($graph, $startUser, $visited);

    // Return the list of visited users.
    return array_keys($visited);
}

/**
 * Helper function for the DFS algorithm.
 *
 * @param array $graph The graph representing user friendships.
 * @param string $user The current user.
 * @param array &$visited Reference to the visited users array.
 */
function dfs(array $graph, string $user, array &$visited): void
{
    // If the user has not been visited yet, continue processing.
    if (!isset($visited[$user])) {
        // Mark the user as visited.
        $visited[$user] = true;

        // Traverse the user's friends.
        foreach ($graph[$user] as $friend) {
            dfs($graph, $friend, $visited);
        }
    }
}

// Example usage:
$graph = [
    'Ahmet' => ['Mehmet', 'Ayşe'],
    'Mehmet' => ['Ahmet', 'Fatma'],
    'Ayşe' => ['Ahmet', 'Fatma'],
    'Fatma' => ['Mehmet', 'Ayşe', 'Zeynep'],
    'Zeynep' => ['Fatma'],
    'Ali' => [] // Ali has no friends
];

$startUser = 'Ahmet';
$result = findFriendsDFS($graph, $startUser);

echo "Starting user: $startUser<br>";
echo "Reachable friends: " . implode(', ', $result) . "<br>";

?>
