<?php
/**
 * Elementor Principe Widget
 *
 * @package 7ensemble
 */

if (!defined('ABSPATH')) {
    exit;
}

class Elementor_Seven_Ensemble_Principe_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return '7ensemble_principe';
    }

    public function get_title() {
        return esc_html__('7 Ensemble Principe', '7ensemble');
    }

    public function get_icon() {
        return 'eicon-info-circle';
    }

    public function get_categories() {
        return ['7ensemble'];
    }

    protected function register_controls() {

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
                'label' => esc_html__('Section Title', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Le Principe Simple : La Force du 7 et du 21',
                'label_block' => true,
            ]
        );

        // Card 1
        $this->add_control(
            'card1_icon',
            [
                'label' => esc_html__('Card 1 Icon', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '💝',
            ]
        );

        $this->add_control(
            'card1_title',
            [
                'label' => esc_html__('Card 1 Title', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Vous Aidez',
            ]
        );

        $this->add_control(
            'card1_amount',
            [
                'label' => esc_html__('Card 1 Amount', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '21€',
            ]
        );

        $this->add_control(
            'card1_description',
            [
                'label' => esc_html__('Card 1 Description', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'à une personne dans le besoin',
                'label_block' => true,
            ]
        );

        // Card 2
        $this->add_control(
            'card2_icon',
            [
                'label' => esc_html__('Card 2 Icon', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '🎁',
            ]
        );

        $this->add_control(
            'card2_title',
            [
                'label' => esc_html__('Card 2 Title', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Vous Recevez',
            ]
        );

        $this->add_control(
            'card2_amount',
            [
                'label' => esc_html__('Card 2 Amount', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '147€',
            ]
        );

        $this->add_control(
            'card2_description',
            [
                'label' => esc_html__('Card 2 Description', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'de 7 personnes (21€ chacune)',
                'label_block' => true,
            ]
        );

        // Card 3
        $this->add_control(
            'card3_icon',
            [
                'label' => esc_html__('Card 3 Icon', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '✨',
            ]
        );

        $this->add_control(
            'card3_title',
            [
                'label' => esc_html__('Card 3 Title', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Vous Gardez',
            ]
        );

        $this->add_control(
            'card3_amount',
            [
                'label' => esc_html__('Card 3 Amount', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '47€ nets',
            ]
        );

        $this->add_control(
            'card3_description',
            [
                'label' => esc_html__('Card 3 Description', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Vous avez déjà doublé votre mise !',
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
            'amount_color',
            [
                'label' => esc_html__('Amount Color', '7ensemble'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4ecdc4',
                'selectors' => [
                    '{{WRAPPER}} .principe-card p strong' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>

        <section class="principe-section">
            <div class="container">
                <h2 style="text-align: center; font-size: 3rem; margin-bottom: 2rem;">
                    <?php echo esc_html($settings['title']); ?>
                </h2>

                <div class="principe-grid">
                    <div class="principe-card">
                        <div class="principe-number"><?php echo esc_html($settings['card1_icon']); ?></div>
                        <h3><?php echo esc_html($settings['card1_title']); ?></h3>
                        <p style="font-size: 1.5rem; color: #4ecdc4; margin: 1rem 0;">
                            <strong><?php echo esc_html($settings['card1_amount']); ?></strong>
                        </p>
                        <p><?php echo esc_html($settings['card1_description']); ?></p>
                    </div>

                    <div class="principe-card">
                        <div class="principe-number"><?php echo esc_html($settings['card2_icon']); ?></div>
                        <h3><?php echo esc_html($settings['card2_title']); ?></h3>
                        <p style="font-size: 1.5rem; color: #4ecdc4; margin: 1rem 0;">
                            <strong><?php echo esc_html($settings['card2_amount']); ?></strong>
                        </p>
                        <p><?php echo esc_html($settings['card2_description']); ?></p>
                    </div>

                    <div class="principe-card">
                        <div class="principe-number"><?php echo esc_html($settings['card3_icon']); ?></div>
                        <h3><?php echo esc_html($settings['card3_title']); ?></h3>
                        <p style="font-size: 1.5rem; color: #4ecdc4; margin: 1rem 0;">
                            <strong><?php echo esc_html($settings['card3_amount']); ?></strong>
                        </p>
                        <p><?php echo esc_html($settings['card3_description']); ?></p>
                    </div>
                </div>
            </div>
        </section>

        <?php
    }

    protected function content_template() {
        ?>
        <section class="principe-section">
            <div class="container">
                <h2 style="text-align: center; font-size: 3rem; margin-bottom: 2rem;">
                    {{{ settings.title }}}
                </h2>

                <div class="principe-grid">
                    <div class="principe-card">
                        <div class="principe-number">{{{ settings.card1_icon }}}</div>
                        <h3>{{{ settings.card1_title }}}</h3>
                        <p style="font-size: 1.5rem; color: #4ecdc4; margin: 1rem 0;">
                            <strong>{{{ settings.card1_amount }}}</strong>
                        </p>
                        <p>{{{ settings.card1_description }}}</p>
                    </div>

                    <div class="principe-card">
                        <div class="principe-number">{{{ settings.card2_icon }}}</div>
                        <h3>{{{ settings.card2_title }}}</h3>
                        <p style="font-size: 1.5rem; color: #4ecdc4; margin: 1rem 0;">
                            <strong>{{{ settings.card2_amount }}}</strong>
                        </p>
                        <p>{{{ settings.card2_description }}}</p>
                    </div>

                    <div class="principe-card">
                        <div class="principe-number">{{{ settings.card3_icon }}}</div>
                        <h3>{{{ settings.card3_title }}}</h3>
                        <p style="font-size: 1.5rem; color: #4ecdc4; margin: 1rem 0;">
                            <strong>{{{ settings.card3_amount }}}</strong>
                        </p>
                        <p>{{{ settings.card3_description }}}</p>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
