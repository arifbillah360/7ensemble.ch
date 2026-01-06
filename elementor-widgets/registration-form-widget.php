<?php
/**
 * Elementor Registration Form Widget
 *
 * @package 7ensemble
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Elementor_Seven_Ensemble_Registration_Form_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return '7ensemble_registration_form';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__('7 Ensemble Registration Form', '7ensemble');
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-form-horizontal';
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
        return ['form', 'registration', '7ensemble', 'signup'];
    }

    /**
     * Get script dependencies
     */
    public function get_script_depends() {
        return ['sept-ensemble-script'];
    }

    /**
     * Register widget controls
     */
    protected function register_controls() {

        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Form Settings', '7ensemble'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'form_title',
            [
                'label' => esc_html__('Form Title', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '🌟 Rejoindre 7 Ensemble 🌟',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'submit_button_text',
            [
                'label' => esc_html__('Submit Button Text', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '🚀 Créer Ma Constellation !',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'submit_tagline',
            [
                'label' => esc_html__('Submit Tagline', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Bravo, votre aventure commence ici 💕',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'display_mode',
            [
                'label' => esc_html__('Display Mode', '7ensemble'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'inline',
                'options' => [
                    'inline' => esc_html__('Inline (Visible)', '7ensemble'),
                    'modal' => esc_html__('Modal (Popup)', '7ensemble'),
                ],
                'description' => esc_html__('Choose how to display the form', '7ensemble'),
            ]
        );

        $this->add_control(
            'trigger_button_text',
            [
                'label' => esc_html__('Trigger Button Text', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Rejoindre la révolution',
                'label_block' => true,
                'condition' => [
                    'display_mode' => 'modal',
                ],
            ]
        );

        $this->end_controls_section();

        // Labels Section
        $this->start_controls_section(
            'labels_section',
            [
                'label' => esc_html__('Form Labels', '7ensemble'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'label_fullname',
            [
                'label' => esc_html__('Full Name Label', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Nom complet',
            ]
        );

        $this->add_control(
            'label_email',
            [
                'label' => esc_html__('Email Label', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Email',
            ]
        );

        $this->add_control(
            'label_country',
            [
                'label' => esc_html__('Country Label', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Pays',
            ]
        );

        $this->add_control(
            'label_payment',
            [
                'label' => esc_html__('Payment Method Label', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Mode de paiement préféré',
            ]
        );

        $this->add_control(
            'label_option',
            [
                'label' => esc_html__('Option Label', '7ensemble'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Choisissez votre option',
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
            'form_background',
            [
                'label' => esc_html__('Form Background', '7ensemble'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(26, 26, 46, 0.7)',
                'selectors' => [
                    '{{WRAPPER}} .sept-registration-form-container' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'label_color',
            [
                'label' => esc_html__('Label Color', '7ensemble'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4ecdc4',
                'selectors' => [
                    '{{WRAPPER}} .form-group-glass label' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_gradient_start',
            [
                'label' => esc_html__('Button Gradient Start', '7ensemble'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#667eea',
            ]
        );

        $this->add_control(
            'button_gradient_end',
            [
                'label' => esc_html__('Button Gradient End', '7ensemble'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#764ba2',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $unique_id = 'sept-form-' . $this->get_id();
        $is_modal = ($settings['display_mode'] === 'modal');

        if ($is_modal) {
            // Render trigger button for modal
            ?>
            <button class="btn-primary sept-modal-trigger" data-target="<?php echo esc_attr($unique_id); ?>">
                <?php echo esc_html($settings['trigger_button_text']); ?>
            </button>
            <?php
        }

        $container_class = $is_modal ? 'modal modal-glassmorphic sept-registration-modal' : 'sept-registration-form-inline';
        ?>

        <div id="<?php echo esc_attr($unique_id); ?>" class="<?php echo esc_attr($container_class); ?>">
            <div class="<?php echo $is_modal ? 'modal-content-glass' : 'sept-registration-form-container'; ?>">
                <?php if ($is_modal) : ?>
                <span class="close sept-close-modal">&times;</span>
                <?php endif; ?>

                <h2 class="<?php echo $is_modal ? 'modal-title-glass' : 'form-title'; ?>">
                    <?php echo esc_html($settings['form_title']); ?>
                </h2>

                <form class="sept-registration-form" data-form-id="<?php echo esc_attr($unique_id); ?>">
                    <!-- Full Name -->
                    <div class="form-group-glass">
                        <label for="<?php echo esc_attr($unique_id); ?>_fullName">
                            <?php echo esc_html($settings['label_fullname']); ?>
                        </label>
                        <input type="text"
                               id="<?php echo esc_attr($unique_id); ?>_fullName"
                               name="fullName"
                               required
                               placeholder="<?php esc_attr_e('Votre nom et prénom', '7ensemble'); ?>"
                               class="input-glass">
                    </div>

                    <!-- Email -->
                    <div class="form-group-glass">
                        <label for="<?php echo esc_attr($unique_id); ?>_email">
                            <?php echo esc_html($settings['label_email']); ?>
                        </label>
                        <input type="email"
                               id="<?php echo esc_attr($unique_id); ?>_email"
                               name="email"
                               required
                               placeholder="<?php esc_attr_e('votre@email.com', '7ensemble'); ?>"
                               class="input-glass">
                    </div>

                    <!-- Country -->
                    <div class="form-group-glass">
                        <label for="<?php echo esc_attr($unique_id); ?>_country">
                            <?php echo esc_html($settings['label_country']); ?>
                        </label>
                        <select id="<?php echo esc_attr($unique_id); ?>_country" name="country" required class="select-glass">
                            <option value=""><?php esc_html_e('Choisir votre pays', '7ensemble'); ?></option>
                            <option value="FR"><?php esc_html_e('France', '7ensemble'); ?></option>
                            <option value="CH"><?php esc_html_e('Suisse', '7ensemble'); ?></option>
                            <option value="BE"><?php esc_html_e('Belgique', '7ensemble'); ?></option>
                            <option value="CA"><?php esc_html_e('Canada', '7ensemble'); ?></option>
                            <option value="MA"><?php esc_html_e('Maroc', '7ensemble'); ?></option>
                            <option value="TN"><?php esc_html_e('Tunisie', '7ensemble'); ?></option>
                            <option value="SN"><?php esc_html_e('Sénégal', '7ensemble'); ?></option>
                            <option value="CI"><?php esc_html_e('Côte d\'Ivoire', '7ensemble'); ?></option>
                            <option value="IN"><?php esc_html_e('Inde', '7ensemble'); ?></option>
                            <option value="OTHER"><?php esc_html_e('Autre', '7ensemble'); ?></option>
                        </select>
                    </div>

                    <!-- Payment Method -->
                    <div class="form-group-glass">
                        <label for="<?php echo esc_attr($unique_id); ?>_paymentMethod">
                            <?php echo esc_html($settings['label_payment']); ?>
                        </label>
                        <select id="<?php echo esc_attr($unique_id); ?>_paymentMethod" name="paymentMethod" required class="select-glass">
                            <option value=""><?php esc_html_e('Choisir votre méthode', '7ensemble'); ?></option>
                            <option value="card"><?php esc_html_e('💳 Carte bancaire', '7ensemble'); ?></option>
                            <option value="paypal"><?php esc_html_e('🔵 PayPal', '7ensemble'); ?></option>
                            <option value="transfer"><?php esc_html_e('🏦 Virement bancaire', '7ensemble'); ?></option>
                            <option value="mobile"><?php esc_html_e('📱 Mobile Money (Afrique)', '7ensemble'); ?></option>
                            <option value="crypto"><?php esc_html_e('₿ Bitcoin/Crypto', '7ensemble'); ?></option>
                            <option value="other"><?php esc_html_e('🌍 Autre', '7ensemble'); ?></option>
                        </select>
                    </div>

                    <!-- Terms -->
                    <div class="form-group-glass checkbox-group">
                        <label class="checkbox-label">
                            <input type="checkbox"
                                   id="<?php echo esc_attr($unique_id); ?>_acceptTerms"
                                   name="acceptTerms"
                                   required
                                   class="checkbox-glass">
                            <span><?php esc_html_e('J\'accepte le système d\'entraide 7 Ensemble et comprends le principe de solidarité mutuelle.', '7ensemble'); ?></span>
                        </label>
                    </div>

                    <!-- Option Selection -->
                    <div class="form-group-glass">
                        <label><?php echo esc_html($settings['label_option']); ?></label>
                        <div style="margin-top: 0.5rem;">
                            <label style="display: block; margin: 0.5rem 0; color: rgba(255,255,255,0.9); cursor: pointer;">
                                <input type="radio" name="optionType" value="three" required style="margin-right: 0.5rem;">
                                <?php esc_html_e('Option 3 personnes vers 7\'789€', '7ensemble'); ?>
                            </label>
                            <label style="display: block; margin: 0.5rem 0; color: rgba(255,255,255,0.9); cursor: pointer;">
                                <input type="radio" name="optionType" value="seven" style="margin-right: 0.5rem;">
                                <?php esc_html_e('Option 7 personnes vers 1\'575\'747€', '7ensemble'); ?>
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="btn-submit-glass"
                            style="background: linear-gradient(135deg, <?php echo esc_attr($settings['button_gradient_start']); ?>, <?php echo esc_attr($settings['button_gradient_end']); ?>);">
                        <?php echo esc_html($settings['submit_button_text']); ?>
                    </button>
                    <p class="submit-tagline"><?php echo esc_html($settings['submit_tagline']); ?></p>
                </form>
            </div>
        </div>

        <script>
        jQuery(document).ready(function($) {
            // Modal trigger
            $('.sept-modal-trigger[data-target="<?php echo esc_js($unique_id); ?>"]').on('click', function() {
                $('#<?php echo esc_js($unique_id); ?>').addClass('show');
            });

            // Close modal
            $('#<?php echo esc_js($unique_id); ?> .sept-close-modal, #<?php echo esc_js($unique_id); ?>').on('click', function(e) {
                if ($(e.target).hasClass('sept-close-modal') || $(e.target).hasClass('sept-registration-modal')) {
                    $('#<?php echo esc_js($unique_id); ?>').removeClass('show');
                }
            });

            // Form submission
            $('#<?php echo esc_js($unique_id); ?> .sept-registration-form').on('submit', function(e) {
                e.preventDefault();

                var $form = $(this);
                var formData = {
                    action: 'sept_register',
                    nonce: septEnsemble.nonce,
                    fullName: $form.find('[name="fullName"]').val(),
                    email: $form.find('[name="email"]').val(),
                    country: $form.find('[name="country"]').val(),
                    paymentMethod: $form.find('[name="paymentMethod"]').val(),
                    optionType: $form.find('[name="optionType"]:checked').val()
                };

                var $submitBtn = $form.find('button[type="submit"]');
                var originalText = $submitBtn.html();

                $submitBtn.html('⏳ Création de votre constellation...').prop('disabled', true);

                $.ajax({
                    url: septEnsemble.ajax_url,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            var targetAmount = formData.optionType === 'seven' ? '1,575,747€' : '7,789€';
                            var message = formData.optionType === 'seven' ?
                                '🎉 FÉLICITATIONS ! Bienvenue dans 7 Ensemble (7 Personnes) !\\n\\n✅ Objectif : ' + targetAmount + '\\n✅ Votre inscription est confirmée\\n✅ Email de bienvenue envoyé\\n✅ Votre constellation de 7 personnes sera formée sous 24-48h\\n✅ Premiers gains dans 7 jours maximum\\n\\n🚀 Votre voyage vers la liberté financière commence MAINTENANT !' :
                                '✨ FÉLICITATIONS ! Bienvenue dans 7 Ensemble (3 Personnes) !\\n\\n✅ Objectif : ' + targetAmount + '\\n✅ Votre inscription est confirmée\\n✅ Email de bienvenue envoyé\\n✅ Votre constellation de 3 personnes sera formée sous 24-48h\\n✅ Premiers gains dans 5 jours maximum\\n\\n🌟 Parfait pour découvrir le système avant de passer aux 7 personnes !';

                            alert(message);
                            $form[0].reset();
                            $('#<?php echo esc_js($unique_id); ?>').removeClass('show');
                        } else {
                            alert('❌ Erreur: ' + (response.data.message || 'Une erreur est survenue. Veuillez réessayer.'));
                        }
                    },
                    error: function() {
                        alert('❌ Erreur de connexion. Veuillez vérifier votre connexion internet et réessayer.');
                    },
                    complete: function() {
                        $submitBtn.html(originalText).prop('disabled', false);
                    }
                });
            });
        });
        </script>

        <?php
    }

    /**
     * Render widget output in the editor
     */
    protected function content_template() {
        ?>
        <#
        var uniqueId = 'sept-form-' + view.getID();
        var isModal = (settings.display_mode === 'modal');
        var containerClass = isModal ? 'modal modal-glassmorphic sept-registration-modal' : 'sept-registration-form-inline';
        #>

        <# if (isModal) { #>
        <button class="btn-primary sept-modal-trigger">
            {{{ settings.trigger_button_text }}}
        </button>
        <# } #>

        <div class="{{{ containerClass }}}">
            <div class="<# if (isModal) { #>modal-content-glass<# } else { #>sept-registration-form-container<# } #>">
                <# if (isModal) { #>
                <span class="close sept-close-modal">&times;</span>
                <# } #>

                <h2 class="<# if (isModal) { #>modal-title-glass<# } else { #>form-title<# } #>">
                    {{{ settings.form_title }}}
                </h2>

                <form class="sept-registration-form">
                    <div class="form-group-glass">
                        <label>{{{ settings.label_fullname }}}</label>
                        <input type="text" class="input-glass" placeholder="Votre nom et prénom" required>
                    </div>

                    <div class="form-group-glass">
                        <label>{{{ settings.label_email }}}</label>
                        <input type="email" class="input-glass" placeholder="votre@email.com" required>
                    </div>

                    <div class="form-group-glass">
                        <label>{{{ settings.label_country }}}</label>
                        <select class="select-glass" required>
                            <option value="">Choisir votre pays</option>
                            <option value="FR">France</option>
                        </select>
                    </div>

                    <div class="form-group-glass">
                        <label>{{{ settings.label_payment }}}</label>
                        <select class="select-glass" required>
                            <option value="">Choisir votre méthode</option>
                            <option value="card">💳 Carte bancaire</option>
                        </select>
                    </div>

                    <div class="form-group-glass checkbox-group">
                        <label class="checkbox-label">
                            <input type="checkbox" class="checkbox-glass" required>
                            <span>J'accepte le système d'entraide 7 Ensemble et comprends le principe de solidarité mutuelle.</span>
                        </label>
                    </div>

                    <div class="form-group-glass">
                        <label>{{{ settings.label_option }}}</label>
                        <div style="margin-top: 0.5rem;">
                            <label style="display: block; margin: 0.5rem 0; color: rgba(255,255,255,0.9); cursor: pointer;">
                                <input type="radio" name="optionType" value="three" required style="margin-right: 0.5rem;">
                                Option 3 personnes vers 7'789€
                            </label>
                            <label style="display: block; margin: 0.5rem 0; color: rgba(255,255,255,0.9); cursor: pointer;">
                                <input type="radio" name="optionType" value="seven" style="margin-right: 0.5rem;">
                                Option 7 personnes vers 1'575'747€
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit-glass" style="background: linear-gradient(135deg, {{{ settings.button_gradient_start }}}, {{{ settings.button_gradient_end }}});">
                        {{{ settings.submit_button_text }}}
                    </button>
                    <p class="submit-tagline">{{{ settings.submit_tagline }}}</p>
                </form>
            </div>
        </div>
        <?php
    }
}
