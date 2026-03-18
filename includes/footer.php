        </div>
    </div>
    
    <footer style="margin-top: 50px; padding: 20px; text-align: center; color: #666; font-size: 0.9em; border-top: 1px solid #e0e0e0;">
        <p>
            <?php if (isset($last_updated)): ?>
                Last Updated: <?php echo $last_updated; ?> | 
            <?php endif; ?>
            Generated: <?php echo date('F j, Y'); ?> | 
            <a href="/docs/logout.php" style="color: #007bff;">Logout</a>
        </p>
    </footer>
</body>
</html>