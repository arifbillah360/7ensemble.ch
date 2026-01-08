<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Promotional Banner - Always visible on all pages -->
<div class="promotional-banner">
    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/banner.png" alt="<?php esc_attr_e('7 Ensemble - Entraide et Solidarité', '7ensemble'); ?>" class="banner-image">
</div>

<?php
// Check if Elementor Pro Header is active
$elementor_header_enabled = false;
if (function_exists('elementor_theme_do_location')) {
    $elementor_header_enabled = elementor_theme_do_location('header');
}

// If no Elementor header, show default header
if (!$elementor_header_enabled) :
?>

<header>
    <nav class="container">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">7 Ensemble</a>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class' => 'nav-menu',
            'container' => 'div',
            'fallback_cb' => 'sept_default_menu',
        ));
        ?>
        <button class="btn-primary" onclick="showSevenModal()"><?php esc_html_e('Rejoindre la révolution', '7ensemble'); ?></button>
    </nav>
</header>

<?php endif; ?>
<?php
/**
 * Default fallback menu
 */
function sept_default_menu() {
    ?>
    <div class="nav-menu">
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Accueil', '7ensemble'); ?></a>
        <a href="#principe"><?php esc_html_e('Principe', '7ensemble'); ?></a>
        <a href="#tours"><?php esc_html_e('Les 7 Tours', '7ensemble'); ?></a>
        <a href="#mission"><?php esc_html_e('Mission', '7ensemble'); ?></a>
        <a href="#urgence"><?php esc_html_e('Urgence', '7ensemble'); ?></a>
    </div>
    <?php
}
