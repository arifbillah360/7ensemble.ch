/**
 * Elementor Frontend JavaScript for 7 Ensemble
 *
 * Handles Elementor-specific widget functionality
 */

(function($) {
    'use strict';

    /**
     * Initialize Elementor Widgets
     */
    var SevenEnsembleElementor = {

        /**
         * Initialize all widgets
         */
        init: function() {
            // Initialize when Elementor frontend is ready
            $(window).on('elementor/frontend/init', function() {
                SevenEnsembleElementor.initRegistrationForms();
                SevenEnsembleElementor.initConstellationAnimations();
                SevenEnsembleElementor.initModalTriggers();
            });

            // Also initialize on document ready for non-Elementor pages
            $(document).ready(function() {
                SevenEnsembleElementor.initRegistrationForms();
                SevenEnsembleElementor.initModalTriggers();
            });
        },

        /**
         * Initialize Registration Forms
         */
        initRegistrationForms: function() {
            // Remove any existing handlers to prevent duplicates
            $('.sept-registration-form').off('submit.septForm');

            // Add form submission handler
            $('.sept-registration-form').on('submit.septForm', function(e) {
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

                // Validate option selection
                if (!formData.optionType) {
                    alert('⚠️ Veuillez sélectionner une option (3 ou 7 personnes)');
                    return;
                }

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
                                '🎉 FÉLICITATIONS ! Bienvenue dans 7 Ensemble (7 Personnes) !\n\n✅ Objectif : ' + targetAmount + '\n✅ Votre inscription est confirmée\n✅ Email de bienvenue envoyé\n✅ Votre constellation de 7 personnes sera formée sous 24-48h\n✅ Premiers gains dans 7 jours maximum\n\n🚀 Votre voyage vers la liberté financière commence MAINTENANT !' :
                                '✨ FÉLICITATIONS ! Bienvenue dans 7 Ensemble (3 Personnes) !\n\n✅ Objectif : ' + targetAmount + '\n✅ Votre inscription est confirmée\n✅ Email de bienvenue envoyé\n✅ Votre constellation de 3 personnes sera formée sous 24-48h\n✅ Premiers gains dans 5 jours maximum\n\n🌟 Parfait pour découvrir le système avant de passer aux 7 personnes !';

                            alert(message);
                            $form[0].reset();

                            // Close modal if in modal mode
                            $form.closest('.sept-registration-modal').removeClass('show');
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
        },

        /**
         * Initialize Modal Triggers
         */
        initModalTriggers: function() {
            // Modal trigger buttons
            $('.sept-modal-trigger').off('click.septModal').on('click.septModal', function() {
                var target = $(this).data('target');
                $('#' + target).addClass('show');
            });

            // Close modal buttons
            $('.sept-close-modal').off('click.septClose').on('click.septClose', function() {
                $(this).closest('.sept-registration-modal').removeClass('show');
            });

            // Close modal when clicking outside
            $('.sept-registration-modal').off('click.septOutside').on('click.septOutside', function(e) {
                if ($(e.target).hasClass('sept-registration-modal')) {
                    $(this).removeClass('show');
                }
            });
        },

        /**
         * Initialize Constellation Animations
         */
        initConstellationAnimations: function() {
            // Apply animation speed from custom properties
            $('.constellation-container').each(function() {
                var speed = $(this).css('--animation-speed');
                if (speed) {
                    $(this).find('.constellation-member').css('animation-duration', speed);
                }
            });
        }
    };

    // Initialize
    SevenEnsembleElementor.init();

    // Expose global functions for backward compatibility
    window.showSevenModal = function() {
        $('#registrationModal').addClass('show');
        $('input[name="optionType"][value="seven"]').prop('checked', true);
    };

    window.showThreeModal = function() {
        $('#registrationModal').addClass('show');
        $('input[name="optionType"][value="three"]').prop('checked', true);
    };

    window.closeModal = function(modalId) {
        $('#' + modalId).removeClass('show');
    };

})(jQuery);
