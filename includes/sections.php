<?php
// Documentation sections configuration
$documentation_sections = [
    'admin' => [
        'icon' => '🎛️',
        'title' => 'Admin Features',
        'items' => [
            'media-monitor' => [
                'title' => 'Media Monitor',
                'url' => '/docs/content/admin/media-monitor.php',
                'description' => 'Managing media monitoring posts',
                'subitems' => [
                    'creating-posts' => [
                        'title' => 'Creating Posts',
                        'url' => '/docs/content/admin/media-monitor/creating-posts.php',
                        'description' => 'Step-by-step post creation guide'
                    ],
                    'managing-taxonomies' => [
                        'title' => 'Managing Taxonomies',
                        'url' => '/docs/content/admin/media-monitor/managing-taxonomies.php',
                        'description' => 'Sources, Subjects, Regions, and Topics'
                    ],
                    'url-checker' => [
                        'title' => 'URL Checker',
                        'url' => '/docs/content/admin/media-monitor/url-checker.php',
                        'description' => 'Duplicate URL detection guide'
                    ],
                    'developer-notes' => [
                        'title' => 'Developer Notes',
                        'url' => '/docs/content/admin/media-monitor/developer-notes.php',
                        'description' => 'Technical implementation details'
                    ]
                ]
            ],
            'display-for-region' => [
                'title' => 'Display for Region',
                'url' => '/docs/content/admin/display-for-region.php',
                'description' => 'Show content based on visitor country',
                'subitems' => [
                    'shortcode' => [
                        'title' => 'Shortcode Usage',
                        'url' => '/docs/content/admin/display-for-region/shortcode.php',
                        'description' => 'Complete guide with country codes'
                    ],
                    'developer-notes' => [
                        'title' => 'Developer Notes',
                        'url' => '/docs/content/admin/display-for-region/developer-notes.php',
                        'description' => 'Technical implementation details'
                    ]
                ]
            ]
        ]
    ]
];

// Function to render documentation tree
function render_documentation_tree($sections) {
    echo '<div class="tree">';
    echo '<ul>';
    
    foreach ($sections as $section_key => $section) {
        echo '<li>';
        echo $section['icon'] . ' ' . $section['title'];
        
        if (!empty($section['items'])) {
            echo '<ul>';
            foreach ($section['items'] as $item_key => $item) {
                echo '<li class="tree-parent">';
                echo '<a href="' . $item['url'] . '">' . $item['title'] . '</a>';
                if (!empty($item['description'])) {
                    echo '<small>' . $item['description'] . '</small>';
                }
                
                // Render subitems if they exist
                if (!empty($item['subitems'])) {
                    echo '<ul>';
                    foreach ($item['subitems'] as $subitem_key => $subitem) {
                        $is_developer = strpos($subitem_key, 'developer') !== false;
                        $class = $is_developer ? 'tree-developer' : '';
                        echo '<li class="' . $class . '">';
                        echo '<a href="' . $subitem['url'] . '">' . $subitem['title'] . '</a>';
                        if (!empty($subitem['description'])) {
                            echo '<small>' . $subitem['description'] . '</small>';
                        }
                        echo '</li>';
                    }
                    echo '</ul>';
                }
                
                echo '</li>';
            }
            echo '</ul>';
        }
        
        echo '</li>';
    }
    
    echo '</ul>';
    echo '</div>';
}
?>