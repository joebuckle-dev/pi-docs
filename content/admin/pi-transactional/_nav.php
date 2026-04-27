<?php
// Determine base path based on current page location
$current_file = basename($_SERVER['PHP_SELF']);
$is_subpage = strpos($_SERVER['PHP_SELF'], '/pi-transactional/') !== false;
$base_path = $is_subpage ? '../' : '';

$nav_items = [
    [
        'id' => 'overview',
        'title' => 'Overview',
        'url' => $base_path . 'pi-transactional.php'
    ],
    [
        'id' => 'editing-templates',
        'title' => 'Editing Templates',
        'url' => $is_subpage ? 'editing-templates.php' : 'pi-transactional/editing-templates.php'
    ],
    [
        'id' => 'developer-notes',
        'title' => 'Developer Notes',
        'url' => $is_subpage ? 'developer-notes.php' : 'pi-transactional/developer-notes.php'
    ]
];
?>
