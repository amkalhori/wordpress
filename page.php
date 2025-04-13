<?php
/**
 * Page Template for Callamir Theme
 */
get_header();
$lang = isset($_GET['lang']) && $_GET['lang'] === 'fa' ? 'fa' : 'en';
?>
<main>
    <section class="page-content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <div><?php the_content(); ?></div>
        <?php endwhile; else : ?>
            <p><?php echo $lang === 'fa' ? 'محتوایی یافت نشد.' : 'No content found.'; ?></p>
        <?php endif; ?>
    </section>
</main>
<?php get_footer(); ?>