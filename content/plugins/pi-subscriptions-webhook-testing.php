<?php require_once '../../auth-check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PI Subscriptions Webhook Testing - Complete Guide</title>
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
            font-size: 1.1em;
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
        .example { 
            background: #f8f9fa; padding: 20px; border-radius: 8px; 
            margin: 20px 0; border-left: 4px solid #28a745; 
        }
        .warning { 
            background: #fff3cd; padding: 15px; border-radius: 8px; 
            border-left: 4px solid #ffc107; margin: 20px 0; 
        }
        .danger { 
            background: #f8d7da; padding: 15px; border-radius: 8px; 
            border-left: 4px solid #dc3545; margin: 20px 0; 
        }
        pre { 
            background: #f4f4f4; padding: 15px; border-radius: 6px; 
            overflow-x: auto; font-size: 14px; line-height: 1.4; 
        }
        code { 
            background: #f4f4f4; padding: 3px 6px; border-radius: 4px; 
            font-size: 14px; color: #d63384; 
        }
        pre code { background: transparent; padding: 0; color: #333; }
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
        
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }
        
        .feature-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #007bff;
        }
        
        .feature-card h4 {
            margin-top: 0;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="doc-layout">
        <nav class="doc-nav">
            <a href="/docs/index.php" class="doc-nav-back">← Documentation</a>
            <div class="doc-nav-title">Webhook Testing</div>
            <div class="doc-nav-links">
                <a href="#quick-start" class="doc-nav-link">Quick Start</a>
                <a href="#admin-interface" class="doc-nav-link">Admin Interface</a>
                <a href="#real-vs-mock" class="doc-nav-link">Real vs Mock</a>
                <a href="#stripe-cli" class="doc-nav-link">Stripe CLI</a>
                <a href="#troubleshooting" class="doc-nav-link">Troubleshooting</a>
                <a href="#reference" class="doc-nav-link">Reference</a>
            </div>
        </nav>

        <main class="doc-content">
            <h1>PI Subscriptions Webhook Testing</h1>

            <div class="highlight" id="quick-start">
                <h2>Quick Start</h2>
                <p><strong>Test webhooks in 30 seconds:</strong></p>
                <ol>
                    <li>Go to <strong>Subscriptions (NEW) → Webhook Testing</strong> in WordPress admin</li>
                    <li>Choose card status: Valid, Expired, or None</li>
                    <li>Click <strong>Test Invoice Upcoming</strong></li>
                    <li>Watch the debug output for complete processing details</li>
                </ol>
            </div>

            <h2 id="admin-interface">Admin Interface Testing</h2>

            <p>The admin interface provides the most accurate webhook testing available:</p>

            <div class="feature-grid">
                <div class="feature-card">
                    <h4>Real Stripe Payloads</h4>
                    <p>Uses actual webhook JSON from Stripe, not simplified test data</p>
                </div>
                <div class="feature-card">
                    <h4>Mock API Responses</h4>
                    <p>Simulates the exact API calls made in production</p>
                </div>
                <div class="feature-card">
                    <h4>Card Status Testing</h4>
                    <p>Test both valid and expired card scenarios</p>
                </div>
                <div class="feature-card">
                    <h4>Complete Debug Output</h4>
                    <p>See every step of webhook processing in real-time</p>
                </div>
            </div>

            <h3>Available Tests</h3>
            <table>
                <tr>
                    <th>Test Type</th>
                    <th>What It Tests</th>
                    <th>Email Template</th>
                </tr>
                <tr>
                    <td><strong>Invoice Upcoming - Valid Card</strong></td>
                    <td>Renewal reminder with working payment method</td>
                    <td>subscription-renewal-notice-card-valid</td>
                </tr>
                <tr>
                    <td><strong>Invoice Upcoming - Expired Card</strong></td>
                    <td>Urgent warning for expired payment method</td>
                    <td>subscription-renewal-notice-card-expired</td>
                </tr>
                <tr>
                    <td><strong>Payment Failed</strong></td>
                    <td>Payment failure notification</td>
                    <td>subscription-payment-failed</td>
                </tr>
                <tr>
                    <td><strong>Payment Succeeded</strong></td>
                    <td>Successful payment confirmation</td>
                    <td>subscription-payment-succeeded</td>
                </tr>
            </table>

            <h2 id="real-vs-mock">Real vs Mock Webhook Differences</h2>

            <div class="warning">
                <strong>Key Insight:</strong> Real Stripe webhooks contain minimal data - most information requires additional API calls.
            </div>

            <h3>What Real Webhooks Include</h3>
            <div class="example">
                <pre><code>{
  "data": {
    "object": {
      "customer": "cus_xxx",           // Customer ID only
      "customer_email": "user@...",     // Email address  
      "customer_name": "John Smith",    // Customer name
      "amount_due": 2999,              // Amount in pence
      "currency": "gbp",               // Currency code
      "period_end": 1711647634,        // Unix timestamp
      "subscription": "sub_xxx"        // Subscription ID only
    }
  }
}</code></pre>
            </div>

            <h3>What's NOT Included</h3>
            <ul>
                <li><strong>No subscription object</strong> - Only ID provided</li>
                <li><strong>No payment method details</strong> - Must fetch separately</li>
                <li><strong>No card expiry information</strong> - Requires additional API call</li>
                <li><strong>No customer metadata</strong> - Only basic fields included</li>
            </ul>

            <h3>How Our Testing Simulates Production</h3>
            <ol>
                <li><strong>Real webhook payload</strong> sent to handler</li>
                <li><strong>Mock API filter</strong> intercepts Stripe API calls</li>
                <li><strong>Returns appropriate data</strong> based on card status selection</li>
                <li><strong>Processes exactly like production</strong> including validation logic</li>
                <li><strong>Sends actual emails</strong> via Mandrill</li>
            </ol>

            <h2 id="stripe-cli">Stripe CLI Testing</h2>

            <p>For production-level testing with live Stripe events:</p>

            <h3>Installation</h3>
            <div class="example">
                <pre><code># macOS (via Homebrew)
brew install stripe/stripe-cli/stripe

# Linux
wget https://github.com/stripe/stripe-cli/releases/latest/download/stripe_linux_x86_64.tar.gz
tar -xvf stripe_linux_x86_64.tar.gz
sudo mv stripe /usr/local/bin

# Login
stripe login</code></pre>
            </div>

            <h3>Forward Webhooks to Local/Staging</h3>
            <div class="example">
                <pre><code># Local development
stripe listen --forward-to https://yourlocal.dev/?wps-listener=stripe

# Staging environment  
stripe listen --forward-to https://staging.yourdomain.com/?wps-listener=stripe

# Specific events only
stripe listen --events invoice.upcoming,invoice.payment_failed \
  --forward-to https://yoursite.com/?wps-listener=stripe</code></pre>
            </div>

            <h3>Trigger Test Events</h3>
            <div class="example">
                <pre><code># Basic triggers
stripe trigger invoice.upcoming
stripe trigger invoice.payment_failed
stripe trigger invoice.payment_succeeded

# With custom customer data
CUSTOMER_ID=$(stripe customers create --email="test@example.com" | grep '"id"' | cut -d'"' -f4)
stripe trigger invoice.upcoming --override customer=$CUSTOMER_ID</code></pre>
            </div>

            <h3>Monitor in Real-Time</h3>
            <div class="example">
                <pre><code># Watch events with JSON output
stripe listen --print-json

# View recent webhook events
stripe events list --limit=10

# Get specific event details
stripe events retrieve evt_1234567890</code></pre>
            </div>

            <h2 id="troubleshooting">Troubleshooting</h2>

            <h3>Common Issues</h3>

            <div class="danger">
                <h4>No Email Received</h4>
                <ul>
                    <li>Check Mandrill template exists and is published</li>
                    <li>Verify pi-transactional plugin is active</li>
                    <li>Check WordPress error log for email sending errors</li>
                    <li>Test Mandrill API key in pi-transactional settings</li>
                </ul>
            </div>

            <div class="warning">
                <h4>Webhook Signature Errors</h4>
                <ul>
                    <li>Verify webhook secret in WordPress Stripe settings</li>
                    <li>Ensure secret starts with <code>whsec_</code></li>
                    <li>Check that endpoint URL is correct</li>
                </ul>
            </div>

            <div class="warning">
                <h4>User Not Found Errors</h4>
                <ul>
                    <li>Check WordPress user has <code>stripe-customer</code> meta field</li>
                    <li>Verify customer email matches WordPress user email</li>
                    <li>Test with existing WordPress user account</li>
                </ul>
            </div>

            <h3>Debug Logs</h3>

            <p>Check these locations for detailed webhook processing information:</p>

            <table>
                <tr>
                    <th>Log Location</th>
                    <th>What It Contains</th>
                </tr>
                <tr>
                    <td>WordPress Error Log</td>
                    <td>All webhook processing steps and errors</td>
                </tr>
                <tr>
                    <td>/tmp/upcoming-debug.log</td>
                    <td>Detailed renewal webhook processing</td>
                </tr>
                <tr>
                    <td>Admin Test Interface</td>
                    <td>Real-time processing output</td>
                </tr>
                <tr>
                    <td>Stripe Dashboard</td>
                    <td>Webhook delivery status and attempts</td>
                </tr>
            </table>

            <h3>Enable Debug Mode</h3>
            <div class="example">
                <pre><code>// Add to wp-config.php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);</code></pre>
            </div>

            <h2 id="reference">Reference</h2>

            <h3>Required Mandrill Templates</h3>
            <table>
                <tr>
                    <th>Template Name</th>
                    <th>Purpose</th>
                    <th>Merge Variables</th>
                </tr>
                <tr>
                    <td>subscription-renewal-notice-card-valid</td>
                    <td>Valid card renewal reminder</td>
                    <td>USER_NAME, RENEWAL_DATE, AMOUNT, ACCOUNT_URL</td>
                </tr>
                <tr>
                    <td>subscription-renewal-notice-card-expired</td>
                    <td>Expired card warning</td>
                    <td>USER_NAME, RENEWAL_DATE, AMOUNT, UPDATE_PAYMENT_URL</td>
                </tr>
                <tr>
                    <td>subscription-payment-failed</td>
                    <td>Payment failure notification</td>
                    <td>USER_NAME, FAILURE_DATE, NEXT_ATTEMPT_DATE, AMOUNT</td>
                </tr>
                <tr>
                    <td>subscription-payment-succeeded</td>
                    <td>Payment success confirmation</td>
                    <td>USER_NAME, PAYMENT_DATE, AMOUNT, NEXT_BILLING_DATE</td>
                </tr>
            </table>

            <h3>Webhook Endpoints</h3>
            <ul>
                <li><strong>Production:</strong> <code>https://yourdomain.com/?wps-listener=stripe</code></li>
                <li><strong>Staging:</strong> <code>https://staging.yourdomain.com/?wps-listener=stripe</code></li>
                <li><strong>Local:</strong> <code>https://yourlocal.dev/?wps-listener=stripe</code></li>
            </ul>

            <h3>Stripe Events Handled</h3>
            <ul>
                <li><code>invoice.upcoming</code> - 3 days before renewal</li>
                <li><code>invoice.payment_failed</code> - Payment failures</li>
                <li><code>invoice.payment_succeeded</code> - Successful payments</li>
                <li><code>customer.subscription.updated</code> - Subscription changes</li>
                <li><code>customer.subscription.deleted</code> - Cancellations</li>
            </ul>

            <footer style="margin-top: 50px; padding-top: 20px; border-top: 1px solid #eee; color: #666; text-align: center;">
                <p>&copy; 2026 Policing Insight | <a href="/docs/logout.php">Logout</a></p>
            </footer>
        </main>
    </div>
</body>
</html>