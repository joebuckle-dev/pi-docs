<?php require_once '../../auth-check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stats Menu - Complete Guide</title>
    <style>
        body { 
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; 
            margin: 0; padding: 20px; 
            line-height: 1.6; font-size: 16px; 
            background: #f8f9fa;
        }
        h1, h2, h3 { color: #333; }
        h1 { font-size: 2em; border-bottom: 3px solid #007bff; padding-bottom: 10px; }
        h2 { font-size: 1.4em; margin-top: 40px; color: #007bff; }
        h3 { font-size: 1.2em; margin-top: 30px; }
        
        .doc-layout {
            display: flex;
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
            align-items: flex-start;
        }
        
        .doc-nav {
            width: 250px;
            position: sticky;
            top: 20px;
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 20px;
            height: fit-content;
        }
        
        .doc-nav-back {
            display: block;
            color: #6c757d;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 12px;
            border-radius: 4px;
            margin-bottom: 15px;
            transition: all 0.2s;
        }
        
        .doc-nav-back:hover {
            background: #f8f9fa;
            color: #495057;
        }
        
        .doc-nav-title {
            font-weight: 600;
            color: #495057;
            font-size: 1.2em;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e9ecef;
        }
        
        .doc-nav-links {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        
        .doc-nav-link {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
            padding: 10px 12px;
            border-radius: 4px;
            transition: all 0.2s;
            border-left: 3px solid transparent;
        }
        
        .doc-nav-link:hover {
            background: #f8f9fa;
            border-left-color: #007bff;
        }
        
        .doc-content {
            flex: 1;
            background: white;
            border-radius: 8px;
            padding: 30px;
            border: 1px solid #e9ecef;
        }
        
        @media (max-width: 768px) {
            .doc-layout {
                flex-direction: column;
            }
            
            .doc-nav {
                position: static;
                width: 100%;
                margin-bottom: 20px;
            }
            
            .doc-nav-links {
                flex-direction: row;
                flex-wrap: wrap;
                gap: 10px;
            }
        }
        
        .highlight { 
            background: #e7f3ff; padding: 20px; border-radius: 8px; 
            border-left: 5px solid #007bff; margin: 20px 0; 
        }
        .feature-box { 
            background: #f8f9fa; padding: 20px; border-radius: 8px; 
            margin: 20px 0; border-left: 4px solid #28a745; 
        }
        .warning { 
            background: #fff3cd; padding: 15px; border-radius: 8px; 
            border-left: 4px solid #ffc107; margin: 20px 0; 
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin: 25px 0;
        }
        .stats-card {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 20px;
            transition: all 0.2s;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .stats-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        .stats-card h3 {
            margin: 0 0 10px 0;
            color: #007bff;
            font-size: 1.1em;
        }
        .stats-card p {
            margin: 0;
            color: #666;
            font-size: 14px;
            line-height: 1.5;
        }
        .stats-card .icon {
            font-size: 24px;
            margin-bottom: 10px;
            display: block;
        }
        .direct-link {
            background: #007bff;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            margin: 10px 5px 10px 0;
            font-size: 14px;
            font-weight: 500;
        }
        .direct-link:hover {
            background: #0056b3;
            color: white;
            text-decoration: none;
        }
        code { 
            background: #f4f4f4; padding: 3px 6px; border-radius: 4px; 
            font-size: 14px; color: #d63384; 
        }
        table { 
            width: 100%; border-collapse: collapse; margin: 20px 0; 
            font-size: 15px; 
        }
        th, td { 
            border: 1px solid #ddd; padding: 12px; text-align: left; 
        }
        th { background-color: #f8f9fa; font-weight: 600; }
        ul { padding-left: 20px; }
        li { margin-bottom: 8px; }
    </style>
</head>
<body>
    <div class="doc-layout">
        <nav class="doc-nav">
            <a href="/docs/index.php" class="doc-nav-back">← Documentation</a>
            <div class="doc-nav-title">Stats Menu</div>
            <div class="doc-nav-links">
                <a href="#overview" class="doc-nav-link">Overview</a>
                <a href="#sections" class="doc-nav-link">All Sections</a>
                <a href="#quick-links" class="doc-nav-link">Quick Access Links</a>
            </div>
        </nav>

        <main class="doc-content">
            <h1>Stats Menu - Complete Guide</h1>

            <div class="highlight" id="overview">
                <h2>What is the Stats Menu?</h2>
                <p><strong>Your central hub for all website analytics, monitoring, and reporting.</strong></p>
                <p>The Stats menu consolidates all data tracking and analysis tools into one organized location, making it easy to monitor your website's performance, user activity, and content engagement.</p>
            </div>

            <h2 id="sections">All Available Statistics Sections</h2>

            <div class="stats-grid">
                <div class="stats-card">
                    <span class="icon">📊</span>
                    <h3>Popular Posts</h3>
                    <p>View and analyze your most popular content. Track pageviews, comments, and engagement over different time periods.</p>
                    <a href="/wp-admin/admin.php?page=popular-posts" class="direct-link" target="_blank">Open Popular Posts →</a>
                </div>

                <div class="stats-card">
                    <span class="icon">📥</span>
                    <h3>Report Downloads</h3>
                    <p>Track and manage report download activity. Monitor which reports are being accessed and by whom.</p>
                    <a href="/wp-admin/admin.php?page=report-downloads" class="direct-link" target="_blank">Open Report Downloads →</a>
                </div>

                <div class="stats-card">
                    <span class="icon">❌</span>
                    <h3>Failed Registrations</h3>
                    <p>Monitor failed registration attempts and manage email blacklists to improve user experience.</p>
                    <a href="/wp-admin/admin.php?page=emails-undeliverable" class="direct-link" target="_blank">Open Failed Registrations →</a>
                </div>

                <div class="stats-card">
                    <span class="icon">👤</span>
                    <h3>Login Count</h3>
                    <p>Monitor user login activity and track authentication patterns across your website.</p>
                    <a href="/wp-admin/admin.php?page=pi-login-count" class="direct-link" target="_blank">Open Login Count →</a>
                </div>

                <div class="stats-card">
                    <span class="icon">🔑</span>
                    <h3>Password Reminders Sent</h3>
                    <p>Track password reminder emails sent to users. Monitor reset request patterns and delivery status.</p>
                    <a href="/wp-admin/admin.php?page=pi-password-reminders-sent" class="direct-link" target="_blank">Open Password Reminders →</a>
                </div>

                <div class="stats-card">
                    <span class="icon">📄</span>
                    <h3>Media Monitor PDF Logs</h3>
                    <p>View PDF download and access logs. Monitor which documents are being accessed and downloaded.</p>
                    <a href="/wp-admin/admin.php?page=media-monitor-pdf-logs" class="direct-link" target="_blank">Open PDF Logs →</a>
                </div>

                <div class="stats-card">
                    <span class="icon">📃</span>
                    <h3>Article PDF Logs</h3>
                    <p>Track article PDF generation and downloads. Monitor document creation and access patterns.</p>
                    <a href="/wp-admin/admin.php?page=article-pdf-logs" class="direct-link" target="_blank">Open Article PDF Logs →</a>
                </div>

                <div class="stats-card">
                    <span class="icon">📈</span>
                    <h3>Content Tracking</h3>
                    <p>Monitor content engagement and user interactions. Track how users engage with your content.</p>
                    <a href="/wp-admin/admin.php?page=content-tracking" class="direct-link" target="_blank">Open Content Tracking →</a>
                </div>

                <div class="stats-card">
                    <span class="icon">🎯</span>
                    <h3>Ad Tracking</h3>
                    <p>Monitor advertisement performance and engagement. View clicks, impressions, and campaign analytics.</p>
                    <a href="/wp-admin/admin.php?page=ad-tracking" class="direct-link" target="_blank">Open Ad Tracking →</a>
                </div>
            </div>

            <h2 id="quick-links">Quick Access Links</h2>

            <div class="feature-box">
                <h3>🚀 Direct URLs for Bookmarking</h3>
                <p>Bookmark these links for quick access to specific sections:</p>
                
                <table>
                    <tr>
                        <th>Section</th>
                        <th>Direct URL</th>
                        <th>Purpose</th>
                    </tr>
                    <tr>
                        <td>Stats Dashboard</td>
                        <td><code>/wp-admin/admin.php?page=stats</code></td>
                        <td>Main overview page</td>
                    </tr>
                    <tr>
                        <td>Popular Posts</td>
                        <td><code>/wp-admin/admin.php?page=popular-posts</code></td>
                        <td>Content analytics</td>
                    </tr>
                    <tr>
                        <td>Report Downloads</td>
                        <td><code>/wp-admin/admin.php?page=report-downloads</code></td>
                        <td>Download tracking</td>
                    </tr>
                    <tr>
                        <td>Failed Registrations</td>
                        <td><code>/wp-admin/admin.php?page=emails-undeliverable</code></td>
                        <td>Registration monitoring</td>
                    </tr>
                    <tr>
                        <td>Login Count</td>
                        <td><code>/wp-admin/admin.php?page=pi-login-count</code></td>
                        <td>Authentication tracking</td>
                    </tr>
                    <tr>
                        <td>Ad Tracking</td>
                        <td><code>/wp-admin/admin.php?page=ad-tracking</code></td>
                        <td>Advertisement analytics</td>
                    </tr>
                </table>
            </div>

            <footer style="margin-top: 50px; padding-top: 20px; border-top: 1px solid #eee; color: #666; text-align: center;">
                <p>&copy; 2026 Policing Insight | <a href="/docs/logout.php">Logout</a></p>
            </footer>
        </main>
    </div>
</body>
</html>