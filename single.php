<?php
/**
 * The template for displaying all single posts
 *
 * This template is used for blog posts. It includes the_content() function
 * which allows Elementor to be used for blog post content.
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

            <header class="entry-header" style="padding: 3rem 1rem; text-align: center; max-width: 800px; margin: 0 auto;">
                <?php
                the_title('<h1 class="entry-title" style="font-size: 2.5rem; margin-bottom: 1rem;">', '</h1>');

                // Post meta
                ?>
                <div class="entry-meta" style="font-size: 0.9rem; color: rgba(255,255,255,0.7); margin-top: 1rem;">
                    <span class="posted-on">
                        <?php
                        printf(
                            esc_html__('Posted on %s', '7ensemble'),
                            '<time datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) . '</time>'
                        );
                        ?>
                    </span>
                    <span class="byline" style="margin-left: 1rem;">
                        <?php
                        printf(
                            esc_html__('by %s', '7ensemble'),
                            '<span class="author vcard">' . esc_html(get_the_author()) . '</span>'
                        );
                        ?>
                    </span>
                </div>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail" style="max-width: 1200px; margin: 2rem auto;">
                    <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; border-radius: 10px;')); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content" style="padding: 2rem 1rem; max-width: 800px; margin: 0 auto; line-height: 1.8;">
                <?php
                // This is REQUIRED for Elementor to work on posts
                the_content();

                // Page navigation (for multi-page content)
                wp_link_pages(
                    array(
                        'before' => '<div class="page-links" style="margin-top: 2rem;">' . esc_html__('Pages:', '7ensemble'),
                        'after'  => '</div>',
                    )
                );
                ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer" style="max-width: 800px; margin: 2rem auto; padding: 1rem; border-top: 1px solid rgba(255,255,255,0.1);">
                <?php
                // Tags
                $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', '7ensemble'));
                if ($tags_list) {
                    printf('<span class="tags-links">' . esc_html__('Tagged %1$s', '7ensemble') . '</span>', $tags_list);
                }
                ?>
            </footer>

        </article><!-- #post-<?php the_ID(); ?> -->

        <?php
        // Author bio (if exists)
        if (get_the_author_meta('description')) :
            ?>
            <div class="author-bio" style="max-width: 800px; margin: 3rem auto; padding: 2rem; background: rgba(255,255,255,0.05); border-radius: 10px;">
                <h3 style="margin-bottom: 1rem;"><?php esc_html_e('About the Author', '7ensemble'); ?></h3>
                <p><?php echo wp_kses_post(get_the_author_meta('description')); ?></p>
            </div>
            <?php
        endif;

        // Previous/Next navigation
        the_post_navigation(
            array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', '7ensemble') . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', '7ensemble') . '</span> <span class="nav-title">%title</span>',
            )
        );

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>

    <?php endwhile; // End of the loop. ?>

</main><!-- #primary -->

<?php
get_footer();
