<?php
/**
 * Elementor Constellation Widget
 *
 * @package 7ensemble
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Elementor_Seven_Ensemble_Constellation_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return '7ensemble_constellation';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__('7 Ensemble Constellation', '7ensemble');
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-globe';
    }

    /**
     * Get widget categories
     */
    public function get_categories() {
        return ['7ensemble'];
    }

    /**
     * Get widget keywords
     */
    public function get_keywords() {
        return ['constellation', 'members', '7ensemble', 'network'];
    }

    /**
     * Register widget controls
     */
    protected function register_controls() {

        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', '7ensemble'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Votre Constellation : Le Réseau Qui Vous Suivra À Tout Jamais',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'center_text',
            [
                'label' => esc_html__('Center Text', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'VOUS',
                'description' => esc_html__('Text displayed in the center of the constellation', '7ensemble'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Une fois votre Constellation créée, chaque tour peut durer UNE SEMAINE !',
                'rows' => 2,
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Le plus long, c\'est le premier tour. Après, ça va très très vite !',
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Member Images Section
        $this->start_controls_section(
            'member_images_section',
            [
                'label' => esc_html__('Member Images', '7ensemble'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'member_images_note',
            [
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => esc_html__('Upload images for each of the 7 constellation members. Images should be square for best results.', '7ensemble'),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]
        );

        for ($i = 1; $i <= 7; $i++) {
            $this->add_control(
                'member_' . $i . '_image',
                [
                    'label' => sprintf(esc_html__('Member %d Image', '7ensemble'), $i),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/' . $i . '.jpeg',
                    ],
                ]
            );
        }

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', '7ensemble'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__('Background Color', '7ensemble'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(25,25,50,0.4)',
                'selectors' => [
                    '{{WRAPPER}} .constellation-visual' => 'background: radial-gradient(circle at center, {{VALUE}}, rgba(10,10,30,0.8));',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', '7ensemble'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4ecdc4',
                'selectors' => [
                    '{{WRAPPER}} .constellation-visual h3' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'center_gradient_start',
            [
                'label' => esc_html__('Center Gradient Start', '7ensemble'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ff6b6b',
            ]
        );

        $this->add_control(
            'center_gradient_end',
            [
                'label' => esc_html__('Center Gradient End', '7ensemble'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4ecdc4',
            ]
        );

        $this->add_control(
            'enable_animation',
            [
                'label' => esc_html__('Enable Orbit Animation', '7ensemble'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', '7ensemble'),
                'label_off' => esc_html__('No', '7ensemble'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'animation_speed',
            [
                'label' => esc_html__('Animation Speed (seconds)', '7ensemble'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 8,
                'min' => 1,
                'max' => 30,
                'condition' => [
                    'enable_animation' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $gradient_start = $settings['center_gradient_start'];
        $gradient_end = $settings['center_gradient_end'];
        $animation_class = ($settings['enable_animation'] === 'yes') ? 'animated' : 'static';
        $animation_speed = $settings['animation_speed'];
        ?>

        <div class="constellation-visual constellation-<?php echo esc_attr($animation_class); ?>">
            <h3><?php echo esc_html($settings['title']); ?></h3>

            <div class="constellation-container" style="<?php if ($settings['enable_animation'] === 'yes') : ?>--animation-speed: <?php echo esc_attr($animation_speed); ?>s;<?php endif; ?>">
                <div class="constellation-center" style="background: linear-gradient(45deg, <?php echo esc_attr($gradient_start); ?>, <?php echo esc_attr($gradient_end); ?>);">
                    <?php echo esc_html($settings['center_text']); ?>
                </div>

                <?php for ($i = 1; $i <= 7; $i++) :
                    $member_image = $settings['member_' . $i . '_image'];
                    $image_url = !empty($member_image['url']) ? $member_image['url'] : get_template_directory_uri() . '/assets/images/' . $i . '.jpeg';
                ?>
                    <div class="constellation-member member-<?php echo esc_attr($i); ?>" style="background-image: url('<?php echo esc_url($image_url); ?>');"></div>
                <?php endfor; ?>
            </div>

            <p><?php echo esc_html($settings['description']); ?></p>
            <p class="subtitle"><?php echo esc_html($settings['subtitle']); ?></p>
        </div>

        <?php
    }

    /**
     * Render widget output in the editor
     */
    protected function content_template() {
        ?>
        <#
        var gradientStart = settings.center_gradient_start;
        var gradientEnd = settings.center_gradient_end;
        var animationClass = (settings.enable_animation === 'yes') ? 'animated' : 'static';
        var animationSpeed = settings.animation_speed;
        #>

        <div class="constellation-visual constellation-{{{ animationClass }}}">
            <h3>{{{ settings.title }}}</h3>

            <div class="constellation-container" <# if (settings.enable_animation === 'yes') { #>style="--animation-speed: {{{ animationSpeed }}}s;"<# } #>>
                <div class="constellation-center" style="background: linear-gradient(45deg, {{{ gradientStart }}}, {{{ gradientEnd }}});">
                    {{{ settings.center_text }}}
                </div>

                <# for (var i = 1; i <= 7; i++) {
                    var memberImage = settings['member_' + i + '_image'];
                    var imageUrl = memberImage.url || '<?php echo get_template_directory_uri(); ?>/assets/images/' + i + '.jpeg';
                #>
                    <div class="constellation-member member-{{{ i }}}" style="background-image: url('{{{ imageUrl }}}');"></div>
                <# } #>
            </div>

            <p>{{{ settings.description }}}</p>
            <p class="subtitle">{{{ settings.subtitle }}}</p>
        </div>
        <?php
    }
}
