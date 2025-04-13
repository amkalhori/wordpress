<?php
/**
 * Header file for Callamir Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> dir="<?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'rtl' : 'ltr'; ?>">
    <div class="lang-flags">
        <?php
        $lang = isset($_GET['lang']) && $_GET['lang'] === 'fa' ? 'fa' : 'en';
        $flag_text = get_theme_mod("flag_text_$lang", $lang === 'fa' ? 'زبان‌ها:' : 'Languages:');
        echo '<span class="flag-text">' . esc_html($flag_text) . '</span>';
        ?>
        <a href="#" class="lang-flag-link" data-lang="en"><img src="<?php echo get_template_directory_uri(); ?>/images/uk-flag.png" alt="English"></a>
        <a href="#" class="lang-flag-link" data-lang="fa"><img src="<?php echo get_template_directory_uri(); ?>/images/iran-flag.png" alt="فارسی"></a>
    </div>
    <!-- Navigation -->
    <div class="nav-menu">
        <div class="nav-container">
            <?php
            $args = array(
                'theme_location' => 'primary-menu',
                'container' => false,
                'menu_class' => 'nav-menu-items',
                'depth' => 1,
                'items_wrap' => '<ul class="%2$s">%3$s</ul>'
            );
            if ($lang === 'fa') {
                $args['menu_order'] = 'desc';
            }
            wp_nav_menu($args);
            ?>
        </div>
        <!-- Navigate Button (Mobile Only) with Down Arrow -->
        <button class="nav-button">
            <span class="nav-text"><?php echo $lang === 'fa' ? 'بخش بعدی' : 'Next Section'; ?></span>
            <span class="nav-arrow">↓</span>
        </button>
    </div>