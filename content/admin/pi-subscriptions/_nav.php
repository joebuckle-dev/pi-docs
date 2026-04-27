<?php
// Determine base path based on current page location
$current_file = basename($_SERVER['PHP_SELF']);
$is_subpage = strpos($_SERVER['PHP_SELF'], '/pi-subscriptions/') !== false;
$base_path = $is_subpage ? '../' : '';

$nav_items = [
    [
        'id' => 'overview',
        'title' => 'Overview',
        'url' => $base_path . 'pi-subscriptions.php'
    ],
    [
        'id' => 'webhook-testing',
        'title' => 'Webhook Testing',
        'url' => $is_subpage ? 'webhook-testing.php' : 'pi-subscriptions/webhook-testing.php'
    ],
    [
        'id' => 'developer-notes',
        'title' => 'Developer Notes',
        'url' => $is_subpage ? 'developer-notes.php' : 'pi-subscriptions/developer-notes.php'
    ]
];
?>