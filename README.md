# 7 Ensemble WordPress Theme

A complete, production-ready WordPress theme for the 7 Ensemble financial mutual aid platform with full Elementor integration, constellation logic, AJAX registration system, and automated email notifications.

![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)
![WordPress](https://img.shields.io/badge/WordPress-6.0+-green.svg)
![PHP](https://img.shields.io/badge/PHP-7.4+-purple.svg)
![Elementor](https://img.shields.io/badge/Elementor-3.0+-pink.svg)

---

## 🎯 Overview

7 Ensemble is a revolutionary mutual aid platform where members help each other financially through a constellation system. Starting with just 21€, participants can potentially reach up to 1,575,747€ through the 7-person option, or 7,789€ through the 3-person option.

This theme provides a complete solution with:
- ✅ **Full WordPress Theme** - Professional, production-ready
- ✅ **Elementor Integration** - 6 custom drag-and-drop widgets
- ✅ **AJAX Registration** - Real-time form submission without page reload
- ✅ **Constellation Logic** - Automatic member assignment and tracking
- ✅ **Email Notifications** - Welcome emails and completion alerts
- ✅ **Admin Dashboard** - Real-time statistics and member management
- ✅ **Security** - Nonce verification, sanitization, XSS protection
- ✅ **Responsive Design** - Works on all devices

---

## 📦 Features

### Core Functionality

- **AJAX Registration System** - No page reload, instant feedback
- **Constellation Assignment** - Automatic assignment to incomplete constellations
- **Custom Post Type** (`sept_member`) - Comprehensive meta fields
- **Email Notifications** - Welcome emails and constellation completion alerts
- **Admin Dashboard Widget** - Real-time statistics
- **Animated Constellation** - Interactive member visualization
- **Two Options** - 3-person (7,789€) or 7-person (1,575,747€)

### Elementor Integration

- **6 Custom Widgets**:
  1. **Hero** - Main header with CTAs
  2. **Constellation** - Animated member visualization with image uploads
  3. **Principe** - Three-card explanation
  4. **Tours** - 7-level progression display
  5. **Registration Form** - Full AJAX functionality in Elementor
  6. **Stats** - Statistics display
- **Live Preview** - See changes instantly in Elementor editor
- **Drag & Drop** - Easy page building
- **Header/Footer Builder** - Full Elementor Pro support
- **Customizable** - All colors, text, images editable

---

## 🚀 Quick Start

### Installation (5 Minutes)

1. **Clone or Download Repository**:
   ```bash
   git clone https://github.com/arifbillah360/7ensemble.ch.git
   cd 7ensemble.ch
   ```

2. **Install in WordPress**:
   - Zip the entire directory OR
   - Upload directly to `/wp-content/themes/7ensemble/`

3. **Activate Theme**:
   - WordPress Admin → Appearance → Themes
   - Click **Activate** on "7 Ensemble"

4. **Install Elementor** (Recommended):
   - Plugins → Add New → Search "Elementor"
   - Install & Activate

5. **Test**:
   - Visit your site
   - Click "Rejoindre la révolution"
   - Fill out and submit the form
   - Check WordPress admin for new member!

---

## 📁 Repository Structure

**This repository IS the WordPress theme.** After cloning, you can install it directly into WordPress.

```
7ensemble/ (repository root = WordPress theme)
├── assets/
│   ├── css/              # Stylesheets
│   ├── js/               # JavaScript files
│   └── images/           # Theme images
├── elementor-widgets/    # Custom Elementor widgets
├── functions.php         # Theme functionality
├── header.php            # Header template
├── footer.php            # Footer template
├── index.php             # Main template
├── style.css             # Theme stylesheet
├── ELEMENTOR-GUIDE.md    # Complete Elementor documentation
└── README.md             # This file
```

---

## 🎨 Using with Elementor

### Quick Start

1. Create page → Edit with Elementor
2. Find "7 Ensemble" category in widgets
3. Drag widgets onto page
4. Customize and publish!

### Available Widgets

| Widget | Purpose | Key Features |
|--------|---------|--------------|
| **Hero** | Main header | Editable title, amount, CTAs |
| **Constellation** | Network visual | Upload 7 member images, animations |
| **Principe** | Explanation cards | 3 cards with icons, amounts |
| **Tours** | 7 levels | Individual control per tour |
| **Registration Form** | Signup | AJAX, inline or modal, full security |
| **Stats** | Statistics | 3 customizable stats |

**📘 See [`ELEMENTOR-GUIDE.md`](ELEMENTOR-GUIDE.md) for complete documentation.**

---

## ⚙️ Constellation Logic

### How It Works

1. User registers → AJAX form submission
2. Backend validates all fields
3. Member post created
4. Constellation assignment:
   - If incomplete exists → Add member
   - If none exists → Make center of new constellation
5. Status updated (pending/incomplete/complete)
6. Email notifications sent

---

## 🔒 Security

- ✅ Nonce verification
- ✅ Input sanitization
- ✅ Output escaping
- ✅ Email validation
- ✅ XSS protection
- ✅ SQL injection prevention

---

## 📧 Email System

- **Welcome Email** - Sent on registration
- **Completion Email** - Sent when constellation is full
- **SMTP Required** - Configure via plugin for production

---

## 📊 Admin Dashboard

- View all members: **7 Ensemble Members** menu
- Dashboard widget with real-time stats
- Member details with constellation info
- Registration tracking

---

## 🛠️ Requirements

- **WordPress**: 6.0+
- **PHP**: 7.4+
- **Elementor**: 3.0+ (optional but recommended)
- **Elementor Pro**: 3.0+ (optional, for Header/Footer builder)

---

## 🐛 Troubleshooting

**Widgets not showing?**
- Regenerate CSS: Elementor → Tools → Regenerate CSS

**AJAX not working?**
- Check console (F12) for errors
- Verify SMTP is configured

**Emails not sending?**
- Install SMTP plugin
- Configure settings

**Full troubleshooting in [`ELEMENTOR-GUIDE.md`](ELEMENTOR-GUIDE.md)**

---

## 📚 Documentation

- **README.md** - This file (overview)
- **ELEMENTOR-GUIDE.md** - Complete Elementor guide
  - Widget usage
  - Customization
  - Troubleshooting
  - Best practices

---

## 📄 License

GNU General Public License v2 or later

---

## 🎉 Ready to Launch!

This theme is production-ready. Install, configure SMTP, and start accepting registrations!

For detailed Elementor usage and advanced features, see **[ELEMENTOR-GUIDE.md](ELEMENTOR-GUIDE.md)**.
