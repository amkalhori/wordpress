<?php
/**
 * Callamir Theme Functions
 */
function callamir_load_theme_textdomain() {
    load_theme_textdomain('callamir', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'callamir_load_theme_textdomain');

function callamir_enqueue_styles() {
    wp_enqueue_style('callamir-style', get_stylesheet_uri(), array(), '1.0.36');
}

function callamir_enqueue_scripts() {
    wp_enqueue_script('callamir-script', get_template_directory_uri() . '/js/theme.js', array('jquery'), '1.0.8', true);
    wp_localize_script('callamir-script', 'callamirAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('submit_question')
    ));
}

add_action('wp_enqueue_scripts', 'callamir_enqueue_styles');
add_action('wp_enqueue_scripts', 'callamir_enqueue_scripts');

add_theme_support('menus');

function callamir_register_menus() {
    register_nav_menus(array('primary-menu' => __('Primary Menu', 'callamir')));
}
add_action('init', 'callamir_register_menus');

function callamir_translate_menu_items($items, $args) {
    $lang = isset($_GET['lang']) && $_GET['lang'] === 'fa' ? 'fa' : 'en';
    $translations = array(
        'en' => array('Home' => 'Home', 'Services' => 'Services', 'Social' => 'Social', 'Community' => 'Community', 'Contact' => 'Contact', 'Blog' => 'Blog', 'Subscribe' => 'Subscribe'),
        'fa' => array('Home' => 'خانه', 'Services' => 'خدمات', 'Social' => 'شبکه‌های اجتماعی', 'Community' => 'جامعه', 'Contact' => 'تماس', 'Blog' => 'وبلاگ', 'Subscribe' => 'اشتراک')
    );
    foreach ($items as $item) {
        if (isset($translations[$lang][$item->title])) {
            $item->title = $translations[$lang][$item->title];
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'callamir_translate_menu_items', 10, 2);

// Custom Post Type for Community Questions
function register_community_questions() {
    register_post_type('community_questions', array(
        'labels' => array('name' => __('Community Questions'), 'singular_name' => __('Question')),
        'public' => true,
        'show_ui' => true,
        'supports' => array('title', 'editor'),
        'menu_icon' => 'dashicons-format-chat',
    ));
    register_post_meta('community_questions', 'answer', array('type' => 'string', 'single' => true));
    register_post_meta('community_questions', 'approved', array('type' => 'boolean', 'single' => true));
    register_post_meta('community_questions', 'submitter_name', array('type' => 'string', 'single' => true));
    register_post_meta('community_questions', 'submitter_email', array('type' => 'string', 'single' => true));
    register_post_meta('community_questions', 'submitter_phone', array('type' => 'string', 'single' => true));
}
add_action('init', 'register_community_questions');

function callamir_customizer($wp_customize) {
    foreach (['en', 'fa'] as $lang) {
        $wp_customize->add_setting("hero_title_$lang", array('default' => $lang === 'fa' ? 'سادگی تکنولوژی برای سالمندان و کسب و کارهای کوچک' : 'Simplifying Tech for Seniors & Small Businesses', 'sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_control("hero_title_$lang", array('label' => "Hero Title ($lang)", 'section' => 'title_tagline', 'type' => 'text'));
        $wp_customize->add_setting("hero_text_$lang", array('default' => $lang === 'fa' ? 'پشتیبانی آی تی قابل اعتماد، دوستانه و آسان.' : 'Reliable, friendly, and easy IT support.', 'sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_control("hero_text_$lang", array('label' => "Hero Text ($lang)", 'section' => 'title_tagline', 'type' => 'text'));
        $wp_customize->add_setting("hero_btn_$lang", array('default' => $lang === 'fa' ? 'دریافت پشتیبانی آی تی' : 'Get IT Support Now', 'sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_control("hero_btn_$lang", array('label' => "Hero Button ($lang)", 'section' => 'title_tagline', 'type' => 'text'));
        $wp_customize->add_setting("hero_subtext_$lang", array('default' => $lang === 'fa' ? 'من اینجا هستم تا تکنولوژی را برای سالمندان و کسب‌وکارهای کوچک آسان و بدون استرس کنم.' : 'I’m here to make technology easy and stress-free for seniors and small businesses.', 'sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_control("hero_subtext_$lang", array('label' => "Hero Subtext ($lang)", 'section' => 'title_tagline', 'type' => 'text'));
        $wp_customize->add_setting("community_title_$lang", array('default' => $lang === 'fa' ? 'پرسش و پاسخ جامعه' : 'Community Q&A', 'sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_control("community_title_$lang", array('label' => "Community Title ($lang)", 'section' => 'title_tagline', 'type' => 'text'));
        $wp_customize->add_setting("community_text_$lang", array('default' => $lang === 'fa' ? 'هر سوالی بپرسید، جامعه می‌تواند پاسخ دهد! من اختیار حذف یا تغییر پست‌ها را دارم.' : 'Ask any question, and the community can answer! I have the authority to delete or change posts.', 'sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_control("community_text_$lang", array('label' => "Community Text ($lang)", 'section' => 'title_tagline', 'type' => 'text'));
        $wp_customize->add_setting("flag_text_$lang", array('default' => $lang === 'fa' ? 'زبان‌ها:' : 'Languages:', 'sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_control("flag_text_$lang", array('label' => "Flag Text ($lang)", 'section' => 'title_tagline', 'type' => 'text'));
    }

    // Theme Colors Section
    $wp_customize->add_section('theme_colors', array('title' => __('Theme Colors', 'callamir'), 'priority' => 25));

    // Body Background Color
    $wp_customize->add_setting('body_bg_color', array('default' => '#ffffff', 'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'refresh'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body_bg_color', array(
        'label' => __('Body Background Color', 'callamir'),
        'section' => 'theme_colors',
        'settings' => 'body_bg_color',
    )));

    $wp_customize->add_setting('primary_color', array('default' => '#ff0000', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array('label' => __('Primary Color', 'callamir'), 'section' => 'theme_colors')));

    // Section Background Colors
    $sections = array(
        'hero' => '#004466',
        'services' => '#e6f7e6',
        'contact' => '#fffcdd',
        'community' => '#e6f7e6',
        'social' => '#004466',
        'blog' => '#f9f9f9',
        'subscribe' => '#f4f4f4',
        'site-footer' => '#004466'
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
        'snapchat' => 'Snapchat URL', 'form_shortcode' => 'Contact Form Shortcode (e.g., [contact-form-7 id="123" title="Contact"])'
    );
    foreach ($contact_fields as $field => $label) {
        $wp_customize->add_setting("contact_$field", array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_control("contact_$field", array('label' => $label, 'section' => 'contact_settings', 'type' => 'text'));
    }

    // Services Settings with PNG Icons
    $wp_customize->add_section('services_settings', array('title' => __('Services Settings', 'callamir'), 'priority' => 35));
    for ($i = 1; $i <= 5; $i++) {
        $wp_customize->add_setting("service_name_$i", array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_control("service_name_$i", array('label' => "Service $i Name", 'section' => 'services_settings', 'type' => 'text'));
        $wp_customize->add_setting("service_icon_$i", array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "service_icon_$i", array(
            'label' => "Service $i Icon (PNG)", 
            'section' => 'services_settings', 
            'settings' => "service_icon_$i",
            'description' => 'Upload a PNG icon (recommended size: 32x32px or 48x48px)'
        )));
        $wp_customize->add_setting("service_link_$i", array('default' => '', 'sanitize_callback' => 'sanitize_url'));
        $wp_customize->add_control("service_link_$i", array('label' => "Service $i Link", 'section' => 'services_settings', 'type' => 'url'));
        $wp_customize->add_setting("service_desc_$i", array('default' => '', 'sanitize_callback' => 'sanitize_textarea_field'));
        $wp_customize->add_control("service_desc_$i", array('label' => "Service $i Description", 'section' => 'services_settings', 'type' => 'textarea'));
    }
}
add_action('customize_register', 'callamir_customizer');

// Dynamic CSS for Theme and Section Colors
function callamir_custom_css() {
    $body_bg_color = get_theme_mod('body_bg_color', '#ffffff');
    $primary_color = get_theme_mod('primary_color', '#ff0000');
    $hero_bg_color = get_theme_mod('hero_bg_color', '#004466');
    $services_bg_color = get_theme_mod('services_bg_color', '#e6f7e6');
    $contact_bg_color = get_theme_mod('contact_bg_color', '#fffcdd');
    $community_bg_color = get_theme_mod('community_bg_color', '#e6f7e6');
    $social_bg_color = get_theme_mod('social_bg_color', '#004466');
    $blog_bg_color = get_theme_mod('blog_bg_color', '#f9f9f9');
    $subscribe_bg_color = get_theme_mod('subscribe_bg_color', '#f4f4f4');
    $footer_bg_color = get_theme_mod('site-footer_bg_color', '#004466');
    ?>
    <style type="text/css">
        /* Body background */
        html body { background-color: <?php echo esc_attr($body_bg_color); ?> !important; }
        /* Specific section backgrounds using IDs */
        section#hero { background-color: <?php echo esc_attr($hero_bg_color); ?> !important; }
        section#services { background-color: <?php echo esc_attr($services_bg_color); ?> !important; }
        section#contact { background-color: <?php echo esc_attr($contact_bg_color); ?> !important; }
        section#community { background-color: <?php echo esc_attr($community_bg_color); ?> !important; }
        section#social { background-color: <?php echo esc_attr($social_bg_color); ?> !important; }
        section#blog { background-color: <?php echo esc_attr($blog_bg_color); ?> !important; }
        section#subscribe { background-color: <?php echo esc_attr($subscribe_bg_color); ?> !important; }
        footer.site-footer { background-color: <?php echo esc_attr($footer_bg_color); ?> !important; }
        /* Primary color applications */
        .hero .hero-button { background-color: <?php echo esc_attr($primary_color); ?>; }
        .hero .hero-button:hover { background-color: <?php echo esc_attr(adjustBrightness($primary_color, -20)); ?>; }
        .subscribe-button { background-color: <?php echo esc_attr($primary_color); ?>; }
        .subscribe-button:hover { background-color: <?php echo esc_attr(adjustBrightness($primary_color, -20)); ?>; }
        .community button { background-color: <?php echo esc_attr($primary_color); ?>; }
        .community button:hover { background-color: <?php echo esc_attr(adjustBrightness($primary_color, -20)); ?>; }
        .nav-menu .nav-menu-items a:hover { background-color: <?php echo esc_attr($primary_color); ?>; }
        .contact-link:hover { background-color: <?php echo esc_attr($primary_color); ?>; }
    </style>
    <?php
}
add_action('wp_head', 'callamir_custom_css');

// Helper function to adjust brightness
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

// AJAX Handler for Question Submission
add_action('wp_ajax_submit_community_question', 'submit_community_question');
add_action('wp_ajax_nopriv_submit_community_question', 'submit_community_question');
function submit_community_question() {
    if (!wp_verify_nonce($_POST['question_nonce'], 'submit_question')) {
        wp_send_json_error('Invalid nonce');
    }
    $question = sanitize_textarea_field($_POST['question']);
    $name = sanitize_text_field($_POST['submitter_name']);
    $email = sanitize_email($_POST['submitter_email']);
    $phone = sanitize_text_field($_POST['submitter_phone']);
    $post_id = wp_insert_post(array(
        'post_title' => $question,
        'post_type' => 'community_questions',
        'post_status' => 'pending'
    ));
    if ($post_id) {
        update_post_meta($post_id, 'submitter_name', $name);
        if ($email) update_post_meta($post_id, 'submitter_email', $email);
        if ($phone) update_post_meta($post_id, 'submitter_phone', $phone);
        wp_send_json_success();
    } else {
        wp_send_json_error();
    }
}
?>