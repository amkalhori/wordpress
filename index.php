<?php get_header(); ?>

<main>
    <!-- Hero Section -->
    <section class="hero" id="hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero-bg.jpg');">
        <h1 id="hero-title"><?php echo esc_html(get_theme_mod('hero_title_' . get_theme_mod('site_language', 'en'), __('Simplifying Tech for Seniors & Small Businesses', 'callamir'))); ?></h1>
        <p id="hero-text"><?php echo esc_html(get_theme_mod('hero_text_' . get_theme_mod('site_language', 'en'), __('Reliable, friendly, and easy IT support.', 'callamir'))); ?></p>
        <a href="#contact" class="hero-button" id="hero-btn"><?php echo esc_html(get_theme_mod('hero_btn_' . get_theme_mod('site_language', 'en'), __('Get IT Support Now', 'callamir'))); ?></a>
        <p id="hero-subtext"><?php echo esc_html(get_theme_mod('hero_subtext_' . get_theme_mod('site_language', 'en'), __('I’m here to make technology easy and stress-free for seniors and small businesses.', 'callamir'))); ?></p>
    </section>

    <!-- Subscribe Section -->
    <section class="subscribe" id="subscribe">
        <h2 id="subscribe-title"><?php echo esc_html(get_theme_mod('subscribe_title_' . get_theme_mod('site_language', 'en'), __('Subscribe', 'callamir'))); ?></h2>
        <div class="youtube-container">
            <div class="youtube-video">
                <iframe src="https://www.youtube.com/embed/<?php echo esc_attr(get_theme_mod('youtube_video_id', 'dQw4w9WgXcQ')); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <a href="<?php echo esc_url(get_theme_mod('youtube_channel_url', 'https://www.youtube.com/@callamir?sub_confirmation=1')); ?>" class="subscribe-button" id="subscribe-now"><?php echo esc_html(get_theme_mod('subscribe_now_' . get_theme_mod('site_language', 'en'), __('Subscribe Now', 'callamir'))); ?></a>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <h2 id="services-title"><?php echo esc_html(get_theme_mod('services_title_' . get_theme_mod('site_language', 'en'), __('Our Services', 'callamir'))); ?></h2>
        <div class="services-list">
            <?php
            for ($i = 1; $i <= 5; $i++) {
                $name = get_theme_mod("service_name_$i", '');
                $icon_type = get_theme_mod("service_icon_type_$i", 'image');
                $icon_image = get_theme_mod("service_icon_image_$i", '');
                $icon_fa = get_theme_mod("service_icon_fa_$i", '');
                $icon_fa_custom = get_theme_mod("service_icon_fa_custom_$i", '');
                $link = get_theme_mod("service_link_$i", '#');
                $desc = get_theme_mod("service_desc_$i", '');
                if ($name) {
                    echo '<div class="service-item">';
                    echo '<a href="' . esc_url($link) . '" class="service-link">';
                    if ($icon_type === 'image' && $icon_image) {
                        echo '<img src="' . esc_url($icon_image) . '" alt="' . esc_attr($name) . '" class="service-icon">';
                    } elseif ($icon_type === 'fontawesome' && ($icon_fa || $icon_fa_custom)) {
                        $fa_class = $icon_fa === 'custom' ? $icon_fa_custom : $icon_fa;
                        echo '<i class="fa ' . esc_attr($fa_class) . ' service-icon"></i>';
                    }
                    echo esc_html($name) . '</a>';
                    echo '<div class="service-desc">' . esc_html($desc) . '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="blog" id="blog">
        <h2 id="blog-title"><?php echo esc_html(get_theme_mod('blog_title_' . get_theme_mod('site_language', 'en'), __('Blog', 'callamir'))); ?></h2>
        <div class="blog-list">
            <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $args = array('posts_per_page' => 10, 'paged' => $paged);
            $blog_query = new WP_Query($args);
            if ($blog_query->have_posts()) :
                while ($blog_query->have_posts()) : $blog_query->the_post();
                    $icon_type = get_post_meta(get_the_ID(), '_callamir_icon_type', true);
                    $icon_image = get_post_meta(get_the_ID(), '_callamir_icon_image', true);
                    $icon_fa = get_post_meta(get_the_ID(), '_callamir_icon_fa', true);
                    $icon_fa_custom = get_post_meta(get_the_ID(), '_callamir_icon_fa_custom', true);
                    ?>
                    <div class="blog-item">
                        <a href="<?php the_permalink(); ?>" class="blog-link">
                            <?php
                            if ($icon_type === 'image' && $icon_image) {
                                echo '<img src="' . esc_url($icon_image) . '" alt="' . esc_attr(get_the_title()) . '" class="blog-icon">';
                            } elseif ($icon_type === 'fontawesome' && ($icon_fa || $icon_fa_custom)) {
                                $fa_class = $icon_fa === 'custom' ? $icon_fa_custom : $icon_fa;
                                echo '<i class="fa ' . esc_attr($fa_class) . ' blog-icon"></i>';
                            } else {
                                echo '<i class="fa fa-file-text-o blog-icon"></i>';
                            }
                            ?>
                            <h3><?php the_title(); ?></h3>
                        </a>
                        <div class="post-date"><?php _e('Posted on', 'callamir'); ?> <?php the_date(); ?></div>
                        <div class="post-comments">
                            <a href="<?php comments_link(); ?>"><?php comments_number(__('No Comments', 'callamir'), __('1 Comment', 'callamir'), __('% Comments', 'callamir')); ?></a>
                        </div>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                <?php endwhile; ?>
        </div>
        <div class="blog-pagination">
            <?php
            echo paginate_links(array(
                'total' => $blog_query->max_num_pages,
                'current' => max(1, $paged),
                'prev_text' => __('«', 'callamir'),
                'next_text' => __('»', 'callamir'),
            ));
            wp_reset_postdata();
            ?>
        </div>
        <?php else : ?>
            <p><?php _e('No posts found.', 'callamir'); ?></p>
        <?php endif; ?>
    </section>

    <!-- Community Q&A Section -->
    <section class="community" id="community">
        <h2 id="community-title"><?php echo esc_html(get_theme_mod('community_title_' . get_theme_mod('site_language', 'en'), __('Ask a Question', 'callamir'))); ?></h2>
        <div class="community-form">
            <?php
            $shortcode = get_theme_mod('community_form_shortcode', '');
            if ($shortcode) {
                echo do_shortcode($shortcode);
            } else {
                echo '<p>' . esc_html__('Please configure a Community Form 7 shortcode in the Customizer.', 'callamir') . '</p>';
            }
            ?>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <h2 id="contact-title"><?php echo esc_html(get_theme_mod('contact_title_' . get_theme_mod('site_language', 'en'), __('Contact Us', 'callamir'))); ?></h2>
        <div class="contact-links">
            <?php
            $contact_fields = array(
                'whatsapp' => array('url' => 'https://wa.me/1234567890', 'icon' => 'fa-whatsapp', 'text' => 'whatsapp_text'),
                'cellphone' => array('url' => 'tel:+1234567890', 'icon' => 'fa-phone', 'text' => 'cellphone_text'),
                'telegram' => array('url' => 'https://t.me/callamir', 'icon' => 'fa-telegram', 'text' => 'telegram_text'),
                'sms' => array('url' => 'sms:+1234567890', 'icon' => 'fa-comment', 'text' => 'sms_text'),
                'messenger' => array('url' => 'https://m.me/callamir', 'icon' => 'fa-comment', 'text' => 'messenger_text'),
                'instagram' => array('url' => 'https://instagram.com/callamir', 'icon' => 'fa-instagram', 'text' => 'instagram_text'),
                'snapchat' => array('url' => 'https://snapchat.com/add/callamir', 'icon' => 'fa-snapchat', 'text' => 'snapchat_text'),
            );
            $lang = get_theme_mod('site_language', 'en');
            foreach ($contact_fields as $field => $data) {
                $custom_url = get_theme_mod("contact_$field", $data['url']);
                if ($custom_url) {
                    echo '<a href="' . esc_url($custom_url) . '" class="contact-link ' . esc_attr($field) . '"><i class="fa ' . esc_attr($data['icon']) . '"></i> ' . esc_html(get_theme_mod($data['text'] . '_' . $lang, __($data['text'], 'callamir'))) . '</a>';
                }
            }
            ?>
        </div>
        <div class="contact-form">
            <?php
            $shortcode = get_theme_mod('contact_form_shortcode', '');
            if ($shortcode) {
                echo do_shortcode($shortcode);
            } else {
                echo '<p>' . esc_html__('Please configure a Contact Form 7 shortcode in the Customizer.', 'callamir') . '</p>';
            }
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>