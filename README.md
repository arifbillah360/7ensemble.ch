# 7 Ensemble - Site Web

Site web officiel pour 7 Ensemble - Plateforme d'entraide révolutionnaire.

## 🎯 What I Built

This is a **complete, fully functional website** for the 7 Ensemble mutual aid platform. Here's what was created from scratch:

### ✨ What This Project Does
7 Ensemble is a mutual aid platform where members help each other financially through a constellation system. Starting with just 21€, participants can potentially reach up to 1,575,747€ through the 7-person option, or 7,789€ through the 3-person option.

### 📦 Complete Package Includes:

**Frontend (What Visitors See):**
- 🏠 **Beautiful Homepage** with animations and interactive elements
- 📊 **Detailed Tours Page** showing exactly how the system works
- 💝 **Mission Page** explaining the revolutionary vision
- 📱 **Fully Responsive** - works on phones, tablets, and desktops
- ✨ **Modern Animations** - floating confetti, starry backgrounds, smooth transitions
- 🎨 **Centralized CSS** - all styles in one file for easy customization

**Backend (The Engine):**
- 📝 **Functional Registration Forms** - actually saves data!
- 💾 **PHP Backend** - processes and stores all submissions
- 🔒 **Secure Data Storage** - JSON and CSV formats
- 👨‍💼 **Admin Panel** - password-protected dashboard to view all registrations
- 📊 **Real-time Statistics** - see totals, 7-person vs 3-person options
- 📥 **Data Export** - download submissions as CSV or JSON files

**Security & Configuration:**
- 🛡️ **Security Measures** - input validation, data sanitization, protected directories
- 🔐 **Admin Authentication** - password-protected admin area
- 📋 **Complete Documentation** - setup guide, troubleshooting, and more
- ⚙️ **Apache Configuration** - .htaccess for security
- 🚫 **Git Ignore** - keeps sensitive data out of version control

### 🎨 Key Features Built:

1. **Interactive Constellation Visual** - Animated diagram showing how members connect
2. **Two Registration Options** - 3-person (beginner) and 7-person (advanced)
3. **Modal Popup Forms** - Beautiful overlays for registration
4. **Live Form Validation** - Checks data before submission
5. **Success Messages** - Confirmation when registration completes
6. **Admin Dashboard** - View, filter, and export all registrations
7. **Responsive Navigation** - Works across all pages seamlessly

### 📁 Files Created:

| File | Purpose |
|------|---------|
| `index.html` | Main homepage with forms |
| `7Ensemble Les 7 Tours.html` | Detailed tour breakdown |
| `7Ensemble Mission.html` | Mission and vision page |
| `css/style.css` | All website styling (centralized) |
| `templates/submit-form.php` | Backend form processor |
| `templates/admin.php` | Admin dashboard |
| `.htaccess` | Security configuration |
| `.gitignore` | Version control exclusions |
| `README.md` | This documentation file |

### 🚀 Ready to Deploy!
This website is **production-ready** and can be deployed to any web hosting that supports PHP. Just:
1. Upload files to your server
2. Create the `data/` folder
3. Change the admin password
4. Start accepting registrations!

---

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
   - Consulter `templates/submit-form.php` pour les erreurs

## Structure des Fichiers

```
7ensemble.ch/
├── index.html                      # Page d'accueil
├── 7Ensemble Les 7 Tours.html      # Page des tours
├── 7Ensemble Mission.html          # Page mission
├── .htaccess                       # Configuration Apache
├── .gitignore                      # Fichiers ignorés par Git
├── README.md                       # Ce fichier
├── css/                            # Dossier des styles
│   └── style.css                   # Styles CSS centralisés
├── images/                         # Dossier des images
│   └── README.md                   # Guide des images
├── templates/                      # Dossier des templates PHP
│   ├── submit-form.php             # Handler de formulaires
│   └── admin.php                   # Panel admin
└── data/                           # Dossier de données (créé automatiquement)
    ├── submissions.json            # Données JSON
    └── submissions.csv             # Données CSV
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
