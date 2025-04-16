<?php
/**
 * Callamir Theme Functions
 */
function callamir_load_theme_textdomain() {
    load_theme_textdomain('callamir', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'callamir_load_theme_textdomain');

function callamir_enqueue_styles() {
    wp_enqueue_style('callamir-style', get_stylesheet_uri(), array(), '1.0.51');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0');
    wp_enqueue_style('eb-garamond', 'https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;700&display=swap', array(), null);
}

function callamir_enqueue_scripts() {
    wp_enqueue_script('callamir-script', get_template_directory_uri() . '/js/theme.js', array('jquery'), '1.0.13', true);
    wp_localize_script('callamir-script', 'callamirAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('callamir_nonce')
    ));
    $lang = get_theme_mod('site_language', 'en');
    $text = array(
        'en' => array(
            'hero_title' => get_theme_mod('hero_title_en', __('Simplifying Tech for Seniors & Small Businesses', 'callamir')),
            'hero_text' => get_theme_mod('hero_text_en', __('Reliable, friendly, and easy IT support.', 'callamir')),
            'hero_btn' => get_theme_mod('hero_btn_en', __('Get IT Support Now', 'callamir')),
            'hero_subtext' => get_theme_mod('hero_subtext_en', __('I’m here to make technology easy and stress-free for seniors and small businesses.', 'callamir')),
            'services_title' => get_theme_mod('services_title_en', __('Our Services', 'callamir')),
            'contact_title' => get_theme_mod('contact_title_en', __('Contact Us', 'callamir')),
            'community_title' => get_theme_mod('community_title_en', __('Ask a Question', 'callamir')),
            'blog_title' => get_theme_mod('blog_title_en', __('Blog', 'callamir')),
            'subscribe_title' => get_theme_mod('subscribe_title_en', __('Subscribe', 'callamir')),
            'youtube_popup' => get_theme_mod('youtube_popup_en', __('Subscribe to stay updated with our latest videos!', 'callamir')),
            'subscribe_now' => get_theme_mod('subscribe_now_en', __('Subscribe Now', 'callamir')),
            'subscribe_prompt' => get_theme_mod('subscribe_prompt_en', __('Please subscribe to our YouTube channel first!', 'callamir')),
            'prompt_close' => get_theme_mod('prompt_close_en', __('Close', 'callamir')),
            'nav_button' => get_theme_mod('nav_button_en', __('Next Section', 'callamir')),
            'home_button' => get_theme_mod('home_button_en', __('Home', 'callamir')),
            'flag_text' => get_theme_mod('flag_text_en', __('Languages:', 'callamir')),
            'whatsapp_text' => get_theme_mod('whatsapp_text_en', __('WhatsApp', 'callamir')),
            'cellphone_text' => get_theme_mod('cellphone_text_en', __('Call', 'callamir')),
            'telegram_text' => get_theme_mod('telegram_text_en', __('Telegram', 'callamir')),
            'sms_text' => get_theme_mod('sms_text_en', __('SMS', 'callamir')),
            'messenger_text' => get_theme_mod('messenger_text_en', __('Messenger', 'callamir')),
            'instagram_text' => get_theme_mod('instagram_text_en', __('Instagram', 'callamir')),
            'snapchat_text' => get_theme_mod('snapchat_text_en', __('Snapchat', 'callamir')),
            'facebook_text' => get_theme_mod('facebook_text_en', __('Facebook', 'callamir')),
            'twitter_text' => get_theme_mod('twitter_text_en', __('Twitter', 'callamir')),
            'linkedin_text' => get_theme_mod('linkedin_text_en', __('LinkedIn', 'callamir')),
            'menu_home' => get_theme_mod('menu_home_en', __('Home', 'callamir')),
            'menu_subscribe' => get_theme_mod('menu_subscribe_en', __('Subscribe', 'callamir')),
            'menu_services' => get_theme_mod('menu_services_en', __('Services', 'callamir')),
            'menu_blog' => get_theme_mod('menu_blog_en', __('Blog', 'callamir')),
            'menu_community' => get_theme_mod('menu_community_en', __('Ask', 'callamir')),
            'menu_contact' => get_theme_mod('menu_contact_en', __('Contact', 'callamir')),
        ),
        'fa' => array(
            'hero_title' => get_theme_mod('hero_title_fa', __('سادگی تکنولوژی برای سالمندان و کسب و کارهای کوچک', 'callamir')),
            'hero_text' => get_theme_mod('hero_text_fa', __('پشتیبانی آی تی قابل اعتماد، دوستانه و آسان.', 'callamir')),
            'hero_btn' => get_theme_mod('hero_btn_fa', __('دریافت پشتیبانی آی تی', 'callamir')),
            'hero_subtext' => get_theme_mod('hero_subtext_fa', __('من اینجا هستم تا تکنولوژی را برای سالمندان و کسب‌وکارهای کوچک آسان و بدون استرس کنم.', 'callamir')),
            'services_title' => get_theme_mod('services_title_fa', __('خدمات', 'callamir')),
            'contact_title' => get_theme_mod('contact_title_fa', __('تماس با ما', 'callamir')),
            'community_title' => get_theme_mod('community_title_fa', __('سوال بپرسید', 'callamir')),
            'blog_title' => get_theme_mod('blog_title_fa', __('وبلاگ', 'callamir')),
            'subscribe_title' => get_theme_mod('subscribe_title_fa', __('اشتراک', 'callamir')),
            'youtube_popup' => get_theme_mod('youtube_popup_fa', __('برای به‌روز ماندن با آخرین ویدیوهای ما اشتراک کنید!', 'callamir')),
            'subscribe_now' => get_theme_mod('subscribe_now_fa', __('اکنون اشتراک کنید', 'callamir')),
            'subscribe_prompt' => get_theme_mod('subscribe_prompt_fa', __('لطفاً ابتدا در کانال یوتیوب ما اشتراک کنید!', 'callamir')),
            'prompt_close' => get_theme_mod('prompt_close_fa', __('بستن', 'callamir')),
            'nav_button' => get_theme_mod('nav_button_fa', __('بخش بعدی', 'callamir')),
            'home_button' => get_theme_mod('home_button_fa', __('خانه', 'callamir')),
            'flag_text' => get_theme_mod('flag_text_fa', __('زبان‌ها:', 'callamir')),
            'whatsapp_text' => get_theme_mod('whatsapp_text_fa', __('واتساپ', 'callamir')),
            'cellphone_text' => get_theme_mod('cellphone_text_fa', __('تلفن', 'callamir')),
            'telegram_text' => get_theme_mod('telegram_text_fa', __('تلگرام', 'callamir')),
            'sms_text' => get_theme_mod('sms_text_fa', __('پیامک', 'callamir')),
            'messenger_text' => get_theme_mod('messenger_text_fa', __('مسنجر', 'callamir')),
            'instagram_text' => get_theme_mod('instagram_text_fa', __('اینستاگرام', 'callamir')),
            'snapchat_text' => get_theme_mod('snapchat_text_fa', __('اسنپ‌چت', 'callamir')),
            'facebook_text' => get_theme_mod('facebook_text_fa', __('فیسبوک', 'callamir')),
            'twitter_text' => get_theme_mod('twitter_text_fa', __('توییتر', 'callamir')),
            'linkedin_text' => get_theme_mod('linkedin_text_fa', __('لینکدین', 'callamir')),
            'menu_home' => get_theme_mod('menu_home_fa', __('خانه', 'callamir')),
            'menu_subscribe' => get_theme_mod('menu_subscribe_fa', __('اشتراک', 'callamir')),
            'menu_services' => get_theme_mod('menu_services_fa', __('خدمات', 'callamir')),
            'menu_blog' => get_theme_mod('menu_blog_fa', __('وبلاگ', 'callamir')),
            'menu_community' => get_theme_mod('menu_community_fa', __('سوال', 'callamir')),
            'menu_contact' => get_theme_mod('menu_contact_fa', __('تماس', 'callamir')),
        )
    );
    wp_localize_script('callamir-script', 'callamirText', array(
        'lang' => $lang,
        'text' => $text
    ));
}

