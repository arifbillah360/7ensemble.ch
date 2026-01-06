<?php
/**
 * Template Name: Elementor Full Width
 * Template Post Type: page
 *
 * Full-width page template for Elementor with header and footer.
 * Use this template when you want Elementor content with the theme's header/footer.
 *
 * @package 7ensemble
 */

get_header();
?>

<main id="primary" class="site-main" style="width: 100%; max-width: 100%;">

    <?php
    while (have_posts()) :
        the_post();

        // This is REQUIRED for Elementor to inject its content
        the_content();
    endwhile;
    ?>

</main>

<?php
get_footer();
