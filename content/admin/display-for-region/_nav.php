<?php
/**
 * Navigation configuration for Display for Region section
 * Include this file to get the navigation array for any page in this section
 */

// Determine if we're on the overview page or a subpage
$current_file = basename($_SERVER['PHP_SELF']);
$is_overview = ($current_file === 'display-for-region.php');

if ($is_overview) {
    // Navigation from overview page
    $nav_items = [
        ['id' => 'overview', 'title' => 'Overview', 'url' => 'display-for-region.php'],
        ['id' => 'shortcode', 'title' => 'Shortcode Usage', 'url' => 'display-for-region/shortcode.php'],
        ['id' => 'developer-notes', 'title' => 'Developer Notes', 'url' => 'display-for-region/developer-notes.php']
    ];
} else {
    // Navigation from subpages
    $nav_items = [
        ['id' => 'overview', 'title' => 'Overview', 'url' => '../display-for-region.php'],
        ['id' => 'shortcode', 'title' => 'Shortcode Usage', 'url' => 'shortcode.php'],
        ['id' => 'developer-notes', 'title' => 'Developer Notes', 'url' => 'developer-notes.php']
    ];
}
?>