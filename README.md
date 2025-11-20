# 7 Ensemble - Site Web

Site web officiel pour 7 Ensemble - Plateforme d'entraide révolutionnaire.

## Structure du Site

### Pages Principales

1. **index.html** - Page d'accueil
   - Section héro avec présentation
   - Explication du principe 7 Ensemble
   - Visualisation de la constellation
   - Aperçu des 7 tours
   - Section urgence avec formulaires d'inscription

2. **7Ensemble Les 7 Tours.html** - Détails des tours
   - Tableaux détaillés pour option 3 personnes
   - Tableaux détaillés pour option 7 personnes
   - Explication du système de progression

3. **7Ensemble Mission.html** - Mission et vision
   - Message du créateur
   - Objectifs révolutionnaires
   - Impact social

### Système de Formulaires

#### Fonctionnalités
- Formulaires d'inscription pour options 3 et 7 personnes
- Validation côté client et serveur
- Stockage sécurisé des données
- Export CSV et JSON

#### Fichiers Backend
- **submit-form.php** - Traite les soumissions de formulaires
- **admin.php** - Panel d'administration pour voir les inscriptions
- **data/** - Dossier contenant les données (protégé)

## Installation

### Prérequis
- Serveur web (Apache/Nginx)
- PHP 7.4 ou supérieur
- Permissions d'écriture pour le dossier `data/`

### Configuration

1. **Cloner ou télécharger les fichiers**
   ```bash
   git clone <repository-url>
   cd 7ensemble.ch
   ```

2. **Créer le dossier de données**
   ```bash
   mkdir -p data
   chmod 755 data
   ```

3. **Configurer le serveur web**
   - Pointer le document root vers le dossier du site
   - S'assurer que le fichier `.htaccess` est activé
   - Configurer PHP avec les permissions appropriées

4. **Sécurité IMPORTANTE**
   - Changer le mot de passe admin dans `admin.php`
   - Ligne 11: `$ADMIN_PASSWORD = 'admin123';` → Changer `admin123`
   - Recommandé: Utiliser un système d'authentification plus robuste

5. **Configuration Email (Optionnel)**
   - Décommenter la fonction `sendConfirmationEmail()` dans `submit-form.php`
   - Configurer le serveur SMTP sur votre hébergement

## Utilisation

### Accès Public
- **Page d'accueil**: `https://votredomaine.com/`
- **Les 7 Tours**: `https://votredomaine.com/7Ensemble Les 7 Tours.html`
- **Mission**: `https://votredomaine.com/7Ensemble Mission.html`

### Panel Admin
- **URL**: `https://votredomaine.com/admin.php`
- **Mot de passe par défaut**: `admin123` (À CHANGER!)

### Fonctionnalités Admin
- Voir toutes les inscriptions
- Statistiques en temps réel
- Export des données (CSV/JSON)
- Filtrage par type d'option

## Sécurité

### Protections Implémentées
- ✅ Validation et sanitisation des entrées
- ✅ Protection CSRF via formulaires
- ✅ Dossier `data/` protégé par `.htaccess`
- ✅ Fichiers sensibles masqués
- ✅ Logs d'erreurs désactivés en production

### Recommandations
- [ ] Changer le mot de passe admin
- [ ] Activer HTTPS/SSL
- [ ] Configurer des sauvegardes régulières
- [ ] Mettre en place un système de limitation de taux
- [ ] Ajouter une authentification à deux facteurs pour l'admin

## Maintenance

### Sauvegardes
Les données sont stockées dans:
- `data/submissions.json` - Format JSON complet
- `data/submissions.csv` - Format CSV pour Excel

**Important**: Sauvegarder régulièrement le dossier `data/`

### Logs
- Erreurs PHP: `/tmp/php_errors.log` (configurable)
- Logs serveur: Vérifier les logs Apache/Nginx

## Support Technique

### Problèmes Courants

1. **Formulaire ne fonctionne pas**
   - Vérifier que PHP est installé et configuré
   - Vérifier les permissions du dossier `data/`
   - Consulter les logs d'erreur

2. **Admin Panel inaccessible**
   - Vérifier que les sessions PHP sont activées
   - S'assurer que le mot de passe est correct
   - Vérifier les logs PHP

3. **Données non sauvegardées**
   - Permissions du dossier `data/` (755 ou 775)
   - Vérifier que le serveur web peut écrire dans ce dossier
   - Consulter `submit-form.php` pour les erreurs

## Structure des Fichiers

```
7ensemble.ch/
├── index.html                      # Page d'accueil
├── 7Ensemble Les 7 Tours.html      # Page des tours
├── 7Ensemble Mission.html          # Page mission
├── style.css                       # Styles CSS centralisés
├── submit-form.php                 # Handler de formulaires
├── admin.php                       # Panel admin
├── .htaccess                       # Configuration Apache
├── .gitignore                      # Fichiers ignorés par Git
├── README.md                       # Ce fichier
└── data/                           # Dossier de données (créé automatiquement)
    ├── submissions.json
    └── submissions.csv
```

## Technologies Utilisées

- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **Backend**: PHP 7.4+
- **Stockage**: JSON & CSV
- **Serveur**: Apache/Nginx

## Licence

© 2025 7 Ensemble. Tous droits réservés.

## Contact

Pour toute question ou support:
- Email: support@7ensemble.ch
- Website: https://7ensemble.ch
