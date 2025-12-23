<?php
/**
 * 7 Ensemble Theme Functions
 *
 * @package 7ensemble
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function sept_ensemble_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo');

    // Register navigation menu
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', '7ensemble'),
    ));

    // Load text domain for translations
    load_theme_textdomain('7ensemble', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'sept_ensemble_setup');

/**
 * Enqueue Scripts and Styles
 */
function sept_ensemble_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('sept-ensemble-style', get_stylesheet_uri(), array(), '1.0.0');

    // Enqueue custom JavaScript
    wp_enqueue_script('sept-ensemble-script', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.0.0', true);

    // Localize script for AJAX
    wp_localize_script('sept-ensemble-script', 'septEnsemble', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('sept_ensemble_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'sept_ensemble_scripts');

/**
 * Register Custom Post Type: sept_member
 */
function sept_register_member_post_type() {
    $labels = array(
        'name' => esc_html__('Members', '7ensemble'),
        'singular_name' => esc_html__('Member', '7ensemble'),
        'menu_name' => esc_html__('7 Ensemble Members', '7ensemble'),
        'add_new' => esc_html__('Add New Member', '7ensemble'),
        'add_new_item' => esc_html__('Add New Member', '7ensemble'),
        'edit_item' => esc_html__('Edit Member', '7ensemble'),
        'view_item' => esc_html__('View Member', '7ensemble'),
        'all_items' => esc_html__('All Members', '7ensemble'),
    );

    $args = array(
        'labels' => $labels,
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array('title'),
        'menu_icon' => 'dashicons-groups',
        'menu_position' => 5,
    );

    register_post_type('sept_member', $args);
}
add_action('init', 'sept_register_member_post_type');

/**
 * AJAX Handler: Member Registration
 */
function sept_handle_registration() {
    // Verify nonce
    check_ajax_referer('sept_ensemble_nonce', 'nonce');

    // Get and sanitize form data
    $full_name = isset($_POST['fullName']) ? sanitize_text_field($_POST['fullName']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $country = isset($_POST['country']) ? sanitize_text_field($_POST['country']) : '';
    $payment_method = isset($_POST['paymentMethod']) ? sanitize_text_field($_POST['paymentMethod']) : '';
    $option = isset($_POST['optionType']) ? sanitize_text_field($_POST['optionType']) : '';

    // Validate required fields
    if (empty($full_name) || empty($email) || empty($country) || empty($payment_method) || empty($option)) {
        wp_send_json_error(array('message' => esc_html__('All fields are required.', '7ensemble')));
    }

    // Validate email format
    if (!is_email($email)) {
        wp_send_json_error(array('message' => esc_html__('Invalid email format.', '7ensemble')));
    }

    // Check for duplicate email
    $existing_member = sept_check_duplicate_email($email);
    if ($existing_member) {
        wp_send_json_error(array('message' => esc_html__('This email is already registered.', '7ensemble')));
    }

    // Create member post
    $member_id = wp_insert_post(array(
        'post_type' => 'sept_member',
        'post_title' => $full_name,
        'post_status' => 'publish',
    ));

    if (is_wp_error($member_id)) {
        wp_send_json_error(array('message' => esc_html__('Failed to register. Please try again.', '7ensemble')));
    }

    // Save member meta data
    update_post_meta($member_id, 'sept_email', $email);
    update_post_meta($member_id, 'sept_country', $country);
    update_post_meta($member_id, 'sept_payment_method', $payment_method);
    update_post_meta($member_id, 'sept_option', $option);
    update_post_meta($member_id, 'sept_registration_date', current_time('mysql'));
    update_post_meta($member_id, 'sept_constellation_status', 'pending');

    // Assign to constellation
    $constellation_data = sept_assign_to_constellation($member_id, $option);

    // Send welcome email
    sept_send_welcome_email($email, $full_name, $option, $constellation_data);

    // Return success response
    wp_send_json_success(array(
        'message' => esc_html__('Registration successful!', '7ensemble'),
        'member_id' => $member_id,
        'constellation_status' => $constellation_data['status'],
    ));
}
add_action('wp_ajax_sept_register', 'sept_handle_registration');
add_action('wp_ajax_nopriv_sept_register', 'sept_handle_registration');

/**
 * Check for Duplicate Email
 *
 * @param string $email Email to check
 * @return bool|int False if not found, post ID if found
 */
function sept_check_duplicate_email($email) {
    $args = array(
        'post_type' => 'sept_member',
        'meta_query' => array(
            array(
                'key' => 'sept_email',
                'value' => $email,
                'compare' => '=',
            ),
        ),
        'posts_per_page' => 1,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        return $query->posts[0]->ID;
    }

    return false;
}

/**
 * Assign Member to Constellation
 *
 * @param int $member_id Member post ID
 * @param string $option '3' or '7' person option
 * @return array Constellation data
 */
function sept_assign_to_constellation($member_id, $option) {
    $max_members = ($option === 'three') ? 3 : 7;

    // Find incomplete constellation
    $incomplete_constellation = sept_find_incomplete_constellation($option);

    if ($incomplete_constellation) {
        // Add to existing constellation
        $center_id = $incomplete_constellation['center_id'];
        $members = $incomplete_constellation['members'];
        $members[] = $member_id;

        // Update center member's constellation
        update_post_meta($center_id, 'sept_constellation_members', $members);

        // Update new member's meta
        update_post_meta($member_id, 'sept_constellation_center', $center_id);
        update_post_meta($member_id, 'sept_constellation_status', 'incomplete');

        // Check if constellation is now complete
        if (count($members) >= $max_members) {
            update_post_meta($center_id, 'sept_constellation_status', 'complete');
            update_post_meta($center_id, 'sept_constellation_completed_date', current_time('mysql'));

            // Send completion notifications
            sept_send_constellation_complete_email($center_id, $members);

            return array(
                'status' => 'complete',
                'center_id' => $center_id,
                'member_count' => count($members),
            );
        } else {
            update_post_meta($center_id, 'sept_constellation_status', 'incomplete');

            return array(
                'status' => 'incomplete',
                'center_id' => $center_id,
                'member_count' => count($members),
            );
        }
    } else {
        // Make this member the center of a new constellation
        update_post_meta($member_id, 'sept_constellation_members', array());
        update_post_meta($member_id, 'sept_constellation_status', 'pending');
        update_post_meta($member_id, 'sept_is_center', true);

        return array(
            'status' => 'pending',
            'center_id' => $member_id,
            'member_count' => 0,
        );
    }
}

/**
 * Find Incomplete Constellation
 *
 * @param string $option '3' or '7' person option
 * @return array|false Constellation data or false if none found
 */
function sept_find_incomplete_constellation($option) {
    $max_members = ($option === 'three') ? 3 : 7;

    $args = array(
        'post_type' => 'sept_member',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'sept_option',
                'value' => $option,
                'compare' => '=',
            ),
            array(
                'key' => 'sept_is_center',
                'value' => true,
                'compare' => '=',
            ),
            array(
                'key' => 'sept_constellation_status',
                'value' => array('pending', 'incomplete'),
                'compare' => 'IN',
            ),
        ),
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'ASC',
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $center_post = $query->posts[0];
        $members = get_post_meta($center_post->ID, 'sept_constellation_members', true);

        if (!is_array($members)) {
            $members = array();
        }

        if (count($members) < $max_members) {
            return array(
                'center_id' => $center_post->ID,
                'members' => $members,
            );
        }
    }

    return false;
}

/**
 * Send Welcome Email
 *
 * @param string $email Recipient email
 * @param string $name Recipient name
 * @param string $option '3' or '7' person option
 * @param array $constellation_data Constellation data
 */
function sept_send_welcome_email($email, $name, $option, $constellation_data) {
    $target_amount = ($option === 'seven') ? '1,575,747€' : '7,789€';
    $subject = esc_html__('Welcome to 7 Ensemble!', '7ensemble');

    // HTML email body
    ob_start();
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <style>
            body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
            .container { max-width: 600px; margin: 0 auto; background: white; padding: 40px; border-radius: 10px; }
            .header { background: linear-gradient(45deg, #667eea, #764ba2); color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
            .content { padding: 30px; line-height: 1.6; }
            .highlight { background: #4ecdc4; color: white; padding: 20px; border-radius: 10px; margin: 20px 0; }
            .footer { text-align: center; padding: 20px; color: #666; font-size: 14px; }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>Bienvenue dans 7 Ensemble!</h1>
            </div>
            <div class="content">
                <p>Bonjour <?php echo esc_html($name); ?>,</p>

                <p>Félicitations! Votre inscription à 7 Ensemble a été confirmée avec succès.</p>

                <div class="highlight">
                    <h2 style="margin-top:0;">Votre Objectif: <?php echo esc_html($target_amount); ?></h2>
                    <p><strong>Option choisie:</strong> <?php echo ($option === 'seven') ? '7 personnes' : '3 personnes'; ?></p>
                    <p><strong>Statut de constellation:</strong> <?php echo esc_html($constellation_data['status']); ?></p>
                </div>

                <h3>Prochaines étapes:</h3>
                <ul>
                    <li>Votre constellation sera formée sous 24-48h</li>
                    <li>Vous recevrez un email de confirmation dès que votre constellation sera complète</li>
                    <li>Premiers gains attendus dans <?php echo ($option === 'seven') ? '7' : '5'; ?> jours maximum</li>
                </ul>

                <p>Merci de faire partie de cette révolution financière!</p>

                <p><strong>L'équipe 7 Ensemble</strong></p>
            </div>
            <div class="footer">
                <p>Cet email a été envoyé depuis 7ensemble.ch</p>
            </div>
        </div>
    </body>
    </html>
    <?php
    $message = ob_get_clean();

    // Set email headers
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: 7 Ensemble <noreply@7ensemble.ch>',
    );

    // Send email
    wp_mail($email, $subject, $message, $headers);
}

/**
 * Send Constellation Complete Email
 *
 * @param int $center_id Center member ID
 * @param array $member_ids Array of member IDs
 */
function sept_send_constellation_complete_email($center_id, $member_ids) {
    $center_email = get_post_meta($center_id, 'sept_email', true);
    $center_name = get_the_title($center_id);
    $option = get_post_meta($center_id, 'sept_option', true);
    $target_amount = ($option === 'seven') ? '1,575,747€' : '7,789€';

    $subject = esc_html__('Your Constellation is Complete!', '7ensemble');

    // HTML email body
    ob_start();
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <style>
            body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
            .container { max-width: 600px; margin: 0 auto; background: white; padding: 40px; border-radius: 10px; }
            .header { background: linear-gradient(45deg, #ff6b6b, #4ecdc4); color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
            .content { padding: 30px; line-height: 1.6; }
            .celebration { background: #4ecdc4; color: white; padding: 30px; border-radius: 10px; margin: 20px 0; text-align: center; }
            .footer { text-align: center; padding: 20px; color: #666; font-size: 14px; }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>🎉 Félicitations! 🎉</h1>
            </div>
            <div class="content">
                <p>Bonjour <?php echo esc_html($center_name); ?>,</p>

                <div class="celebration">
                    <h2 style="margin-top:0;">Votre Constellation est Complète!</h2>
                    <p style="font-size: 24px; margin: 10px 0;"><strong><?php echo count($member_ids); ?> membres</strong></p>
                    <p>Vous êtes maintenant prêt à recevoir vos gains!</p>
                </div>

                <h3>Ce que cela signifie pour vous:</h3>
                <ul>
                    <li>Votre constellation de <?php echo count($member_ids); ?> personnes est maintenant active</li>
                    <li>Vous commencerez à recevoir vos gains très bientôt</li>
                    <li>Votre objectif: <?php echo esc_html($target_amount); ?></li>
                </ul>

                <p>Merci de faire partie de 7 Ensemble!</p>

                <p><strong>L'équipe 7 Ensemble</strong></p>
            </div>
            <div class="footer">
                <p>Cet email a été envoyé depuis 7ensemble.ch</p>
            </div>
        </div>
    </body>
    </html>
    <?php
    $message = ob_get_clean();

    // Set email headers
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: 7 Ensemble <noreply@7ensemble.ch>',
    );

    // Send email to center member
    wp_mail($center_email, $subject, $message, $headers);
}

/**
 * Admin Dashboard Widget
 */
function sept_add_dashboard_widget() {
    wp_add_dashboard_widget(
        'sept_dashboard_widget',
        esc_html__('7 Ensemble Statistics', '7ensemble'),
        'sept_dashboard_widget_content'
    );
}
add_action('wp_dashboard_setup', 'sept_add_dashboard_widget');

/**
 * Dashboard Widget Content
 */
function sept_dashboard_widget_content() {
    // Get total members
    $total_members = wp_count_posts('sept_member')->publish;

    // Get complete constellations
    $complete_args = array(
        'post_type' => 'sept_member',
        'meta_query' => array(
            array(
                'key' => 'sept_constellation_status',
                'value' => 'complete',
                'compare' => '=',
            ),
            array(
                'key' => 'sept_is_center',
                'value' => true,
                'compare' => '=',
            ),
        ),
        'posts_per_page' => -1,
    );
    $complete_query = new WP_Query($complete_args);
    $complete_constellations = $complete_query->post_count;

    // Get incomplete constellations
    $incomplete_args = array(
        'post_type' => 'sept_member',
        'meta_query' => array(
            array(
                'key' => 'sept_constellation_status',
                'value' => array('pending', 'incomplete'),
                'compare' => 'IN',
            ),
            array(
                'key' => 'sept_is_center',
                'value' => true,
                'compare' => '=',
            ),
        ),
        'posts_per_page' => -1,
    );
    $incomplete_query = new WP_Query($incomplete_args);
    $incomplete_constellations = $incomplete_query->post_count;

    // Get recent registrations (last 7 days)
    $recent_args = array(
        'post_type' => 'sept_member',
        'date_query' => array(
            array(
                'after' => '7 days ago',
            ),
        ),
        'posts_per_page' => -1,
    );
    $recent_query = new WP_Query($recent_args);
    $recent_registrations = $recent_query->post_count;

    ?>
    <div style="padding: 20px;">
        <style>
            .sept-stat-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
                margin-bottom: 20px;
            }
            .sept-stat-card {
                background: linear-gradient(135deg, #667eea, #764ba2);
                color: white;
                padding: 20px;
                border-radius: 10px;
                text-align: center;
            }
            .sept-stat-number {
                font-size: 32px;
                font-weight: bold;
                margin-bottom: 5px;
            }
            .sept-stat-label {
                font-size: 14px;
                opacity: 0.9;
            }
        </style>

        <div class="sept-stat-grid">
            <div class="sept-stat-card">
                <div class="sept-stat-number"><?php echo esc_html($total_members); ?></div>
                <div class="sept-stat-label"><?php esc_html_e('Total Members', '7ensemble'); ?></div>
            </div>

            <div class="sept-stat-card">
                <div class="sept-stat-number"><?php echo esc_html($complete_constellations); ?></div>
                <div class="sept-stat-label"><?php esc_html_e('Complete Constellations', '7ensemble'); ?></div>
            </div>

            <div class="sept-stat-card">
                <div class="sept-stat-number"><?php echo esc_html($incomplete_constellations); ?></div>
                <div class="sept-stat-label"><?php esc_html_e('Incomplete Constellations', '7ensemble'); ?></div>
            </div>

            <div class="sept-stat-card">
                <div class="sept-stat-number"><?php echo esc_html($recent_registrations); ?></div>
                <div class="sept-stat-label"><?php esc_html_e('Registrations (Last 7 Days)', '7ensemble'); ?></div>
            </div>
        </div>

        <p style="text-align: center;">
            <a href="<?php echo esc_url(admin_url('edit.php?post_type=sept_member')); ?>" class="button button-primary">
                <?php esc_html_e('View All Members', '7ensemble'); ?>
            </a>
        </p>
    </div>
    <?php
}

/**
 * Add Custom Meta Boxes for Member Details
 */
function sept_add_member_meta_boxes() {
    add_meta_box(
        'sept_member_details',
        esc_html__('Member Details', '7ensemble'),
        'sept_member_details_callback',
        'sept_member',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'sept_add_member_meta_boxes');

/**
 * Meta Box Callback: Member Details
 */
function sept_member_details_callback($post) {
    // Get meta values
    $email = get_post_meta($post->ID, 'sept_email', true);
    $country = get_post_meta($post->ID, 'sept_country', true);
    $payment_method = get_post_meta($post->ID, 'sept_payment_method', true);
    $option = get_post_meta($post->ID, 'sept_option', true);
    $registration_date = get_post_meta($post->ID, 'sept_registration_date', true);
    $constellation_status = get_post_meta($post->ID, 'sept_constellation_status', true);
    $is_center = get_post_meta($post->ID, 'sept_is_center', true);
    $constellation_members = get_post_meta($post->ID, 'sept_constellation_members', true);
    $constellation_center = get_post_meta($post->ID, 'sept_constellation_center', true);

    ?>
    <style>
        .sept-meta-box { padding: 20px; }
        .sept-meta-row { margin-bottom: 15px; display: flex; }
        .sept-meta-label { font-weight: bold; width: 200px; }
        .sept-meta-value { flex: 1; }
        .sept-status-badge { display: inline-block; padding: 5px 15px; border-radius: 20px; color: white; font-weight: bold; }
        .sept-status-complete { background: #4ecdc4; }
        .sept-status-incomplete { background: #ff6b6b; }
        .sept-status-pending { background: #667eea; }
    </style>

    <div class="sept-meta-box">
        <div class="sept-meta-row">
            <div class="sept-meta-label"><?php esc_html_e('Email:', '7ensemble'); ?></div>
            <div class="sept-meta-value"><?php echo esc_html($email); ?></div>
        </div>

        <div class="sept-meta-row">
            <div class="sept-meta-label"><?php esc_html_e('Country:', '7ensemble'); ?></div>
            <div class="sept-meta-value"><?php echo esc_html($country); ?></div>
        </div>

        <div class="sept-meta-row">
            <div class="sept-meta-label"><?php esc_html_e('Payment Method:', '7ensemble'); ?></div>
            <div class="sept-meta-value"><?php echo esc_html($payment_method); ?></div>
        </div>

        <div class="sept-meta-row">
            <div class="sept-meta-label"><?php esc_html_e('Option:', '7ensemble'); ?></div>
            <div class="sept-meta-value"><?php echo ($option === 'seven') ? '7 personnes' : '3 personnes'; ?></div>
        </div>

        <div class="sept-meta-row">
            <div class="sept-meta-label"><?php esc_html_e('Registration Date:', '7ensemble'); ?></div>
            <div class="sept-meta-value"><?php echo esc_html($registration_date); ?></div>
        </div>

        <div class="sept-meta-row">
            <div class="sept-meta-label"><?php esc_html_e('Constellation Status:', '7ensemble'); ?></div>
            <div class="sept-meta-value">
                <span class="sept-status-badge sept-status-<?php echo esc_attr($constellation_status); ?>">
                    <?php echo esc_html(ucfirst($constellation_status)); ?>
                </span>
            </div>
        </div>

        <?php if ($is_center): ?>
        <div class="sept-meta-row">
            <div class="sept-meta-label"><?php esc_html_e('Role:', '7ensemble'); ?></div>
            <div class="sept-meta-value"><strong><?php esc_html_e('Constellation Center', '7ensemble'); ?></strong></div>
        </div>

        <div class="sept-meta-row">
            <div class="sept-meta-label"><?php esc_html_e('Members in Constellation:', '7ensemble'); ?></div>
            <div class="sept-meta-value">
                <?php
                if (is_array($constellation_members) && count($constellation_members) > 0) {
                    echo esc_html(count($constellation_members)) . ' ' . esc_html__('members', '7ensemble');
                } else {
                    echo esc_html__('No members yet', '7ensemble');
                }
                ?>
            </div>
        </div>
        <?php elseif ($constellation_center): ?>
        <div class="sept-meta-row">
            <div class="sept-meta-label"><?php esc_html_e('Constellation Center:', '7ensemble'); ?></div>
            <div class="sept-meta-value">
                <a href="<?php echo esc_url(get_edit_post_link($constellation_center)); ?>">
                    <?php echo esc_html(get_the_title($constellation_center)); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php
}
