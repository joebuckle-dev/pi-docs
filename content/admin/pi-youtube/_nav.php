<?php
/**
 * Navigation configuration for YouTube Embed section
 * Include this file to get the navigation array for any page in this section
 */

// Determine if we're on the overview page or a subpage
$current_file = basename($_SERVER['PHP_SELF']);
$is_overview = ($current_file === 'pi-youtube.php');

if ($is_overview) {
    // Navigation from overview page
    $nav_items = [
        ['id' => 'overview', 'title' => 'Overview', 'url' => 'pi-youtube.php'],
        ['id' => 'shortcode', 'title' => 'Shortcode Usage', 'url' => 'pi-youtube/shortcode.php']
    ];
} else {
    // Navigation from subpages
    $nav_items = [
        ['id' => 'overview', 'title' => 'Overview', 'url' => '../pi-youtube.php'],
        ['id' => 'shortcode', 'title' => 'Shortcode Usage', 'url' => 'shortcode.php']
    ];
}
?>
