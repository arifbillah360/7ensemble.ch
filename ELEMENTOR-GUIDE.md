# 7 Ensemble Elementor Integration Guide

Complete guide for using the 7 Ensemble theme with Elementor Page Builder.

## Table of Contents

1. [Installation](#installation)
2. [Elementor Widgets Overview](#elementor-widgets-overview)
3. [Widget Usage Guide](#widget-usage-guide)
4. [AJAX Form Integration](#ajax-form-integration)
5. [Header/Footer Builder](#headerfooter-builder)
6. [Troubleshooting](#troubleshooting)
7. [Advanced Customization](#advanced-customization)

---

## Installation

### Prerequisites

- **WordPress**: 6.0 or higher
- **PHP**: 7.4 or higher
- **Elementor Free**: 3.0 or higher (required)
- **Elementor Pro**: 3.0 or higher (optional, for Header/Footer builder)

### Step 1: Install Elementor

1. Go to **Plugins → Add New**
2. Search for "Elementor"
3. Install and activate **Elementor Page Builder**
4. (Optional) Install **Elementor Pro** for Header/Footer builder

### Step 2: Activate 7 Ensemble Theme

1. Upload the `wp-theme-7ensemble` folder to `/wp-content/themes/`
2. Go to **Appearance → Themes**
3. Activate **7 Ensemble**

### Step 3: Verify Elementor Integration

1. Go to **Pages → Add New**
2. Click "Edit with Elementor"
3. In the left panel, look for the **"7 Ensemble"** widget category
4. You should see 6 custom widgets:
   - 7 Ensemble Hero
   - 7 Ensemble Constellation
   - 7 Ensemble Principe
   - 7 Ensemble Tours
   - 7 Ensemble Registration Form
   - 7 Ensemble Stats

---

## Elementor Widgets Overview

### 1. **7 Ensemble Hero**
**Icon**: Post Title
**Purpose**: Main hero section with title, transformation amount, and CTA buttons

**Features**:
- Fully editable title, subtitle, and tagline
- Customizable transformation amount
- Gradient color controls for amount text
- Two CTA buttons (3 persons / 7 persons)
- Typography controls
- Responsive padding

**Use Case**: Homepage header, landing page hero sections

---

### 2. **7 Ensemble Constellation**
**Icon**: Globe
**Purpose**: Animated constellation visualization with member images

**Features**:
- Upload custom images for all 7 members via Elementor media library
- Editable center text ("VOUS")
- Customizable title and descriptions
- Gradient controls for center circle
- Animation speed control (1-30 seconds)
- Toggle animation on/off
- Background color customization

**Use Case**: Explaining the network concept, showing member connections

**Image Requirements**:
- Format: JPG, PNG
- Recommended size: 300x300px (square)
- All 7 member images can be uploaded individually

---

### 3. **7 Ensemble Principe**
**Icon**: Info Circle
**Purpose**: Three-card explanation of the principle (Help, Receive, Keep)

**Features**:
- 3 customizable cards
- Icon/emoji per card
- Editable titles, amounts, and descriptions
- Color controls for amounts
- Responsive grid layout

**Use Case**: Explaining how the system works, benefits overview

---

### 4. **7 Ensemble Tours**
**Icon**: Post List
**Purpose**: Display the 7 tour levels with amounts and descriptions

**Features**:
- 7 tour items with individual controls
- Custom title per tour
- Custom amount per tour
- Custom description per tour
- Automatic numbering (1-7)
- Alternating timeline layout

**Use Case**: Showing the progression path, explaining tour levels

---

### 5. **7 Ensemble Registration Form** (CRITICAL)
**Icon**: Form Horizontal
**Purpose**: AJAX-powered registration form with constellation integration

**Features**:
- **Two display modes**:
  - Inline (visible on page)
  - Modal (popup trigger)
- Fully functional AJAX submission
- No page reload
- Real-time validation
- Duplicate email checking
- Constellation assignment
- Email notifications
- Customizable labels for all fields
- Gradient button colors
- Success/error messages

**Display Modes**:
1. **Inline Mode**: Form is always visible on the page
2. **Modal Mode**: Shows a button, form appears in popup when clicked

**Security**:
- Nonce verification
- Input sanitization
- XSS protection
- All security from original theme maintained

**Use Case**: Member registration, lead capture, constellation signup

---

### 6. **7 Ensemble Stats**
**Icon**: Counter
**Purpose**: Display statistics with large numbers and descriptions

**Features**:
- 3 customizable stat items
- Number, label, and description per item
- Responsive grid layout

**Use Case**: Showing success metrics, key numbers, urgency stats

---

## Widget Usage Guide

### Adding Widgets to Your Page

1. **Create/Edit a Page**:
   - Go to **Pages → Add New** or edit an existing page
   - Click **Edit with Elementor**

2. **Find 7 Ensemble Widgets**:
   - In the left panel, scroll down to find **"7 Ensemble"** category
   - Or use the search bar and type "7ensemble"

3. **Drag & Drop**:
   - Drag any widget onto your page
   - All widgets work in any Elementor section/column

### Editing Widget Content

1. **Click the widget** on the page
2. **Left panel opens** with all controls
3. **Content Tab**: Edit text, images, links
4. **Style Tab**: Customize colors, typography, spacing
5. **Advanced Tab**: Custom CSS, animations, visibility

### Live Preview

All 7 Ensemble widgets have **live preview** in the Elementor editor. Changes appear instantly as you type.

---

## AJAX Form Integration

### How It Works

The Registration Form widget maintains full AJAX functionality within Elementor:

1. **User fills form** → Click submit
2. **JavaScript validates** → Checks all required fields
3. **AJAX request sent** → To WordPress backend
4. **Backend processes**:
   - Validates email
   - Checks for duplicates
   - Creates member post
   - Assigns to constellation
   - Sends welcome email
5. **Response returned** → Success/error message
6. **Form resets** → Ready for next user

### Form Configuration

**Inline Mode**:
```
Display Mode: Inline (Visible)
```
- Form is always visible
- Good for dedicated registration pages
- No extra clicks needed

**Modal Mode**:
```
Display Mode: Modal (Popup)
- Trigger Button Text: "Rejoindre la révolution"
```
- Form appears in popup
- Good for adding registration to any page
- Cleaner page layout

### Testing the Form

1. Add Registration Form widget to a page
2. Publish the page
3. Visit the page as a visitor
4. Fill out the form:
   - Enter unique email
   - Select country
   - Choose payment method
   - Accept terms
   - Select option (3 or 7 persons)
5. Click submit
6. Verify:
   - Success message appears
   - Check WordPress admin for new member
   - Check email inbox for welcome email

### Form Fields

| Field | Type | Required | Validation |
|-------|------|----------|------------|
| Full Name | Text | Yes | Sanitized |
| Email | Email | Yes | Format + Duplicate check |
| Country | Select | Yes | Predefined list |
| Payment Method | Select | Yes | Predefined options |
| Accept Terms | Checkbox | Yes | Must be checked |
| Option (3/7) | Radio | Yes | One must be selected |

---

## Header/Footer Builder

### With Elementor Pro

If you have **Elementor Pro**, you can replace the default header and footer with custom Elementor designs.

#### Create Custom Header

1. Go to **Templates → Theme Builder → Header**
2. Click **Add New**
3. Design your header using Elementor
4. Set display conditions (e.g., Entire Site)
5. **Publish**

The theme automatically detects Elementor Pro headers and hides the default header.

#### Create Custom Footer

1. Go to **Templates → Theme Builder → Footer**
2. Click **Add New**
3. Design your footer
4. Set display conditions
5. **Publish**

The theme automatically detects Elementor Pro footers and hides the default footer (including the modal).

**Important**: If using custom footer, add the **7 Ensemble Registration Form** widget to your footer template to maintain registration functionality.

### Without Elementor Pro

The default header and footer will be used automatically. The registration modal is included in the footer by default.

---

## Troubleshooting

### Issue: Widgets Not Appearing

**Solution**:
1. Deactivate and reactivate the theme
2. Clear Elementor cache: **Elementor → Tools → Regenerate CSS**
3. Clear browser cache
4. Verify Elementor is activated

### Issue: AJAX Form Not Working

**Solution**:
1. Check browser console for JavaScript errors (F12)
2. Verify jQuery is loaded
3. Check that `septEnsemble` object exists:
   - Open browser console
   - Type: `console.log(septEnsemble)`
   - Should show: `{ajax_url: "...", nonce: "..."}`
4. Verify SMTP is configured for emails

### Issue: Images Not Loading in Constellation

**Solution**:
1. Re-upload images via Elementor media library
2. Verify image files exist in `/assets/images/`
3. Check file permissions (should be 644)
4. Clear Elementor cache

### Issue: Styles Not Applying

**Solution**:
1. **Elementor → Tools → Regenerate CSS**
2. Clear browser cache
3. Check if `elementor-frontend.css` is loading:
   - View page source
   - Search for "elementor-frontend.css"
4. Verify file exists at: `/assets/css/elementor-frontend.css`

### Issue: Animation Not Working

**Solution**:
1. Check if "Enable Orbit Animation" is set to "Yes"
2. Verify animation speed is set (default: 8 seconds)
3. Check if `prefers-reduced-motion` is enabled in browser settings
4. Clear Elementor cache

---

## Advanced Customization

### Custom CSS for Widgets

Add custom CSS to any widget:

1. Click widget → **Advanced Tab**
2. Scroll to **Custom CSS**
3. Add your styles:

```css
selector {
    background: #your-color;
    padding: 20px;
}
```

### Modifying Widget Defaults

Edit widget files in `/elementor-widgets/`:
- `hero-widget.php` - Hero section
- `constellation-widget.php` - Constellation
- `principe-widget.php` - Principe cards
- `tours-widget.php` - Tour levels
- `registration-form-widget.php` - Registration form
- `stats-widget.php` - Statistics

### Adding New Widgets

1. Create new file in `/elementor-widgets/your-widget.php`
2. Follow existing widget structure
3. Register in `functions.php`:

```php
require_once get_template_directory() . '/elementor-widgets/your-widget.php';
$widgets_manager->register(new \Your_Widget_Class());
```

### Custom Animations

Modify `/assets/js/elementor-frontend.js` to add custom animations or interactions.

### Custom Styles

Add global styles in `/assets/css/elementor-frontend.css`.

---

## Best Practices

### Performance

1. **Optimize Images**: Use compressed images (TinyPNG, ShortPixel)
2. **Limit Widgets**: Don't use too many widgets on one page
3. **Cache**: Use a caching plugin (WP Rocket, W3 Total Cache)
4. **CDN**: Use a CDN for faster image loading

### Design

1. **Consistency**: Use the same colors and fonts throughout
2. **Spacing**: Maintain consistent spacing between sections
3. **Mobile**: Always preview on mobile before publishing
4. **Loading**: Use placeholder images while actual images load

### Security

1. **Keep Updated**: Update WordPress, Elementor, and theme regularly
2. **Backup**: Regular backups before major changes
3. **SSL**: Use HTTPS for secure form submissions
4. **SMTP**: Configure proper SMTP for reliable emails

### Testing

Before going live:
1. Test all widgets on desktop, tablet, mobile
2. Test form submission with different data
3. Verify emails are sent and received
4. Check member data in WordPress admin
5. Test with different browsers (Chrome, Firefox, Safari)

---

## Widget Control Reference

### Typography Controls

Available for most text elements:
- **Family**: Choose font
- **Size**: Adjust font size (px, em, rem, %)
- **Weight**: Font weight (100-900)
- **Transform**: UPPERCASE, lowercase, Capitalize
- **Style**: Normal, Italic
- **Decoration**: None, Underline, Overline, Line Through
- **Line Height**: Spacing between lines
- **Letter Spacing**: Spacing between letters

### Color Controls

- **Solid**: Single color picker
- **Gradient**: Two-color gradient (available for some elements)
- **Alpha**: Transparency control (0-1)

### Spacing Controls

- **Padding**: Inner spacing (Top, Right, Bottom, Left)
- **Margin**: Outer spacing (Top, Right, Bottom, Left)
- **Units**: px, %, em, rem, vw, vh

### Responsive Controls

Most spacing and typography controls have responsive options:
- **Desktop**: Default view (> 1024px)
- **Tablet**: Medium screens (768px - 1024px)
- **Mobile**: Small screens (< 768px)

Click the device icon next to a control to set different values per device.

---

## FAQ

**Q: Can I use these widgets with other page builders?**
A: No, these are Elementor-specific widgets.

**Q: Do I need Elementor Pro?**
A: No, but Elementor Pro is recommended for Header/Footer builder functionality.

**Q: Can I export my Elementor designs?**
A: Yes, use Elementor → Tools → Export Template.

**Q: Will AJAX work in Elementor preview?**
A: The form will display but won't submit in the editor. Test on the actual page.

**Q: Can I change the constellation images?**
A: Yes! Each member image can be uploaded via Elementor media library.

**Q: How do I add more than 3 stat items?**
A: Edit `stats-widget.php` and add more controls in the loop.

**Q: Can I translate the widgets?**
A: Yes, all text uses the `7ensemble` text domain for translations.

**Q: How do I style the form validation messages?**
A: Use custom CSS in the widget's Advanced → Custom CSS section.

---

## Support & Resources

### Documentation
- **WordPress Codex**: https://codex.wordpress.org/
- **Elementor Documentation**: https://elementor.com/help/
- **Theme README**: See `README.md` in theme folder

### Helpful Links
- Elementor Community: https://www.facebook.com/groups/Elementors/
- WordPress Support: https://wordpress.org/support/
- Elementor Academy: https://elementor.com/academy/

### Version Compatibility

| Component | Minimum Version | Tested Up To |
|-----------|----------------|--------------|
| WordPress | 6.0 | 6.4 |
| Elementor | 3.0 | 3.18 |
| Elementor Pro | 3.0 | 3.18 |
| PHP | 7.4 | 8.2 |

---

## Changelog

### Version 1.0.0
- Initial Elementor integration
- 6 custom widgets
- Full AJAX support
- Header/Footer builder compatibility
- Live preview in editor
- Responsive controls
- Image upload support
- Custom animations

---

**🎉 You're all set! Start building beautiful pages with 7 Ensemble and Elementor.**

For questions or issues, check the [Troubleshooting](#troubleshooting) section first.
