<?php
/**
 * Main template file
 *
 * @package 7ensemble
 */

get_header();
?>

<main>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>7 Ensemble</h1>
            <p class="subtitle"><?php esc_html_e('Qui, avec 21€, a changé ma vie', '7ensemble'); ?></p>
            <p class="tagline"><?php esc_html_e('Une plateforme conçue pour que tout le monde puisse vivre et profiter des bons moments de la vie en famille, sans avoir à se soucier si demain, ils auront de quoi payer leurs factures', '7ensemble'); ?></p>

            <div class="transformation-amount">1,575,747€</div>
            <p style="font-size: 1.5rem; margin-bottom: 1rem;"><?php esc_html_e('Votre destination finale avec seulement 21€ de départ', '7ensemble'); ?></p>
            <p style="font-size: 1.8rem; color: #ff6b6b; font-weight: bold; margin-bottom: 3rem;"><?php esc_html_e('À RISQUE ZÉRO POUR VOUS', '7ensemble'); ?></p>

            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-bottom: 3rem;">
                <button class="btn-primary" onclick="showThreeModal()" style="background: linear-gradient(45deg, #f093fb, #f5576c);">
                    <?php esc_html_e('Commencer avec 3 personnes', '7ensemble'); ?>
                </button>
                <button class="btn-primary" onclick="showSevenModal()">
                    <?php esc_html_e('Commencer avec 7 personnes', '7ensemble'); ?>
                </button>
            </div>

            <p style="font-size: 1.2rem; color: #4ecdc4;"><?php esc_html_e('En ligne, ça va très très vite ! Un message WhatsApp et c\'est parti !', '7ensemble'); ?></p>
        </div>
    </section>

    <!-- Principe Section -->
    <section id="principe" class="principe-section">
        <div class="container">
            <h2 style="text-align: center; font-size: 3rem; margin-bottom: 2rem;">
                <?php esc_html_e('Le Principe Simple : La Force du 7 et du 21', '7ensemble'); ?>
            </h2>

            <div style="text-align: center; margin: 3rem 0; padding: 2rem; background: rgba(255,107,107,0.1); border-radius: 15px;">
                <h3 style="font-size: 2rem; color: #f093fb;"><?php esc_html_e('Pourquoi 21€ et pourquoi 7 ?', '7ensemble'); ?></h3>
                <p style="font-size: 1.3rem; line-height: 1.8; margin-top: 1rem;">
                    <strong style="color: #4ecdc4;"><?php esc_html_e('Le chiffre 7 = puissance spirituelle et symbolique énorme', '7ensemble'); ?></strong><br>
                    <strong style="color: #ff6b6b;"><?php esc_html_e('Le 3 = force universelle (3 × 7 = 21, et 2+1 = 3)', '7ensemble'); ?></strong><br>
                    <?php esc_html_e('Ce ne sont pas des montants choisis au hasard, c\'est de la pure énergie mathématique !', '7ensemble'); ?>
                </p>
            </div>

            <div class="constellation-visual">
                <h3><?php esc_html_e('Votre Constellation : Le Réseau Qui Vous Suivra À Tout Jamais', '7ensemble'); ?></h3>

                <div class="constellation-container">
                    <div class="constellation-center"><?php esc_html_e('VOUS', '7ensemble'); ?></div>
                    <div class="constellation-member member-1" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/1.jpeg');"></div>
                    <div class="constellation-member member-2" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/2.jpeg');"></div>
                    <div class="constellation-member member-3" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/3.jpeg');"></div>
                    <div class="constellation-member member-4" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/4.jpeg');"></div>
                    <div class="constellation-member member-5" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/5.jpeg');"></div>
                    <div class="constellation-member member-6" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/6.jpeg');"></div>
                    <div class="constellation-member member-7" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/7.jpeg');"></div>
                </div>

                <p><?php esc_html_e('Une fois votre Constellation créée, chaque tour peut durer UNE SEMAINE !', '7ensemble'); ?></p>
                <p class="subtitle"><?php esc_html_e('Le plus long, c\'est le premier tour. Après, ça va très très vite !', '7ensemble'); ?></p>
            </div>

            <div class="principe-grid">
                <div class="principe-card">
                    <div class="principe-number">💝</div>
                    <h3><?php esc_html_e('Vous Aidez', '7ensemble'); ?></h3>
                    <p style="font-size: 1.5rem; color: #4ecdc4; margin: 1rem 0;"><strong>21€</strong></p>
                    <p><?php esc_html_e('à une personne dans le besoin', '7ensemble'); ?></p>
                </div>
                <div class="principe-card">
                    <div class="principe-number">🎁</div>
                    <h3><?php esc_html_e('Vous Recevez', '7ensemble'); ?></h3>
                    <p style="font-size: 1.5rem; color: #4ecdc4; margin: 1rem 0;"><strong>147€</strong></p>
                    <p><?php esc_html_e('de 7 personnes (21€ chacune)', '7ensemble'); ?></p>
                </div>
                <div class="principe-card">
                    <div class="principe-number">✨</div>
                    <h3><?php esc_html_e('Vous Gardez', '7ensemble'); ?></h3>
                    <p style="font-size: 1.5rem; color: #4ecdc4; margin: 1rem 0;"><strong>47€ nets</strong></p>
                    <p><?php esc_html_e('Vous avez déjà doublé votre mise !', '7ensemble'); ?></p>
                </div>
            </div>

            <div style="text-align: center; margin: 4rem 0; padding: 3rem; background: linear-gradient(45deg, rgba(78,205,196,0.2), rgba(255,107,107,0.2)); border-radius: 20px; border: 2px solid #4ecdc4;">
                <h2 style="font-size: 2.5rem; color: #ff6b6b; margin-bottom: 2rem;">
                    <?php esc_html_e('🚨 DEUX POSSIBILITÉS POUR COMMENCER 🚨', '7ensemble'); ?>
                </h2>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin: 2rem 0;">
                    <div style="background: rgba(255,255,255,0.1); padding: 2rem; border-radius: 15px; backdrop-filter: blur(10px);">
                        <h3 style="color: #f093fb; font-size: 1.8rem;"><?php esc_html_e('Option 3 Personnes', '7ensemble'); ?></h3>
                        <p style="font-size: 1.2rem; margin: 1rem 0;"><?php esc_html_e('Pour ceux qui trouvent 7 "beaucoup"', '7ensemble'); ?></p>
                        <p style="color: #4ecdc4; font-size: 1.1rem;"><?php esc_html_e('Gain total : 7,789€', '7ensemble'); ?></p>
                        <p style="margin-top: 1rem;"><?php esc_html_e('Une fois que vous voyez que ça marche, vous passez au 7 !', '7ensemble'); ?></p>
                    </div>
                    <div style="background: rgba(255,255,255,0.1); padding: 2rem; border-radius: 15px; backdrop-filter: blur(10px);">
                        <h3 style="color: #4ecdc4; font-size: 1.8rem;"><?php esc_html_e('Option 7 Personnes', '7ensemble'); ?></h3>
                        <p style="font-size: 1.2rem; margin: 1rem 0;"><?php esc_html_e('Pour les audacieux qui veulent tout', '7ensemble'); ?></p>
                        <p style="color: #ff6b6b; font-size: 1.1rem;"><?php esc_html_e('Gain total : 1,575,747€', '7ensemble'); ?></p>
                        <p style="margin-top: 1rem;"><?php esc_html_e('La voie royale vers la liberté financière !', '7ensemble'); ?></p>
                    </div>
                </div>

                <p style="font-size: 1.4rem; font-weight: bold; color: #4ecdc4;">
                    <?php esc_html_e('En ligne, c\'est ULTRA RAPIDE : un message WhatsApp, un lien de paiement, et c\'est parti ! 🚀', '7ensemble'); ?>
                </p>
            </div>

            <div style="text-align: center; margin-top: 3rem; padding: 2rem; background: rgba(255,107,107,0.2); border-radius: 15px;">
                <h3 style="font-size: 2rem; color: #ff6b6b;">⚠️ <?php esc_html_e('CE N\'EST QUE LE DÉBUT !', '7ensemble'); ?> ⚠️</h3>
                <p style="font-size: 1.3rem; margin-top: 1rem;">
                    <?php esc_html_e('147€, c\'est juste pour prouver que ça marche. Les VRAIS gains viennent avec les tours suivants !', '7ensemble'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Tours Section -->
    <section id="tours" class="tours-section">
        <div class="container">
            <h2 style="font-size: 3rem; margin-bottom: 2rem;">
                <?php esc_html_e('Les 7 Tours Magiques : Votre Ascension Vers la Prospérité', '7ensemble'); ?>
            </h2>
            <p style="font-size: 1.5rem; margin-bottom: 3rem; color: #4ecdc4;">
                <?php esc_html_e('Préparez-vous à découvrir comment 21€ se transforment en 1,575,747€ grâce à la puissance exponentielle de notre système !', '7ensemble'); ?>
            </p>

            <div class="tours-timeline">
                <div class="tour-item">
                    <div class="tour-number">1</div>
                    <div class="tour-content">
                        <div class="tour-title"><?php esc_html_e('Tour 1 : L\'Éveil', '7ensemble'); ?></div>
                        <div class="tour-amount">147€</div>
                        <p><?php esc_html_e('Votre première victoire qui confirme que le système fonctionne parfaitement', '7ensemble'); ?></p>
                    </div>
                </div>

                <div class="tour-item">
                    <div class="tour-number">2</div>
                    <div class="tour-content">
                        <div class="tour-title"><?php esc_html_e('Tour 2 : L\'Élan', '7ensemble'); ?></div>
                        <div class="tour-amount">700€</div>
                        <p><?php esc_html_e('L\'accélération commence, vos premières vraies économies', '7ensemble'); ?></p>
                    </div>
                </div>

                <div class="tour-item">
                    <div class="tour-number">3</div>
                    <div class="tour-content">
                        <div class="tour-title"><?php esc_html_e('Tour 3 : La Percée', '7ensemble'); ?></div>
                        <div class="tour-amount">3,500€</div>
                        <p><?php esc_html_e('Le tournant décisif qui change votre rapport à l\'argent', '7ensemble'); ?></p>
                    </div>
                </div>

                <div class="tour-item">
                    <div class="tour-number">4</div>
                    <div class="tour-content">
                        <div class="tour-title"><?php esc_html_e('Tour 4 : L\'Envol', '7ensemble'); ?></div>
                        <div class="tour-amount">14,000€</div>
                        <p><?php esc_html_e('La liberté financière commence à prendre forme', '7ensemble'); ?></p>
                    </div>
                </div>

                <div class="tour-item">
                    <div class="tour-number">5</div>
                    <div class="tour-content">
                        <div class="tour-title"><?php esc_html_e('Tour 5 : La Puissance', '7ensemble'); ?></div>
                        <div class="tour-amount">70,000€</div>
                        <p><?php esc_html_e('Vos projets les plus fous deviennent réalisables', '7ensemble'); ?></p>
                    </div>
                </div>

                <div class="tour-item">
                    <div class="tour-number">6</div>
                    <div class="tour-content">
                        <div class="tour-title"><?php esc_html_e('Tour 6 : L\'Excellence', '7ensemble'); ?></div>
                        <div class="tour-amount">350,000€</div>
                        <p><?php esc_html_e('L\'indépendance financière totale à portée de main', '7ensemble'); ?></p>
                    </div>
                </div>

                <div class="tour-item">
                    <div class="tour-number">7</div>
                    <div class="tour-content">
                        <div class="tour-title"><?php esc_html_e('Tour 7 : L\'Apothéose', '7ensemble'); ?></div>
                        <div class="tour-amount">1,400,000€</div>
                        <p><?php esc_html_e('Le sommet de votre transformation financière', '7ensemble'); ?></p>
                    </div>
                </div>
            </div>

            <div style="text-align: center; margin-top: 4rem;">
                <h3 style="font-size: 2.5rem; color: #f093fb;">
                    <?php esc_html_e('La Vitesse de Croisière : En Moins d\'Une Année, Tout Bascule', '7ensemble'); ?>
                </h3>
                <p style="font-size: 1.3rem; margin: 2rem 0;">
                    <?php esc_html_e('La beauté du système 7 Ensemble réside dans son accélération naturelle. Une fois votre Constellation créée, chaque tour se déroule à une vitesse époustouflante ! En moins d\'une semaine, chaque membre de votre réseau constitue sa propre Constellation, créant un effet domino extraordinaire.', '7ensemble'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Urgence Section -->
    <section id="urgence" class="urgence-section">
        <div class="container">
            <h2 style="font-size: 3rem; margin-bottom: 2rem;">
                ⚡ <?php esc_html_e('URGENCE : Chaque Jour de Retard Est un Jour de Liberté Financière en Moins !', '7ensemble'); ?> ⚡
            </h2>

            <p style="font-size: 1.5rem; margin: 2rem 0;">
                <strong style="color: #ff6b6b;"><?php esc_html_e('L\'heure est venue de transformer votre vie !', '7ensemble'); ?></strong>
                <?php esc_html_e('Pendant que vous hésitez, d\'autres construisent déjà leur Constellation et récoltent leurs premiers gains.', '7ensemble'); ?>
                <strong style="color: #4ecdc4;"><?php esc_html_e('Chaque jour de retard est un jour de liberté financière en moins.', '7ensemble'); ?></strong>
            </p>

            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">47€</div>
                    <p><strong><?php esc_html_e('Premier Gain', '7ensemble'); ?></strong><br><?php esc_html_e('Votre récompense immédiate dès la première semaine', '7ensemble'); ?></p>
                </div>
                <div class="stat-item">
                    <div class="stat-number">7</div>
                    <p><strong><?php esc_html_e('Jours Maximum', '7ensemble'); ?></strong><br><?php esc_html_e('Pour constituer votre Constellation complète', '7ensemble'); ?></p>
                </div>
                <div class="stat-item">
                    <div class="stat-number">100%</div>
                    <p><strong><?php esc_html_e('Taux de Réussite', '7ensemble'); ?></strong><br><?php esc_html_e('Avec votre engagement et notre système', '7ensemble'); ?></p>
                </div>
            </div>

            <p style="font-size: 1.3rem; text-align: center; font-style: italic; color: #4ecdc4;">
                "<?php esc_html_e('Entraidons-nous car ensemble, nous changerons le monde et éradiquerons la pauvreté.', '7ensemble'); ?>"
            </p>

            <button class="btn-primary" onclick="showSevenModal()" style="font-size: 1.3rem; padding: 20px 40px; margin-top: 2rem;">
                🚀 <?php esc_html_e('Je Rejoins la Révolution Maintenant !', '7ensemble'); ?>
            </button>
        </div>
    </section>

    <!-- Mission Section -->
    <section id="mission" style="background: rgba(255,255,255,0.05); padding: 4rem 0; border-radius: 25px; margin: 4rem 0;">
        <div class="container">
            <h2 style="text-align: center; font-size: 3rem; margin-bottom: 2rem;">
                <?php esc_html_e('Mon Petit Coup de Gueule : Pourquoi 7 Ensemble ?', '7ensemble'); ?>
            </h2>

            <div style="text-align: center; margin: 3rem 0; padding: 3rem; background: rgba(255,107,107,0.15); border-radius: 20px; border-left: 5px solid #ff6b6b;">
                <p style="font-size: 1.8rem; font-style: italic; color: #ff6b6b; font-weight: bold;">
                    "<?php esc_html_e('Ne supportant plus ce qui se passe autour de moi, j\'ai créé cette plateforme d\'entraide révolutionnaire', '7ensemble'); ?>"
                </p>
            </div>

            <div style="background: rgba(78,205,196,0.1); padding: 3rem; border-radius: 20px; margin: 3rem 0;">
                <h3 style="font-size: 2.2rem; color: #4ecdc4; text-align: center; margin-bottom: 2rem;">
                    🎯 <?php esc_html_e('Aller À LA SOURCE Du Problème', '7ensemble'); ?>
                </h3>

                <p style="font-size: 1.3rem; line-height: 1.8; margin: 2rem 0;">
                    <strong><?php esc_html_e('Tout le monde cherche de l\'argent partout, mais personne ne va au cœur du problème.', '7ensemble'); ?></strong>
                    <?php esc_html_e('Les États ne vont pas au cœur du problème. Il faut aller à la source :', '7ensemble'); ?>
                    <strong style="color: #4ecdc4;"><?php esc_html_e('LA PERSONNE', '7ensemble'); ?></strong>.
                </p>

                <p style="font-size: 1.3rem; line-height: 1.8; margin: 2rem 0;">
                    <?php esc_html_e('Si la personne a un meilleur revenu, un meilleur pouvoir d\'achat, il n\'y a plus de problèmes de chômage, de retraite insuffisante, de vol dans les magasins.', '7ensemble'); ?>
                    <strong style="color: #ff6b6b;"><?php esc_html_e('Avec mon plan, il n\'y aura plus de soucis de retraite et plus de vol !', '7ensemble'); ?></strong>
                </p>
            </div>

            <div style="background: linear-gradient(45deg, rgba(255,107,107,0.2), rgba(78,205,196,0.2)); padding: 3rem; border-radius: 20px; margin: 3rem 0; text-align: center;">
                <h3 style="font-size: 2.5rem; color: #ff6b6b; margin-bottom: 2rem;">
                    🛡️ <?php esc_html_e('À RISQUE ZÉRO POUR VOUS', '7ensemble'); ?>
                </h3>
                <p style="font-size: 1.4rem; line-height: 1.8;">
                    <strong><?php esc_html_e('Le seul qui dépense de l\'argent pour créer cette plateforme, c\'est MOI.', '7ensemble'); ?></strong>
                    <?php esc_html_e('Vous ne risquez que 21€. Je ne prends aucune commission, aucun frais supplémentaire.', '7ensemble'); ?>
                    <strong style="color: #4ecdc4;"><?php esc_html_e('Je veux juste m\'en sortir au même niveau que vous !', '7ensemble'); ?></strong>
                </p>
                <p style="font-size: 1.2rem; margin-top: 1.5rem; font-style: italic; color: #f093fb;">
                    "<?php esc_html_e('Mon intérêt, c\'est VOUS. Voilà.', '7ensemble'); ?>"
                </p>
            </div>

            <div style="text-align: center; margin: 3rem 0;">
                <h3 style="font-size: 2rem; color: #4ecdc4;">
                    ⚖️ <?php esc_html_e('100% Légal : C\'est Un DON', '7ensemble'); ?>
                </h3>
                <p style="font-size: 1.2rem; margin: 1rem 0;">
                    <?php esc_html_e('J\'ai vérifié avec des avocats suisses : vous avez le droit de faire un don à quelqu\'un. Ce n\'est ni une pyramide, ni un système de Ponzi. C\'est de l\'entraide pure, comme ça se fait depuis des siècles dans certaines cultures (tontines africaines, associations rotatives, friendly societies britanniques).', '7ensemble'); ?>
                </p>
                <p style="font-size: 1.1rem; color: #f093fb;">
                    <?php esc_html_e('J\'ai juste simplifié un concept vieux comme le monde et le rendre accessible avec 21€ !', '7ensemble'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section style="background: linear-gradient(135deg, #667eea, #764ba2); padding: 6rem 0; text-align: center; border-radius: 25px; margin: 4rem 0;">
        <div class="container">
            <h2 style="font-size: 4rem; margin-bottom: 2rem;">
                <?php esc_html_e('Rejoignez la Révolution 7 Ensemble Dès Maintenant !', '7ensemble'); ?>
            </h2>

            <div class="transformation-amount" style="margin: 2rem 0;">1,575,747€</div>
            <p style="font-size: 1.8rem; margin-bottom: 1rem;">
                <?php esc_html_e('Votre destination finale avec seulement 21€ de départ', '7ensemble'); ?>
            </p>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin: 3rem 0; max-width: 800px; margin-left: auto; margin-right: auto;">
                <div style="background: rgba(0,0,0,0.2); padding: 2rem; border-radius: 15px; border: 2px solid rgba(255,255,255,0.3);">
                    <h4 style="color: #4ecdc4; font-size: 1.2rem;"><?php esc_html_e('Investissement Initial', '7ensemble'); ?></h4>
                    <p style="font-size: 2rem; font-weight: bold;"><?php esc_html_e('Seulement 21€', '7ensemble'); ?></p>
                    <p><?php esc_html_e('pour changer votre vie', '7ensemble'); ?></p>
                </div>
                <div style="background: rgba(0,0,0,0.2); padding: 2rem; border-radius: 15px; border: 2px solid rgba(255,255,255,0.3);">
                    <h4 style="color: #4ecdc4; font-size: 1.2rem;"><?php esc_html_e('Premier Résultat', '7ensemble'); ?></h4>
                    <p style="font-size: 2rem; font-weight: bold;"><?php esc_html_e('47€ nets', '7ensemble'); ?></p>
                    <p><?php esc_html_e('dès la première semaine', '7ensemble'); ?></p>
                </div>
                <div style="background: rgba(0,0,0,0.2); padding: 2rem; border-radius: 15px; border: 2px solid rgba(255,255,255,0.3);">
                    <h4 style="color: #4ecdc4; font-size: 1.2rem;"><?php esc_html_e('Potentiel Final', '7ensemble'); ?></h4>
                    <p style="font-size: 2rem; font-weight: bold;"><?php esc_html_e('Plus d\'1,5 million d\'euros', '7ensemble'); ?></p>
                    <p><?php esc_html_e('à terme', '7ensemble'); ?></p>
                </div>
            </div>

            <button class="btn-primary" onclick="showSevenModal()" style="font-size: 1.5rem; padding: 25px 50px; margin-top: 2rem; box-shadow: 0 10px 30px rgba(255,255,255,0.3);">
                🌟 <?php esc_html_e('Ma Nouvelle Vie Commence Maintenant !', '7ensemble'); ?> 🌟
            </button>
        </div>
    </section>
</main>

<?php
get_footer();
