<?php get_header(); ?>

<main>
    <!-- Hero Section -->
    <section class="hero" id="hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero-bg.jpg');">
        <h1 id="hero-title"><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'سادگی تکنولوژی برای سالمندان و کسب و کارهای کوچک' : 'Simplifying Tech for Seniors & Small Businesses'; ?></h1>
        <p id="hero-text"><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'پشتیبانی آی تی قابل اعتماد، دوستانه و آسان.' : 'Reliable, friendly, and easy IT support.'; ?></p>
        <a href="#contact" class="hero-button" id="hero-btn" style="background-color: #004466;"><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'دریافت پشتیبانی آی تی' : 'Get IT Support Now'; ?></a>
        <p id="hero-subtext"><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'من اینجا هستم تا تکنولوژی را برای سالمندان و کسب‌وکارهای کوچک آسان و بدون استرس کنم.' : 'I’m here to make technology easy and stress-free for seniors and small businesses.'; ?></p>
    </section>

   <!-- Subscribe Section -->
<section class="subscribe" id="subscribe" style="background-color: #004466;">
    <?php $subscribe_url = 'https://www.youtube.com/@callamir?sub_confirmation=1'; ?>
    <h2 id="subscribe-title"><a href="<?php echo esc_url($subscribe_url); ?>"><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'اشتراک' : 'Subscribe'; ?></a></h2>
    <div class="youtube-container">
        <div class="youtube-video">
            <iframe src="https://www.youtube.com/embed/<?php echo esc_attr(get_theme_mod('youtube_video_id', 'dQw4w9WgXcQ')); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
    <p><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'برای به‌روز ماندن با آخرین ویدیوهای ما اشتراک کنید!' : 'Subscribe to stay updated with our latest videos!'; ?></p>
    <a href="<?php echo esc_url($subscribe_url); ?>" class="subscribe-button" id="subscribe-now" style="background-color: #ff0000;"><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'اکنون اشتراک کنید' : 'Subscribe Now'; ?></a>
