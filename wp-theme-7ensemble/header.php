<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Promotional Banner -->
<div class="promotional-banner">
    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/banner.png" alt="<?php esc_attr_e('7 Ensemble - Entraide et Solidarité', '7ensemble'); ?>" class="banner-image">
</div>

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
