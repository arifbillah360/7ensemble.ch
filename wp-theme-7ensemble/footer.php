<!-- Modal d'inscription unifié -->
<div id="registrationModal" class="modal modal-glassmorphic">
    <div class="modal-content-glass">
        <span class="close" onclick="closeModal('registrationModal')">&times;</span>
        <h2 class="modal-title-glass"><?php esc_html_e('🌟 Rejoindre 7 Ensemble 🌟', '7ensemble'); ?></h2>

        <form id="registrationForm">
            <!-- Nom complet -->
            <div class="form-group-glass">
                <label for="fullName"><?php esc_html_e('Nom complet', '7ensemble'); ?></label>
                <input type="text" id="fullName" name="fullName" required placeholder="<?php esc_attr_e('Votre nom et prénom', '7ensemble'); ?>" class="input-glass">
            </div>

            <!-- Email -->
            <div class="form-group-glass">
                <label for="email"><?php esc_html_e('Email', '7ensemble'); ?></label>
                <input type="email" id="email" name="email" required placeholder="<?php esc_attr_e('votre@email.com', '7ensemble'); ?>" class="input-glass">
            </div>

            <!-- Pays -->
            <div class="form-group-glass">
                <label for="country"><?php esc_html_e('Pays', '7ensemble'); ?></label>
                <select id="country" name="country" required class="select-glass">
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

            <!-- Mode de paiement -->
            <div class="form-group-glass">
                <label for="paymentMethod"><?php esc_html_e('Mode de paiement préféré', '7ensemble'); ?></label>
                <select id="paymentMethod" name="paymentMethod" required class="select-glass">
                    <option value=""><?php esc_html_e('Choisir votre méthode', '7ensemble'); ?></option>
                    <option value="card"><?php esc_html_e('💳 Carte bancaire', '7ensemble'); ?></option>
                    <option value="paypal"><?php esc_html_e('🔵 PayPal', '7ensemble'); ?></option>
                    <option value="transfer"><?php esc_html_e('🏦 Virement bancaire', '7ensemble'); ?></option>
                    <option value="mobile"><?php esc_html_e('📱 Mobile Money (Afrique)', '7ensemble'); ?></option>
                    <option value="crypto"><?php esc_html_e('₿ Bitcoin/Crypto', '7ensemble'); ?></option>
                    <option value="other"><?php esc_html_e('🌍 Autre', '7ensemble'); ?></option>
                </select>
            </div>

            <!-- Acceptation -->
            <div class="form-group-glass checkbox-group">
                <label class="checkbox-label">
                    <input type="checkbox" id="acceptTerms" name="acceptTerms" required class="checkbox-glass">
                    <span><?php esc_html_e('J\'accepte le système d\'entraide 7 Ensemble et comprends le principe de solidarité mutuelle.', '7ensemble'); ?></span>
                </label>
            </div>

            <!-- Section de sélection d'option -->
            <div class="form-group-glass">
                <label><?php esc_html_e('Choisissez votre option', '7ensemble'); ?></label>
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
            <button type="submit" class="btn-submit-glass">
                <?php esc_html_e('🚀 Créer Ma Constellation !', '7ensemble'); ?>
            </button>
            <p class="submit-tagline"><?php esc_html_e('Bravo, votre aventure commence ici 💕', '7ensemble'); ?></p>
        </form>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
