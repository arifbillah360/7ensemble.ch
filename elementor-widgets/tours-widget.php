<?php
/**
 * Elementor Tours Widget
 */

if (!defined('ABSPATH')) exit;

class Elementor_Seven_Ensemble_Tours_Widget extends \Elementor\Widget_Base {

    public function get_name() { return '7ensemble_tours'; }
    public function get_title() { return esc_html__('7 Ensemble Tours', '7ensemble'); }
    public function get_icon() { return 'eicon-post-list'; }
    public function get_categories() { return ['7ensemble']; }

    protected function register_controls() {
        $this->start_controls_section('tours_section', [
            'label' => esc_html__('Tours', '7ensemble'),
        ]);

        for ($i = 1; $i <= 7; $i++) {
            $this->add_control('tour' . $i . '_title', [
                'label' => sprintf(esc_html__('Tour %d Title', '7ensemble'), $i),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Tour ' . $i,
                'label_block' => true,
            ]);

            $this->add_control('tour' . $i . '_amount', [
                'label' => sprintf(esc_html__('Tour %d Amount', '7ensemble'), $i),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
            ]);

            $this->add_control('tour' . $i . '_description', [
                'label' => sprintf(esc_html__('Tour %d Description', '7ensemble'), $i),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '',
                'rows' => 2,
            ]);
        }

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="tours-section">
            <div class="container">
                <div class="tours-timeline">
                    <?php for ($i = 1; $i <= 7; $i++) : ?>
                    <div class="tour-item">
                        <div class="tour-number"><?php echo esc_html($i); ?></div>
                        <div class="tour-content">
                            <div class="tour-title"><?php echo esc_html($settings['tour' . $i . '_title']); ?></div>
                            <div class="tour-amount"><?php echo esc_html($settings['tour' . $i . '_amount']); ?></div>
                            <p><?php echo esc_html($settings['tour' . $i . '_description']); ?></p>
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
