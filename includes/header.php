<?php require_once dirname(__DIR__) . '/auth-check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'Documentation'; ?></title>
    <style>
        body { 
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; 
            margin: 0; padding: 20px; 
            line-height: 1.6; font-size: 14px; 
            background: #f8f9fa;
        }
        h1, h2, h3 { color: #333; }
        h1 { font-size: 1.8em; border-bottom: 2px solid #007bff; padding-bottom: 8px; margin-top: 0; }
        h2 { font-size: 1.3em; margin-top: 30px; color: #007bff; }
        h3 { font-size: 1.1em; margin-top: 25px; }
        h4 { font-size: 1em; margin-top: 20px; font-weight: 600; }
        
        .doc-layout {
            display: flex;
            gap: 30px;
            max-width: 1000px;
            margin: 0 auto;
            align-items: flex-start;
        }
        
        .doc-nav {
            min-width: 220px;
            max-width: 250px;
            width: 220px;
            position: sticky;
            top: 20px;
            background: white;
            border-radius: 6px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            height: fit-content;
            flex-shrink: 0;
        }
        
        .doc-content {
            flex: 1;
            min-width: 0;
            background: white;
            border-radius: 6px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            overflow-wrap: break-word;
        }
        
        .doc-nav-back {
            display: block;
            color: #6c757d;
            text-decoration: none;
            margin-bottom: 15px;
            font-size: 14px;
        }
        
        .doc-nav-back:hover {
            color: #007bff;
        }
        
        .doc-nav-title {
            font-weight: 600;
            color: #333;
            font-size: 15px;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 1px solid #e9ecef;
        }
        
        .doc-nav-links {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        
        .doc-nav-link {
            color: #007bff;
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 4px;
            transition: all 0.15s;
            font-size: 13px;
            position: relative;
        }
        
        .doc-nav-link::before {
            content: "→";
            margin-right: 6px;
            opacity: 0.6;
            font-size: 12px;
        }
        
        .doc-nav-link:hover {
            background: #f8f9fa;
            color: #0056b3;
            transform: translateX(2px);
        }
        
        .doc-nav-link:hover::before {
            opacity: 1;
        }
        
        .doc-nav-link.active {
            background: #007bff;
            color: white;
        }
        
        .doc-nav-link.active::before {
            opacity: 1;
        }
        
        /* Parent section styling */
        .doc-nav-link.nav-parent {
            font-weight: 600;
            color: #007bff;
        }
        
        .doc-nav-link.nav-parent::before {
            content: "📄";
            margin-right: 6px;
        }
        
        .doc-nav-link.nav-parent.active {
            background: #007bff;
            color: white;
        }
        
        /* Developer notes styling */
        .doc-nav-link.nav-developer {
            color: #856404;
            font-style: italic;
            font-size: 12px;
        }
        
        .doc-nav-link.nav-developer::before {
            content: "🔧";
            margin-right: 6px;
        }
        
        .doc-nav-link.nav-developer:hover {
            background: #fff3cd;
            color: #533f03;
        }
        
        .doc-nav-link.nav-developer.active {
            background: #ffc107;
            color: #212529;
        }
        
        /* Other styles */
        .alert-box {
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
        }
        
        .alert-success {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }
        
        .alert-warning {
            background: #fff3cd;
            border: 1px solid #ffeeba;
            color: #856404;
        }
        
        .alert-error {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }
        
        code {
            background: #f4f4f4;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
        }
        
        ul, ol {
            margin: 10px 0;
            padding-left: 30px;
        }
        
        li {
            margin: 8px 0;
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

        /* Screenshots and figures */
        .doc-screenshot {
            margin: 20px 0;
            text-align: center;
        }
        .doc-screenshot img {
            max-width: 100%;
            height: auto;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }
        .doc-screenshot figcaption {
            margin-top: 8px;
            font-size: 13px;
            color: #6c757d;
            font-style: italic;
        }
        
        /* Responsive design */
        @media (max-width: 768px) {
            .doc-layout {
                flex-direction: column;
            }
            
            .doc-nav {
                position: static;
                width: 100%;
                max-width: 100%;
                margin-bottom: 20px;
            }
            
            .doc-nav-links {
                flex-direction: row;
                flex-wrap: wrap;
                gap: 10px;
            }
        }
        
        /* Wide content handling */
        pre, code {
            max-width: 100%;
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 13px;
            background: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border-radius: 6px;
            overflow: hidden;
        }
        
        th {
            background-color: #f8f9fa;
            font-weight: 600;
            text-align: left;
            padding: 12px 15px;
            border-bottom: 2px solid #dee2e6;
            color: #495057;
        }
        
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #dee2e6;
        }
        
        tr:last-child td {
            border-bottom: none;
        }
        
        tr:hover {
            background-color: #f8f9fa;
        }
        
        /* Code in tables */
        td code, th code {
            background-color: #f3f4f6;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 12px;
            color: #d73a49;
        }
        
        /* Strong text in tables */
        td strong {
            color: #212529;
            font-weight: 600;
        }
        
        /* First column emphasis */
        td:first-child {
            font-weight: 500;
        }
        
        /* Responsive tables */
        @media (max-width: 768px) {
            table {
                font-size: 12px;
            }
            th, td {
                padding: 8px 10px;
            }
        }
        
        p, ul li, ol li {
            font-size: 14px;
        }
        
        .highlight, .feature-box, .warning {
            font-size: 14px;
        }
        
        .alert-box {
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="doc-layout">