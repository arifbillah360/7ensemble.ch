<?php
/**
 * Elementor Stats Widget
 */

if (!defined('ABSPATH')) exit;

class Elementor_Seven_Ensemble_Stats_Widget extends \Elementor\Widget_Base {

    public function get_name() { return '7ensemble_stats'; }
    public function get_title() { return esc_html__('7 Ensemble Stats', '7ensemble'); }
    public function get_icon() { return 'eicon-counter'; }
    public function get_categories() { return ['7ensemble']; }

    protected function register_controls() {
        $this->start_controls_section('stats_section', [
            'label' => esc_html__('Stats', '7ensemble'),
        ]);

        for ($i = 1; $i <= 3; $i++) {
            $this->add_control('stat' . $i . '_number', [
                'label' => sprintf(esc_html__('Stat %d Number', '7ensemble'), $i),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
            ]);

            $this->add_control('stat' . $i . '_label', [
                'label' => sprintf(esc_html__('Stat %d Label', '7ensemble'), $i),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'label_block' => true,
            ]);

            $this->add_control('stat' . $i . '_description', [
                'label' => sprintf(esc_html__('Stat %d Description', '7ensemble'), $i),
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
        <div class="stats-grid">
            <?php for ($i = 1; $i <= 3; $i++) : ?>
            <div class="stat-item">
                <div class="stat-number"><?php echo esc_html($settings['stat' . $i . '_number']); ?></div>
                <p><strong><?php echo esc_html($settings['stat' . $i . '_label']); ?></strong><br>
                   <?php echo esc_html($settings['stat' . $i . '_description']); ?></p>
            </div>
            <?php endfor; ?>
        </div>
        <?php
    }
}
