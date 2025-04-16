<footer class="site-footer">
    <div class="footer-content">
        <div class="social-links">
            <?php
            $social_fields = array(
                'facebook' => array('icon' => 'fa-facebook', 'text' => 'facebook_text'),
                'twitter' => array('icon' => 'fa-twitter', 'text' => 'twitter_text'),
                'instagram' => array('icon' => 'fa-instagram', 'text' => 'instagram_text'),
                'linkedin' => array('icon' => 'fa-linkedin', 'text' => 'linkedin_text'),
            );
            $lang = get_theme_mod('site_language', 'en');
            foreach ($social_fields as $field => $data) {
                $url = get_theme_mod("social_$field", '');
                if ($url) {
                    echo '<a href="' . esc_url($url) . '" class="social-link" title="' . esc_attr(get_theme_mod($data['text'] . '_' . $lang, __($data['text'], 'callamir'))) . '"><i class="fa ' . esc_attr($data['icon']) . '"></i></a>';
                }
            }
            ?>
        </div>
        <div class="copyright"><?php _e('© 2025 Callamir. All rights reserved.', 'callamir'); ?></div>
    </div>
</footer>
<button class="home-button"><?php echo esc_html(get_theme_mod('home_button_' . get_theme_mod('site_language', 'en'), __('Home', 'callamir'))); ?></button>

<!-- YouTube Popup -->
<div class="youtube-popup" id="youtube-popup">
    <div class="popup-content">
        <span class="popup-close">&times;</span>
        <p><?php echo esc_html(get_theme_mod('youtube_popup_' . get_theme_mod('site_language', 'en'), __('Subscribe to stay updated with our latest videos!', 'callamir'))); ?></p>
        <div class="youtube-video">
            <iframe src="https://www.youtube.com/embed/<?php echo esc_attr(get_theme_mod('youtube_video_id', 'dQw4w9WgXcQ')); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <a href="<?php echo esc_url(get_theme_mod('youtube_channel_url', 'https://www.youtube.com/@callamir?sub_confirmation=1')); ?>" class="subscribe-button"><?php echo esc_html(get_theme_mod('subscribe_now_' . get_theme_mod('site_language', 'en'), __('Subscribe Now', 'callamir'))); ?></a>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>