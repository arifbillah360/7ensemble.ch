<?php
/**
 * Elementor Hero Widget
 *
 * @package 7ensemble
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Elementor_Seven_Ensemble_Hero_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return '7ensemble_hero';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__('7 Ensemble Hero', '7ensemble');
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-post-title';
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
        return ['hero', 'header', '7ensemble', 'banner'];
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
                'default' => '7 Ensemble',
                'placeholder' => esc_html__('Enter title', '7ensemble'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Qui, avec 21€, a changé ma vie',
                'placeholder' => esc_html__('Enter subtitle', '7ensemble'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tagline',
            [
                'label' => esc_html__('Tagline', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Une plateforme conçue pour que tout le monde puisse vivre et profiter des bons moments de la vie en famille, sans avoir à se soucier si demain, ils auront de quoi payer leurs factures',
                'placeholder' => esc_html__('Enter tagline', '7ensemble'),
                'rows' => 3,
            ]
        );

        $this->add_control(
            'transformation_amount',
            [
                'label' => esc_html__('Transformation Amount', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '1,575,747€',
                'placeholder' => esc_html__('Enter amount', '7ensemble'),
            ]
        );

        $this->add_control(
            'amount_description',
            [
                'label' => esc_html__('Amount Description', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Votre destination finale avec seulement 21€ de départ',
                'placeholder' => esc_html__('Enter description', '7ensemble'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'risk_text',
            [
                'label' => esc_html__('Risk Text', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'À RISQUE ZÉRO POUR VOUS',
                'placeholder' => esc_html__('Enter risk text', '7ensemble'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button_three_text',
            [
                'label' => esc_html__('Button 3 Persons Text', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Commencer avec 3 personnes',
                'placeholder' => esc_html__('Enter button text', '7ensemble'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button_seven_text',
            [
                'label' => esc_html__('Button 7 Persons Text', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Commencer avec 7 personnes',
                'placeholder' => esc_html__('Enter button text', '7ensemble'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'footer_text',
            [
                'label' => esc_html__('Footer Text', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'En ligne, ça va très très vite ! Un message WhatsApp et c\'est parti !',
                'placeholder' => esc_html__('Enter footer text', '7ensemble'),
                'label_block' => true,
            ]
        );

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
            'title_color',
            [
                'label' => esc_html__('Title Color', '7ensemble'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .hero h1' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', '7ensemble'),
                'selector' => '{{WRAPPER}} .hero h1',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', '7ensemble'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4ecdc4',
                'selectors' => [
                    '{{WRAPPER}} .hero .subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'amount_gradient_start',
            [
                'label' => esc_html__('Amount Gradient Start', '7ensemble'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ff6b6b',
            ]
        );

        $this->add_control(
            'amount_gradient_end',
            [
                'label' => esc_html__('Amount Gradient End', '7ensemble'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4ecdc4',
            ]
        );

        $this->add_responsive_control(
            'padding',
            [
                'label' => esc_html__('Padding', '7ensemble'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => '6',
                    'right' => '0',
                    'bottom' => '6',
                    'left' => '0',
                    'unit' => 'rem',
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $gradient_start = $settings['amount_gradient_start'];
        $gradient_end = $settings['amount_gradient_end'];
        ?>

        <section class="hero">
            <div class="container">
                <h1><?php echo esc_html($settings['title']); ?></h1>
                <p class="subtitle"><?php echo esc_html($settings['subtitle']); ?></p>
                <p class="tagline"><?php echo esc_html($settings['tagline']); ?></p>

                <div class="transformation-amount" style="background: linear-gradient(45deg, <?php echo esc_attr($gradient_start); ?>, <?php echo esc_attr($gradient_end); ?>); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    <?php echo esc_html($settings['transformation_amount']); ?>
                </div>

                <p style="font-size: 1.5rem; margin-bottom: 1rem;">
                    <?php echo esc_html($settings['amount_description']); ?>
                </p>

                <p style="font-size: 1.8rem; color: #ff6b6b; font-weight: bold; margin-bottom: 3rem;">
                    <?php echo esc_html($settings['risk_text']); ?>
                </p>

                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-bottom: 3rem;">
                    <button class="btn-primary" onclick="showThreeModal()" style="background: linear-gradient(45deg, #f093fb, #f5576c);">
                        <?php echo esc_html($settings['button_three_text']); ?>
                    </button>
                    <button class="btn-primary" onclick="showSevenModal()">
                        <?php echo esc_html($settings['button_seven_text']); ?>
                    </button>
                </div>

                <p style="font-size: 1.2rem; color: #4ecdc4;">
                    <?php echo esc_html($settings['footer_text']); ?>
                </p>
            </div>
        </section>

        <?php
    }

    /**
     * Render widget output in the editor (content template)
     */
    protected function content_template() {
        ?>
        <#
        var gradientStart = settings.amount_gradient_start;
        var gradientEnd = settings.amount_gradient_end;
        #>

        <section class="hero">
            <div class="container">
                <h1>{{{ settings.title }}}</h1>
                <p class="subtitle">{{{ settings.subtitle }}}</p>
                <p class="tagline">{{{ settings.tagline }}}</p>

                <div class="transformation-amount" style="background: linear-gradient(45deg, {{{ gradientStart }}}, {{{ gradientEnd }}}); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    {{{ settings.transformation_amount }}}
                </div>

                <p style="font-size: 1.5rem; margin-bottom: 1rem;">
                    {{{ settings.amount_description }}}
                </p>

                <p style="font-size: 1.8rem; color: #ff6b6b; font-weight: bold; margin-bottom: 3rem;">
                    {{{ settings.risk_text }}}
                </p>

                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-bottom: 3rem;">
                    <button class="btn-primary" style="background: linear-gradient(45deg, #f093fb, #f5576c);">
                        {{{ settings.button_three_text }}}
                    </button>
                    <button class="btn-primary">
                        {{{ settings.button_seven_text }}}
                    </button>
                </div>

                <p style="font-size: 1.2rem; color: #4ecdc4;">
                    {{{ settings.footer_text }}}
                </p>
            </div>
        </section>
        <?php
    }
}