</section>

    <!-- Services Section -->
    <section class="services" id="services">
        <h2 id="services-title"><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'خدمات' : 'Our Services'; ?></h2>
        <div class="services-list">
            <?php
            $services = array(
                array('icon' => 'computer.svg', 'title_en' => 'Computer Setup', 'title_fa' => 'راه‌اندازی کامپیوتر', 'desc_en' => 'Get your computer set up quickly and easily.', 'desc_fa' => 'کامپیوتر خود را سریع و آسان راه‌اندازی کنید.'),
                array('icon' => 'phone.svg', 'title_en' => 'Phone Support', 'title_fa' => 'پشتیبانی تلفن', 'desc_en' => 'Help with your smartphone, from basics to apps.', 'desc_fa' => 'کمک با گوشی هوشمند شما، از اصول اولیه تا برنامه‌ها.'),
                array('icon' => 'wifi.svg', 'title_en' => 'Wi-Fi Help', 'title_fa' => 'کمک وای‌فای', 'desc_en' => 'Fix your internet connection issues.', 'desc_fa' => 'مشکلات اتصال اینترنت خود را برطرف کنید.'),
                array('icon' => 'website.svg', 'title_en' => 'Website Creation', 'title_fa' => 'ایجاد وب‌سایت', 'desc_en' => 'Simple websites for your small business.', 'desc_fa' => 'وب‌سایت‌های ساده برای کسب‌وکار کوچک شما.')
            );
            $lang = isset($_GET['lang']) && $_GET['lang'] === 'fa' ? 'fa' : 'en';
            foreach ($services as $service) {
                $title = $lang === 'fa' ? $service['title_fa'] : $service['title_en'];
                $desc = $lang === 'fa' ? $service['desc_fa'] : $service['desc_en'];
                echo '<div class="service-item">';
                echo '<a href="#" class="service-link"><img src="' . get_template_directory_uri() . '/images/' . $service['icon'] . '" alt="' . esc_attr($title) . '" class="service-icon">' . esc_html($title) . '</a>';
                echo '<div class="service-desc">' . esc_html($desc) . '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="blog" id="blog">
        <h2 id="blog-title"><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'وبلاگ' : 'Blog'; ?></h2>
        <?php
        $args = array('posts_per_page' => 3);
        $blog_query = new WP_Query($args);
        if ($blog_query->have_posts()) :
            while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                <article>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php the_excerpt(); ?></p>
                </article>
            <?php endwhile;
            wp_reset_postdata();
        else : ?>
            <p><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'هیچ پستی یافت نشد.' : 'No posts found.'; ?></p>
        <?php endif; ?>
    </section>

    <!-- Community Q&A Section -->
    <section class="community" id="community">
        <h2 id="community-title"><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'پرسش و پاسخ جامعه' : 'Community Q&A'; ?></h2>
        <form id="community-form">
            <input type="text" name="submitter_name" placeholder="<?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'نام' : 'Name'; ?>" required>
            <input type="email" name="submitter_email" placeholder="<?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'ایمیل (اختیاری)' : 'Email (optional)'; ?>">
            <input type="tel" name="submitter_phone" placeholder="<?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'تلفن (اختیاری)' : 'Phone (optional)'; ?>">
            <textarea name="question" placeholder="<?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'سوال خود را اینجا بپرسید...' : 'Ask your question here...'; ?>" required></textarea>
            <button type="button" id="submit-question"><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'ارسال سوال' : 'Submit Question'; ?></button>
        </form>
        <div class="questions-list">
            <?php
            $args = array('post_type' => 'community_question', 'posts_per_page' => 5);
            $questions_query = new WP_Query($args);
            if ($questions_query->have_posts()) :
                while ($questions_query->have_posts()) : $questions_query->the_post(); ?>
                    <div class="question-item">
                        <p class="question-text"><?php the_title(); ?></p>
                        <?php if (get_the_content()) : ?>
                            <p class="answer-text"><?php the_content(); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'سوالی یافت نشد.' : 'No questions found.'; ?></p>
            <?php endif; ?>
        </div>
        <?php if ($questions_query->max_num_pages > 1) : ?>
            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'total' => $questions_query->max_num_pages,
                    'current' => max(1, get_query_var('paged')),
                ));
                ?>
            </div>
        <?php endif; ?>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <h2 id="contact-title"><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'تماس با ما' : 'Contact Us'; ?></h2>
        <div class="contact-links">
            <a href="https://wa.me/1234567890" class="contact-link whatsapp"><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'واتساپ' : 'WhatsApp'; ?></a>
            <a href="tel:+1234567890" class="contact-link cellphone"><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'تلفن' : 'Call'; ?></a>
            <a href="https://t.me/callamir" class="contact-link telegram"><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'تلگرام' : 'Telegram'; ?></a>
            <a href="sms:+1234567890" class="contact-link sms"><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'پیامک' : 'SMS'; ?></a>
            <a href="https://m.me/callamir" class="contact-link messenger"><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'مسنجر' : 'Messenger'; ?></a>
            <a href="https://instagram.com/callamir" class="contact-link instagram"><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'اینستاگرام' : 'Instagram'; ?></a>
            <a href="https://snapchat.com/add/callamir" class="contact-link snapchat"><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'اسنپ‌چت' : 'Snapchat'; ?></a>
        </div>
        <div class="contact-form">
            <?php echo do_shortcode('[contact-form-7 id="123" title="Contact Form"]'); ?>
        </div>
    </section>

    <!-- Social Section -->
    <section class="social" id="social" style="background-color: #004466;">
        <h2 id="social-title"><?php echo (isset($_GET['lang']) && $_GET['lang'] === 'fa') ? 'شبکه‌های اجتماعی' : 'Social'; ?></h2>
        <?php
        $social_links = array(
            'facebook' => 'https://facebook.com/callamir',
            'twitter' => 'https://twitter.com/callamir',
            'instagram' => 'https://instagram.com/callamir',
            'linkedin' => 'https://linkedin.com/company/callamir'
        );
        foreach ($social_links as $platform => $url) {
            echo '<a href="' . esc_url($url) . '">' . esc_html($platform) . '</a> ';
        }
        ?>
    </section>
</main>

<?php get_footer(); ?>