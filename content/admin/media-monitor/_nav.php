<?php
/**
 * Navigation configuration for Media Monitor section
 * Include this file to get the navigation array for any page in this section
 */

// Determine if we're on the overview page or a subpage
$current_file = basename($_SERVER['PHP_SELF']);
$is_overview = ($current_file === 'media-monitor.php');

if ($is_overview) {
    // Navigation from overview page
    $nav_items = [
        ['id' => 'overview', 'title' => 'Overview', 'url' => 'media-monitor.php'],
        ['id' => 'creating-posts', 'title' => 'Creating Posts', 'url' => 'media-monitor/creating-posts.php'],
        ['id' => 'managing-taxonomies', 'title' => 'Managing Taxonomies', 'url' => 'media-monitor/managing-taxonomies.php'],
        ['id' => 'url-checker', 'title' => 'URL Checker', 'url' => 'media-monitor/url-checker.php'],
        ['id' => 'developer-notes', 'title' => 'Developer Notes', 'url' => 'media-monitor/developer-notes.php']
    ];
} else {
    // Navigation from subpages
    $nav_items = [
        ['id' => 'overview', 'title' => 'Overview', 'url' => '../media-monitor.php'],
        ['id' => 'creating-posts', 'title' => 'Creating Posts', 'url' => 'creating-posts.php'],
        ['id' => 'managing-taxonomies', 'title' => 'Managing Taxonomies', 'url' => 'managing-taxonomies.php'],
        ['id' => 'url-checker', 'title' => 'URL Checker', 'url' => 'url-checker.php'],
        ['id' => 'developer-notes', 'title' => 'Developer Notes', 'url' => 'developer-notes.php']
    ];
}
?>