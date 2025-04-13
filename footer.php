<?php
/**
 * Footer file for Callamir Theme
 */
?>
<footer class="site-footer">
    <div class="footer-content">
        <p><?php echo esc_html__('Follow us on social media:', 'callamir'); ?> 
            <a href="https://facebook.com">Facebook</a> | 
            <a href="https://twitter.com">Twitter</a>
        </p>
        <p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php echo esc_html__('All rights reserved.', 'callamir'); ?></p>
    </div>
    <!-- Home Button (Mobile Only) -->
    <button class="home-button"><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'خانه' : 'Home'; ?></button>
</footer>
<?php wp_footer(); ?>
</body>
</html>