<?php
/**
 * Archive Template for Callamir Theme
 */
get_header();
$lang = isset($_GET['lang']) && $_GET['lang'] === 'fa' ? 'fa' : 'en';
?>
<main>
    <section id="blog" class="blog">
        <h2 id="blog-title">
            <?php
            if (is_category()) {
                echo $lang === 'fa' ? 'دسته‌بندی: ' : 'Category: ';
                single_cat_title();
            } elseif (is_tag()) {
                echo $lang === 'fa' ? 'برچسب: ' : 'Tag: ';
                single_tag_title();
            } elseif (is_date()) {
                echo $lang === 'fa' ? 'آرشیو: ' : 'Archive: ';
                echo get_the_date('F Y');
            } else {
                echo $lang === 'fa' ? 'آرشیو' : 'Archives';
            }
            ?>
        </h2>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div><?php the_excerpt(); ?></div>
                </article>
            <?php endwhile; ?>
            <div class="pagination">
                <?php echo paginate_links(); ?>
            </div>
        <?php else : ?>
            <p><?php echo $lang === 'fa' ? 'هنوز پستی وجود ندارد.' : 'No posts yet.'; ?></p>
        <?php endif; ?>
    </section>
</main>
<?php get_footer(); ?>