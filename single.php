<?php
/**
 * Single Post Template for Callamir Theme
 */
get_header();
$lang = isset($_GET['lang']) && $_GET['lang'] === 'fa' ? 'fa' : 'en';
?>
<main>
    <section class="single-post">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <div><?php the_content(); ?></div>
            <?php if (get_post_type() === 'community_questions') : ?>
                <?php
                $answer = get_post_meta(get_the_ID(), 'answer', true);
                $submitter = get_post_meta(get_the_ID(), 'submitter_name', true);
                ?>
                <p><strong><?php echo $lang === 'fa' ? 'ارسال‌کننده: ' : 'Submitter: '; ?></strong><?php echo esc_html($submitter); ?></p>
                <?php if ($answer) : ?>
                    <p><strong><?php echo $lang === 'fa' ? 'پاسخ: ' : 'Answer: '; ?></strong><?php echo esc_html($answer); ?></p>
                <?php endif; ?>
            <?php endif; ?>
        <?php endwhile; else : ?>
            <p><?php echo $lang === 'fa' ? 'پستی یافت نشد.' : 'No post found.'; ?></p>
        <?php endif; ?>
    </section>
</main>
<?php get_footer(); ?>