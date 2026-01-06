<?php
/**
 * Template Name: Elementor Canvas (No Header/Footer)
 * Template Post Type: page
 *
 * Blank canvas template for Elementor - NO header or footer.
 * Use this for landing pages, popups, or full-screen designs.
 *
 * @package 7ensemble
 */

// NO header
// NO footer
// ONLY content
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php
while (have_posts()) :
    the_post();

    // This is REQUIRED for Elementor Canvas template
    the_content();
endwhile;
?>

<?php wp_footer(); ?>
</body>
</html>
