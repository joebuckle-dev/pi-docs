<?php
// Determine base path based on current page location
$current_file = basename($_SERVER['PHP_SELF']);
$is_subpage = strpos($_SERVER['PHP_SELF'], '/pi-events/') !== false;
$base_path = $is_subpage ? '../' : '';

$nav_items = [
    [
        'id' => 'overview',
        'title' => 'Overview',
        'url' => $base_path . 'pi-events.php'
    ],
    [
        'id' => 'creating-events',
        'title' => 'Creating Events',
        'url' => $is_subpage ? 'creating-events.php' : 'pi-events/creating-events.php'
    ],
    [
        'id' => 'managing-registrations',
        'title' => 'Managing Registrations',
        'url' => $is_subpage ? 'managing-registrations.php' : 'pi-events/managing-registrations.php'
    ],
    [
        'id' => 'developer-notes',
        'title' => 'Developer Notes',
        'url' => $is_subpage ? 'developer-notes.php' : 'pi-events/developer-notes.php'
    ]
];
?>
