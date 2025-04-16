<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> <?php echo get_theme_mod('site_language', 'en') === 'fa' ? 'dir="rtl"' : 'dir="ltr"'; ?>>
    <div class="lang-flags">
        <span class="flag-text"><?php echo esc_html(get_theme_mod('flag_text_' . get_theme_mod('site_language', 'en'), __('Languages:', 'callamir'))); ?></span>
        <a href="#" class="lang-flag-link" data-lang="en"><img src="<?php echo get_template_directory_uri(); ?>/images/uk-flag.png" alt="<?php _e('English', 'callamir'); ?>"></a>
        <a href="#" class="lang-flag-link" data-lang="fa"><img src="<?php echo get_template_directory_uri(); ?>/images/iran-flag.png" alt="<?php _e('Persian', 'callamir'); ?>"></a>
    </div>
    <nav class="nav-menu">
        <div class="nav-container">
            <ul class="nav-menu-items">
                <li><a href="#hero" class="nav-home"><?php echo esc_html(get_theme_mod('menu_home_' . get_theme_mod('site_language', 'en'), __('Home', 'callamir'))); ?></a></li>
                <li><a href="#subscribe" class="nav-subscribe"><?php echo esc_html(get_theme_mod('menu_subscribe_' . get_theme_mod('site_language', 'en'), __('Subscribe', 'callamir'))); ?></a></li>
                <li><a href="#services" class="nav-services"><?php echo esc_html(get_theme_mod('menu_services_' . get_theme_mod('site_language', 'en'), __('Services', 'callamir'))); ?></a></li>
                <li><a href="#blog" class="nav-blog"><?php echo esc_html(get_theme_mod('menu_blog_' . get_theme_mod('site_language', 'en'), __('Blog', 'callamir'))); ?></a></li>
                <li><a href="#community" class="nav-community"><?php echo esc_html(get_theme_mod('menu_community_' . get_theme_mod('site_language', 'en'), __('Ask', 'callamir'))); ?></a></li>
                <li><a href="#contact" class="nav-contact"><?php echo esc_html(get_theme_mod('menu_contact_' . get_theme_mod('site_language', 'en'), __('Contact', 'callamir'))); ?></a></li>
            </ul>
        </div>
        <button class="nav-button"><span class="nav-text"><?php echo esc_html(get_theme_mod('nav_button_' . get_theme_mod('site_language', 'en'), __('Next Section', 'callamir'))); ?></span> <span class="nav-arrow">→</span></button>
    </nav>