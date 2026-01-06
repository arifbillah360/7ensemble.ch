<?php
/**
 * The template for displaying all pages
 *
 * This is the default page template. It includes the_content() function
 * which is REQUIRED for Elementor to work.
 *
 * @package 7ensemble
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while (have_posts()) :
        the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <?php if (!is_front_page()) : ?>
                <header class="entry-header" style="padding: 3rem 1rem; text-align: center;">
                    <?php the_title('<h1 class="entry-title" style="font-size: 3rem; margin-bottom: 1rem;">', '</h1>'); ?>
                </header>
            <?php endif; ?>

            <div class="entry-content" style="padding: 2rem 1rem; max-width: 1200px; margin: 0 auto;">
                <?php
                // This is the CRITICAL function for Elementor
                the_content();

                // Page navigation (for multi-page content)
                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', '7ensemble'),
                        'after'  => '</div>',
                    )
                );
                ?>
            </div><!-- .entry-content -->

        </article><!-- #post-<?php the_ID(); ?> -->

        <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>

    <?php endwhile; // End of the loop. ?>

</main><!-- #primary -->

<?php
get_footer();
