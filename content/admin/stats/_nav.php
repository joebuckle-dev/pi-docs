<?php
/**
 * Navigation configuration for the Stats section
 * Include this file to get the navigation array for any page in this section
 */

// Determine if we're on the overview page or a subpage
$current_file = basename($_SERVER['PHP_SELF']);
$is_overview = ($current_file === 'stats.php');

if ($is_overview) {
    // Navigation from overview page
    $nav_items = [
        ['id' => 'overview', 'title' => 'Overview', 'url' => 'stats.php'],
        ['id' => 'popular-posts', 'title' => 'Popular Posts', 'url' => 'stats/popular-posts.php'],
        ['id' => 'tracking-vs-popular-posts', 'title' => 'Tracking vs Popular Posts', 'url' => 'stats/tracking-vs-popular-posts.php'],
        ['id' => 'google-analytics', 'title' => 'Google Analytics comparison', 'url' => 'stats/google-analytics.php'],
        ['id' => 'developer-notes', 'title' => 'Developer notes', 'url' => 'stats/developer-notes.php']
    ];
} else {
    // Navigation from subpages
    $nav_items = [
        ['id' => 'overview', 'title' => 'Overview', 'url' => '../stats.php'],
        ['id' => 'popular-posts', 'title' => 'Popular Posts', 'url' => 'popular-posts.php'],
        ['id' => 'tracking-vs-popular-posts', 'title' => 'Tracking vs Popular Posts', 'url' => 'tracking-vs-popular-posts.php'],
        ['id' => 'google-analytics', 'title' => 'Google Analytics comparison', 'url' => 'google-analytics.php'],
        ['id' => 'developer-notes', 'title' => 'Developer notes', 'url' => 'developer-notes.php']
    ];
}
?>