add_action('wp_enqueue_scripts', 'callamir_enqueue_styles');
add_action('wp_enqueue_scripts', 'callamir_enqueue_scripts');

add_theme_support('post-thumbnails');
add_theme_support('menus');
add_theme_support('title-tag');

// Enable comments on posts
add_action('init', function() {
    add_post_type_support('post', 'comments');
});

// Blog Post Icon Meta Box
function callamir_add_post_icon_meta_box() {
    add_meta_box(
        'callamir_post_icon',
        __('Blog Post Icon', 'callamir'),
        'callamir_post_icon_meta_box_callback',
        'post',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'callamir_add_post_icon_meta_box');

function callamir_post_icon_meta_box_callback($post) {
    wp_nonce_field('callamir_save_post_icon', 'callamir_post_icon_nonce');
    $icon_type = get_post_meta($post->ID, '_callamir_icon_type', true);
    $icon_image = get_post_meta($post->ID, '_callamir_icon_image', true);
    $icon_fa = get_post_meta($post->ID, '_callamir_icon_fa', true);
    $icon_fa_custom = get_post_meta($post->ID, '_callamir_icon_fa_custom', true);
    ?>
    <p>
        <label><?php _e('Icon Type', 'callamir'); ?></label><br>
        <select name="callamir_icon_type">
            <option value="image" <?php selected($icon_type, 'image'); ?>><?php _e('Image', 'callamir'); ?></option>
            <option value="fontawesome" <?php selected($icon_type, 'fontawesome'); ?>><?php _e('Font Awesome', 'callamir'); ?></option>
        </select>
    </p>
    <p class="callamir-icon-image" <?php if ($icon_type !== 'image') echo 'style="display:none;"'; ?>>
        <label><?php _e('Icon Image', 'callamir'); ?></label><br>
        <input type="text" name="callamir_icon_image" value="<?php echo esc_url($icon_image); ?>" style="width:100%;">
        <button type="button" class="button callamir-upload-button"><?php _e('Upload Image', 'callamir'); ?></button>
        <br><small><?php _e('Recommended: 32x32px PNG/SVG', 'callamir'); ?></small>
    </p>
    <p class="callamir-icon-fa" <?php if ($icon_type !== 'fontawesome') echo 'style="display:none;"'; ?>>
        <label><?php _e('Font Awesome Icon', 'callamir'); ?></label><br>
        <select name="callamir_icon_fa">
            <option value="" <?php selected($icon_fa, ''); ?>><?php _e('None', 'callamir'); ?></option>
            <option value="fa-smile-o" <?php selected($icon_fa, 'fa-smile-o'); ?>><?php _e('Smile', 'callamir'); ?></option>
            <option value="fa-laugh" <?php selected($icon_fa, 'fa-laugh'); ?>><?php _e('Laugh', 'callamir'); ?></option>
            <option value="fa-star" <?php selected($icon_fa, 'fa-star'); ?>><?php _e('Star', 'callamir'); ?></option>
            <option value="fa-rocket" <?php selected($icon_fa, 'fa-rocket'); ?>><?php _e('Rocket', 'callamir'); ?></option>
            <option value="fa-paw" <?php selected($icon_fa, 'fa-paw'); ?>><?php _e('Paw', 'callamir'); ?></option>
            <option value="custom" <?php selected($icon_fa, 'custom'); ?>><?php _e('Custom', 'callamir'); ?></option>
        </select>
    </p>
    <p class="callamir-icon-fa-custom" <?php if ($icon_fa !== 'custom') echo 'style="display:none;"'; ?>>
        <label><?php _e('Custom Font Awesome Class', 'callamir'); ?></label><br>
        <input type="text" name="callamir_icon_fa_custom" value="<?php echo esc_attr($icon_fa_custom); ?>" style="width:100%;">
        <br><small><?php _e('E.g., fa-laptop', 'callamir'); ?></small>
    </p>
    <script>
    jQuery(document).ready(function($) {
        $('select[name="callamir_icon_type"]').on('change', function() {
            var value = $(this).val();
            $('.callamir-icon-image').toggle(value === 'image');
            $('.callamir-icon-fa').toggle(value === 'fontawesome');
            $('.callamir-icon-fa-custom').toggle(value === 'fontawesome' && $('select[name="callamir_icon_fa"]').val() === 'custom');
        });
        $('select[name="callamir_icon_fa"]').on('change', function() {
            $('.callamir-icon-fa-custom').toggle($(this).val() === 'custom');
        });
        $('.callamir-upload-button').on('click', function(e) {
            e.preventDefault();
            var frame = wp.media({
                title: '<?php _e('Select Icon', 'callamir'); ?>',
                button: { text: '<?php _e('Use Image', 'callamir'); ?>' },
                multiple: false
            });
            frame.on('select', function() {
                var attachment = frame.state().get('selection').first().toJSON();
                $('input[name="callamir_icon_image"]').val(attachment.url);
            });
            frame.open();
        });
    });
    </script>
    <?php
}

function callamir_save_post_icon($post_id) {
    if (!isset($_POST['callamir_post_icon_nonce']) || !wp_verify_nonce($_POST['callamir_post_icon_nonce'], 'callamir_save_post_icon')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    update_post_meta($post_id, '_callamir_icon_type', sanitize_text_field($_POST['callamir_icon_type']));
    update_post_meta($post_id, '_callamir_icon_image', esc_url_raw($_POST['callamir_icon_image']));
    update_post_meta($post_id, '_callamir_icon_fa', sanitize_text_field($_POST['callamir_icon_fa']));
    update_post_meta($post_id, '_callamir_icon_fa_custom', sanitize_text_field($_POST['callamir_icon_fa_custom']));
}
add_action('save_post', 'callamir_save_post_icon');

function callamir_register_menus() {
    register_nav_menus(array('primary-menu' => __('Primary Menu', 'callamir')));
}
add_action('init', 'callamir_register_menus');

function callamir_customizer($wp_customize) {
    // Language Settings
    $wp_customize->add_section('language_settings', array('title' => __('Language Settings', 'callamir'), 'priority' => 20));
    $wp_customize->add_setting('site_language', array('default' => 'en', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('site_language', array(
        'label' => __('Site Language', 'callamir'),
        'section' => 'language_settings',
        'type' => 'select',
        'choices' => array('en' => __('English', 'callamir'), 'fa' => __('Persian', 'callamir'))
    ));

    // Text Settings
    $wp_customize->add_section('text_settings', array('title' => __('Text Settings', 'callamir'), 'priority' => 21));
    $texts = array(
        'hero_title' => array('en' => 'Simplifying Tech for Seniors & Small Businesses', 'fa' => 'سادگی تکنولوژی برای سالمندان و کسب و کارهای کوچک'),
        'hero_text' => array('en' => 'Reliable, friendly, and easy IT support.', 'fa' => 'پشتیبانی آی تی قابل اعتماد، دوستانه و آسان.'),
        'hero_btn' => array('en' => 'Get IT Support Now', 'fa' => 'دریافت پشتیبانی آی تی'),
        'hero_subtext' => array('en' => 'I’m here to make technology easy and stress-free for seniors and small businesses.', 'fa' => 'من اینجا هستم تا تکنولوژی را برای سالمندان و کسب‌وکارهای کوچک آسان و بدون استرس کنم.'),
        'services_title' => array('en' => 'Our Services', 'fa' => 'خدمات'),
        'contact_title' => array('en' => 'Contact Us', 'fa' => 'تماس با ما'),
        'community_title' => array('en' => 'Ask a Question', 'fa' => 'سوال بپرسید'),
        'blog_title' => array('en' => 'Blog', 'fa' => 'وبلاگ'),
        'subscribe_title' => array('en' => 'Subscribe', 'fa' => 'اشتراک'),
        'youtube_popup' => array('en' => 'Subscribe to stay updated with our latest videos!', 'fa' => 'برای به‌روز ماندن با آخرین ویدیوهای ما اشتراک کنید!'),
        'subscribe_now' => array('en' => 'Subscribe Now', 'fa' => 'اکنون اشتراک کنید'),
        'subscribe_prompt' => array('en' => 'Please subscribe to our YouTube channel first!', 'fa' => 'لطفاً ابتدا در کانال یوتیوب ما اشتراک کنید!'),
        'prompt_close' => array('en' => 'Close', 'fa' => 'بستن'),
        'nav_button' => array('en' => 'Next Section', 'fa' => 'بخش بعدی'),
        'home_button' => array('en' => 'Home', 'fa' => 'خانه'),
        'flag_text' => array('en' => 'Languages:', 'fa' => 'زبان‌ها:'),
        'whatsapp_text' => array('en' => 'WhatsApp', 'fa' => 'واتساپ'),
        'cellphone_text' => array('en' => 'Call', 'fa' => 'تلفن'),
        'telegram_text' => array('en' => 'Telegram', 'fa' => 'تلگرام'),
        'sms_text' => array('en' => 'SMS', 'fa' => 'پیامک'),
        'messenger_text' => array('en' => 'Messenger', 'fa' => 'مسنجر'),
        'instagram_text' => array('en' => 'Instagram', 'fa' => 'اینستاگرام'),
        'snapchat_text' => array('en' => 'Snapchat', 'fa' => 'اسنپ‌چت'),
        'facebook_text' => array('en' => 'Facebook', 'fa' => 'فیسبوک'),
        'twitter_text' => array('en' => 'Twitter', 'fa' => 'توییتر'),
        'linkedin_text' => array('en' => 'LinkedIn', 'fa' => 'لینکدین'),
    );
    foreach ($texts as $key => $defaults) {
        foreach (['en', 'fa'] as $lang) {
            $wp_customize->add_setting("{$key}_{$lang}", array('default' => $defaults[$lang], 'sanitize_callback' => 'sanitize_text_field'));
            $wp_customize->add_control("{$key}_{$lang}", array(
                'label' => __(ucfirst(str_replace('_', ' ', $key)) . " ($lang)", 'callamir'),
                'section' => 'text_settings',
                'type' => 'text'
            ));
        }
    }

    // Menu Settings
    $wp_customize->add_section('menu_settings', array('title' => __('Menu Settings', 'callamir'), 'priority' => 22));
    $menu_items = array(
        'home' => array('en' => 'Home', 'fa' => 'خانه'),
        'subscribe' => array('en' => 'Subscribe', 'fa' => 'اشتراک'),
        'services' => array('en' => 'Services', 'fa' => 'خدمات'),
        'blog' => array('en' => 'Blog', 'fa' => 'وبلاگ'),
        'community' => array('en' => 'Ask', 'fa' => 'سوال'),
        'contact' => array('en' => 'Contact', 'fa' => 'تماس'),
    );
    foreach ($menu_items as $key => $defaults) {
        foreach (['en', 'fa'] as $lang) {
            $wp_customize->add_setting("menu_{$key}_{$lang}", array('default' => $defaults[$lang], 'sanitize_callback' => 'sanitize_text_field'));
            $wp_customize->add_control("menu_{$key}_{$lang}", array(
                'label' => __(ucfirst($key) . " Menu ($lang)", 'callamir'),
                'section' => 'menu_settings',
                'type' => 'text'
            ));
        }
    }

    // Theme Colors
    $wp_customize->add_section('theme_colors', array('title' => __('Theme Colors', 'callamir'), 'priority' => 25));
    $wp_customize->add_setting('body_bg_color', array('default' => '#ffffff', 'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'refresh'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body_bg_color', array(
        'label' => __('Body Background Color', 'callamir'),
        'section' => 'theme_colors',
    )));
    $wp_customize->add_setting('primary_color', array('default' => '#ff0000', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array('label' => __('Primary Color', 'callamir'), 'section' => 'theme_colors')));
    $sections = array(
        'hero' => '#004466', 'services' => '#e6f7e6', 'contact' => '#fffcdd',
        'community' => '#e6f7e6', 'blog' => '#f9f9f9', 'subscribe' => '#f4f4f4', 'site-footer' => '#004466'
    );
    foreach ($sections as $section => $default_color) {
        $wp_customize->add_setting("{$section}_bg_color", array('default' => $default_color, 'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'refresh'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "{$section}_bg_color", array(
            'label' => __(ucfirst(str_replace('-', ' ', $section)) . ' Background Color', 'callamir'),
            'section' => 'theme_colors'
        )));
    }

    // Contact Settings
    $wp_customize->add_section('contact_settings', array('title' => __('Contact Settings', 'callamir'), 'priority' => 30));
    $contact_fields = array(
        'whatsapp' => 'WhatsApp URL', 'cellphone' => 'Cellphone Number (e.g., +1234567890)', 'telegram' => 'Telegram URL',
        'messenger' => 'Facebook Messenger URL', 'sms' => 'SMS Number (e.g., +1234567890)', 'instagram' => 'Instagram URL',
        'snapchat' => 'Snapchat URL'
    );
    foreach ($contact_fields as $field => $label) {
        $wp_customize->add_setting("contact_$field", array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_control("contact_$field", array('label' => $label, 'section' => 'contact_settings', 'type' => 'text'));
    }

    // Contact Form Settings
    $wp_customize->add_section('contact_form_settings', array('title' => __('Contact Form Settings', 'callamir'), 'priority' => 40));
    $wp_customize->add_setting('contact_form_shortcode', array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('contact_form_shortcode', array(
        'label' => __('Contact Form 7 Shortcode', 'callamir'),
        'section' => 'contact_form_settings',
        'type' => 'text',
        'description' => __('E.g., [contact-form-7 id="123" title="Contact"]', 'callamir')
    ));

    // Community Form Settings
    $wp_customize->add_section('community_form_settings', array('title' => __('Community Form Settings', 'callamir'), 'priority' => 41));
    $wp_customize->add_setting('community_form_shortcode', array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('community_form_shortcode', array(
        'label' => __('Community Form 7 Shortcode', 'callamir'),
        'section' => 'community_form_settings',
        'type' => 'text',
        'description' => __('E.g., [contact-form-7 id="124" title="Community"]', 'callamir')
    ));

    // Social Settings
    $wp_customize->add_section('social_settings', array('title' => __('Social Media Settings', 'callamir'), 'priority' => 45));
    $social_fields = array(
        'facebook' => 'Facebook URL', 'twitter' => 'Twitter URL',
        'instagram' => 'Instagram URL', 'linkedin' => 'LinkedIn URL'
    );
    foreach ($social_fields as $field => $label) {
        $wp_customize->add_setting("social_$field", array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control("social_$field", array('label' => $label, 'section' => 'social_settings', 'type' => 'url'));
    }

    // YouTube Settings
    $wp_customize->add_section('youtube_settings', array('title' => __('YouTube Settings', 'callamir'), 'priority' => 50));
    $wp_customize->add_setting('youtube_channel_url', array('default' => 'https://www.youtube.com/@callamir?sub_confirmation=1', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control('youtube_channel_url', array('label' => __('YouTube Channel URL', 'callamir'), 'section' => 'youtube_settings', 'type' => 'url'));
    $wp_customize->add_setting('youtube_video_id', array('default' => 'dQw4w9WgXcQ', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('youtube_video_id', array(
        'label' => __('YouTube Video ID', 'callamir'),
        'section' => 'youtube_settings',
        'type' => 'text',
        'description' => __('E.g., dQw4w9WgXcQ', 'callamir')
    ));

    // Services Settings
    $wp_customize->add_section('services_settings', array('title' => __('Services Settings', 'callamir'), 'priority' => 35));
    for ($i = 1; $i <= 5; $i++) {
        $wp_customize->add_setting("service_name_$i", array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_control("service_name_$i", array('label' => "Service $i Name", 'section' => 'services_settings', 'type' => 'text'));
        $wp_customize->add_setting("service_icon_type_$i", array('default' => 'image', 'sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_control("service_icon_type_$i", array(
            'label' => "Service $i Icon Type",
            'section' => 'services_settings',
            'type' => 'select',
            'choices' => array('image' => __('Image', 'callamir'), 'fontawesome' => __('Font Awesome', 'callamir'))
        ));
        $wp_customize->add_setting("service_icon_image_$i", array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "service_icon_image_$i", array(
            'label' => "Service $i Icon Image",
            'section' => 'services_settings',
            'settings' => "service_icon_image_$i",
            'description' => 'Upload a PNG/SVG icon (recommended: 48x48px)'
        )));
        $wp_customize->add_setting("service_icon_fa_$i", array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_control("service_icon_fa_$i", array(
            'label' => "Service $i Font Awesome Icon",
            'section' => 'services_settings',
            'type' => 'select',
            'choices' => array(
                '' => __('None', 'callamir'), 'fa-smile-o' => __('Smile', 'callamir'), 'fa-laugh' => __('Laugh', 'callamir'),
                'fa-star' => __('Star', 'callamir'), 'fa-rocket' => __('Rocket', 'callamir'), 'fa-paw' => __('Paw', 'callamir'),
                'custom' => __('Custom', 'callamir')
            )
        ));
        $wp_customize->add_setting("service_icon_fa_custom_$i", array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_control("service_icon_fa_custom_$i", array(
            'label' => "Service $i Custom Font Awesome Class",
            'section' => 'services_settings',
            'type' => 'text',
            'description' => __('E.g., fa-laptop', 'callamir')
        ));
        $wp_customize->add_setting("service_link_$i", array('default' => '', 'sanitize_callback' => 'sanitize_url'));
        $wp_customize->add_control("service_link_$i", array('label' => "Service $i Link", 'section' => 'services_settings', 'type' => 'url'));
        $wp_customize->add_setting("service_desc_$i", array('default' => '', 'sanitize_callback' => 'sanitize_textarea_field'));
        $wp_customize->add_control("service_desc_$i", array('label' => "Service $i Description", 'section' => 'services_settings', 'type' => 'textarea'));
    }
}

add_action('customize_register', 'callamir_customizer');

function callamir_custom_css() {
    $body_bg_color = get_theme_mod('body_bg_color', '#ffffff');
    $primary_color = get_theme_mod('primary_color', '#ff0000');
    $hero_bg_color = get_theme_mod('hero_bg_color', '#004466');
    $services_bg_color = get_theme_mod('services_bg_color', '#e6f7e6');
    $contact_bg_color = get_theme_mod('contact_bg_color', '#fffcdd');
    $community_bg_color = get_theme_mod('community_bg_color', '#e6f7e6');
    $blog_bg_color = get_theme_mod('blog_bg_color', '#f9f9f9');
    $subscribe_bg_color = get_theme_mod('subscribe_bg_color', '#f4f4f4');
    $footer_bg_color = get_theme_mod('site-footer_bg_color', '#004466');
    ?>
    <style type="text/css">
        html body { background-color: <?php echo esc_attr($body_bg_color); ?> !important; }
        section#hero { background-color: <?php echo esc_attr($hero_bg_color); ?> !important; }
        section#services { background-color: <?php echo esc_attr($services_bg_color); ?> !important; }
        section#contact { background-color: <?php echo esc_attr($contact_bg_color); ?> !important; }
        section#community { background-color: <?php echo esc_attr($community_bg_color); ?> !important; }
        section#blog { background-color: <?php echo esc_attr($blog_bg_color); ?> !important; }
        section#subscribe { background-color: <?php echo esc_attr($subscribe_bg_color); ?> !important; }
        footer.site-footer { background-color: <?php echo esc_attr($footer_bg_color); ?> !important; }
        .hero .hero-button, .subscribe-button, .community button { background-color: <?php echo esc_attr($primary_color); ?>; }
        .hero .hero-button:hover, .subscribe-button:hover, .community button:hover { background-color: <?php echo esc_attr(adjustBrightness($primary_color, -20)); ?>; }
        .nav-menu .nav-menu-items a:hover, .contact-link:hover { background-color: <?php echo esc_attr(adjustBrightness($primary_color, -20)); ?>; color: white; }
    </style>
    <?php
}
add_action('wp_head', 'callamir_custom_css');

function adjustBrightness($hex, $steps) {
    $hex = ltrim($hex, '#');
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));
    $r = max(0, min(255, $r + $steps));
    $g = max(0, min(255, $g + $steps));
    $b = max(0, min(255, $b + $steps));
    return '#' . sprintf('%02x%02x%02x', $r, $g, $b);
}

add_action('wp_ajax_callamir_switch_language', 'callamir_switch_language');
add_action('wp_ajax_nopriv_callamir_switch_language', 'callamir_switch_language');
function callamir_switch_language() {
    if (!isset($_POST['lang']) || !in_array($_POST['lang'], ['en', 'fa'])) {
        wp_send_json_error('Invalid language');
    }
    set_theme_mod('site_language', sanitize_text_field($_POST['lang']));
    wp_send_json_success();
}
?>