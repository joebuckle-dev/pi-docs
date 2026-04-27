<?php
session_start();

// Configuration - CHANGE THIS PASSWORD!
define('PASSWORD', 'policing2026');
define('SESSION_TIMEOUT', 3600); // 1 hour in seconds

// Check if user is logging in
if (isset($_POST['password'])) {
    if ($_POST['password'] === PASSWORD) {
        $_SESSION['authenticated'] = true;
        $_SESSION['auth_time'] = time();
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $error = 'Incorrect password. Please try again.';
    }
}

// Check if user is authenticated
$authenticated = false;
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    // Check if session has expired
    if (time() - $_SESSION['auth_time'] < SESSION_TIMEOUT) {
        $authenticated = true;
    } else {
        // Session expired
        session_destroy();
    }
}

// If not authenticated, show login form
if (!$authenticated) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentation - Login Required</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 400px;
            width: 90%;
        }
        h2 {
            margin-top: 0;
            color: #333;
        }
        p {
            color: #666;
            margin-bottom: 30px;
        }
        input[type="password"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }
        button {
            background: #007bff;
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background: #0056b3;
        }
        .error {
            color: #dc3545;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Documentation Access</h2>
        <p>Please enter the password to view this documentation.</p>
        <form method="POST">
            <input type="password" name="password" placeholder="Enter password" autofocus required>
            <button type="submit">Access Documentation</button>
            <?php if (isset($error)): ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
<?php
    exit;
}

// If authenticated, show the documentation
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Policing Insight Documentation</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; max-width: 1000px; margin: 0 auto; padding: 0 20px; line-height: 1.6; background: #f8f9fa; }
        h1, h2, h3 { color: #2c3e50; }
        h2 { border-bottom: 1px solid #eee; padding-bottom: 8px; }
        
        header { 
            background: #f8f9fa; 
            margin: 0 -20px 30px -20px; 
            padding: 20px; 
            border-bottom: 2px solid #e9ecef; 
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .header-main h1 {
            margin: 0;
            font-size: 1.8em;
            border: none;
            padding: 0;
        }
        
        .header-main h1 a {
            color: #2c3e50;
            text-decoration: none;
        }
        
        .header-main h1 a:hover {
            color: #007bff;
        }
        
        .header-main p {
            margin: 5px 0 0 0;
            color: #6c757d;
            font-size: 0.9em;
        }
        
        .header-nav {
            display: flex;
            gap: 8px;
        }
        
        .nav-item {
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            color: #495057;
            font-size: 0.9em;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .nav-item:hover {
            background: #e9ecef;
            color: #007bff;
        }
        
        .nav-item.active {
            background: #007bff;
            color: white;
        }
        
        @media (max-width: 600px) {
            .header-content {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .header-nav {
                width: 100%;
            }
            
            .nav-item {
                flex: 1;
                text-align: center;
            }
        }
        
        pre { background: #f4f4f4; padding: 15px; border-radius: 5px; overflow-x: auto; }
        code { background: #f4f4f4; padding: 2px 4px; border-radius: 3px; }
        .feature { background: #e9f7ef; padding: 10px; margin: 10px 0; border-left: 4px solid #27ae60; }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="header-main">
                <h1><a href="/docs/index.php">Policing Insight</a></h1>
                <p>Documentation Hub</p>
            </div>
            <nav class="header-nav">
                <a href="/docs/index.php" class="nav-item active">Home</a>
                <a href="logout.php" class="nav-item" style="background: #dc3545; color: white;">Logout</a>
            </nav>
        </div>
    </header>

    <main>
        <div style="background: white; border-radius: 8px; padding: 24px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2 style="margin: 0;">Documentation</h2>
                <input type="text" id="docSearch" placeholder="Search docs..." style="padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; width: 250px;">
            </div>

            <?php 
            require_once 'includes/sections.php';
            render_documentation_tree($documentation_sections);
            ?>
        </div>

        <style>
            .tree {
                margin: 20px 0;
                font-size: 14px;
            }

            .tree ul {
                list-style: none;
                margin: 0;
                padding-left: 0;
            }

            .tree > ul > li {
                margin-bottom: 25px;
            }

            .tree li {
                margin: 6px 0;
            }

            /* Section headers (🎛️ Admin Features) */
            .tree > ul > li {
                font-size: 16px;
                font-weight: 600;
                color: #2c3e50;
                margin-bottom: 15px;
            }

            /* Parent items (Media Monitor, Display for Region) */
            .tree li.tree-parent {
                margin: 8px 0 4px 20px; /* Reduced spacing */
            }

            .tree li.tree-parent > a {
                font-weight: 500;
                font-size: 14px;
                color: #007bff;
                background: #f8f9fa;
                padding: 6px 10px; /* Smaller padding */
                border-radius: 5px;
                border-left: 3px solid #007bff;
                text-decoration: none;
                display: inline-block;
                min-width: 180px;
                transition: all 0.2s ease;
            }
            
            .tree li.tree-parent > a:hover {
                background: #e9ecef;
                transform: translateX(1px);
            }

            /* Sub-items */
            .tree li.tree-parent ul {
                margin: 6px 0 0 20px;
                border-left: 2px solid #e9ecef;
                padding-left: 12px;
            }

            .tree li.tree-parent ul li {
                margin: 4px 0;
            }

            .tree li.tree-parent ul li a {
                color: #007bff;
                text-decoration: none;
                padding: 4px 8px;
                border-radius: 3px;
                display: inline-block;
                transition: all 0.2s ease;
                font-size: 13px;
                position: relative;
            }

            .tree li.tree-parent ul li a::before {
                content: "→";
                margin-right: 4px;
                opacity: 0.7;
                font-size: 11px;
            }

            .tree li.tree-parent ul li a:hover {
                background: #f8f9fa;
                color: #0056b3;
                transform: translateX(2px);
            }

            .tree li.tree-parent ul li a:hover::before {
                opacity: 1;
            }
            
            /* Developer notes styling */
            .tree li.tree-developer > a {
                color: #856404 !important;
                font-style: italic;
                background: #fff3cd !important;
                border-left: 3px solid #ffc107 !important;
                font-size: 12px !important;
            }

            .tree li.tree-developer > a::before {
                content: "🔧";
                margin-right: 4px;
            }
            
            .tree li.tree-developer > a:hover {
                background: #ffeaa7 !important;
                transform: translateX(2px);
            }

            .tree small {
                display: inline-block;
                color: #6c757d;
                font-size: 11px;
                margin-left: 8px;
                font-style: normal;
                font-weight: normal;
                opacity: 0.8;
            }
        </style>
    </main>

    <?php require_once 'includes/footer.php'; ?>
    
    <script>
        // Simple search functionality
        document.getElementById('docSearch').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const treeParents = document.querySelectorAll('.tree-parent');
            
            treeParents.forEach(function(parent) {
                const text = parent.textContent.toLowerCase();
                if (text.includes(searchTerm) || searchTerm === '') {
                    parent.style.display = '';
                } else {
                    parent.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
