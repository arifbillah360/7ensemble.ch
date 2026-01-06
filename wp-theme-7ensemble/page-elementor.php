<?php
/**
 * Template Name: Elementor Full Width
 * Template Post Type: page
 *
 * @package 7ensemble
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    ?>

</main>

<?php
get_footer();
