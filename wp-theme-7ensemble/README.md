# 7 Ensemble WordPress Theme

A complete WordPress theme for the 7 Ensemble financial mutual aid platform with constellation logic, member registration system, and automated email notifications.

## Features

- **Complete Registration System** - AJAX-powered registration with real-time validation
- **Constellation Assignment Logic** - Automatic assignment to incomplete constellations or creation of new ones
- **Custom Post Type** - `sept_member` with comprehensive meta fields
- **Email Notifications** - Welcome emails and constellation completion notifications
- **Admin Dashboard Widget** - Real-time statistics for members and constellations
- **Responsive Design** - Mobile-friendly layout with glassmorphic modal design
- **Animated Constellation Visualization** - Interactive member visualization with orbital animation
- **Security Features** - Nonce verification, data sanitization, and XSS protection

## Installation Instructions

### 1. Upload Theme to WordPress

1. Download or zip the `wp-theme-7ensemble` folder
2. Go to your WordPress admin dashboard
3. Navigate to **Appearance → Themes**
4. Click **Add New** → **Upload Theme**
5. Choose the zip file and click **Install Now**
6. Click **Activate** once installation is complete

### 2. Configure Theme Settings

1. Navigate to **Appearance → Customize**
2. Set up your site title and tagline
3. Upload a logo if desired
4. Configure navigation menus (optional)

### 3. Email Configuration

The theme uses WordPress's built-in `wp_mail()` function. For production use, we recommend:

1. Install an SMTP plugin like **WP Mail SMTP** or **Easy WP SMTP**
2. Configure your SMTP settings for reliable email delivery
3. Update the "From" email in `functions.php` (line 250) to match your domain

```php
'From: 7 Ensemble <noreply@yourdomain.com>',
```

### 4. Test Registration System

1. Visit your homepage
2. Click "Rejoindre la révolution" or any registration button
3. Fill out the registration form
4. Submit and verify:
   - Success message appears
   - Member is created in WordPress admin (7 Ensemble Members)
   - Welcome email is sent
   - Constellation assignment is correct

## File Structure

```
wp-theme-7ensemble/
├── assets/
│   ├── css/              # Additional CSS files (if needed)
│   ├── js/
│   │   └── scripts.js    # AJAX handling and modal functions
│   └── images/           # Theme images (banner.png, 1-7.jpeg)
├── inc/                  # Additional helper functions (optional)
├── template-parts/       # Reusable template parts (optional)
├── functions.php         # All backend logic and functionality
├── header.php            # Header template with navigation
├── footer.php            # Footer template with registration modal
├── index.php             # Main template with all content sections
├── style.css             # Main stylesheet with theme header
└── README.md             # This file
```

## Custom Post Type: sept_member

### Meta Fields

| Meta Key | Description | Type |
|----------|-------------|------|
| `sept_email` | Member email address | String |
| `sept_country` | Member country code | String |
| `sept_payment_method` | Preferred payment method | String |
| `sept_option` | Registration option (three or seven) | String |
| `sept_registration_date` | Registration timestamp | MySQL DateTime |
| `sept_constellation_status` | Status: pending, incomplete, complete | String |
| `sept_is_center` | Whether member is constellation center | Boolean |
| `sept_constellation_members` | Array of member IDs in constellation | Array |
| `sept_constellation_center` | ID of constellation center member | Integer |
| `sept_constellation_completed_date` | Completion timestamp | MySQL DateTime |

## How the Constellation Logic Works

### New Member Registration

1. User submits registration form via AJAX
2. System validates all fields and checks for duplicate email
3. Creates new `sept_member` post with user data
4. Calls constellation assignment function

### Constellation Assignment

**Case 1: Incomplete Constellation Exists**
- Finds oldest incomplete constellation for the selected option (3 or 7)
- Adds member to existing constellation
- Updates member count
- If constellation reaches max members, marks as complete and sends notification

**Case 2: No Incomplete Constellation**
- Makes new member the center of a new constellation
- Sets status to "pending"
- Waits for other members to join

### Constellation Status Flow

```
PENDING → INCOMPLETE → COMPLETE
   ↓           ↓            ↓
(Center    (1-6/2        (Full
 created)  members)    constellation)
```

## AJAX Endpoints

### Registration: `sept_register`

**Request Parameters:**
```javascript
{
  action: 'sept_register',
  nonce: 'wp_nonce_value',
  fullName: 'John Doe',
  email: 'john@example.com',
  country: 'FR',
  paymentMethod: 'card',
  optionType: 'seven'
}
```

**Response (Success):**
```json
{
  "success": true,
  "data": {
    "message": "Registration successful!",
    "member_id": 123,
    "constellation_status": "incomplete"
  }
}
```

**Response (Error):**
```json
{
  "success": false,
  "data": {
    "message": "This email is already registered."
  }
}
```

## Email Templates

### Welcome Email
Sent immediately upon registration with:
- Welcome message
- Target amount based on option
- Constellation status
- Next steps

### Constellation Complete Email
Sent when constellation reaches full capacity with:
- Congratulations message
- Member count
- Next steps for receiving gains

## Admin Dashboard Widget

The dashboard widget displays:
- Total registered members
- Number of complete constellations
- Number of incomplete constellations
- Recent registrations (last 7 days)

## Security Features

### Input Validation & Sanitization
- `sanitize_text_field()` for text inputs
- `sanitize_email()` for email addresses
- Email format validation with `is_email()`
- Required field validation

### Nonce Verification
All AJAX requests require a valid nonce:
```javascript
nonce: septEnsemble.nonce
```

### XSS Protection
All output is escaped with:
- `esc_html()` for general text
- `esc_attr()` for HTML attributes
- `esc_url()` for URLs

### SQL Injection Prevention
Uses WordPress's built-in functions:
- `wp_insert_post()` for creating posts
- `update_post_meta()` for meta data
- `WP_Query` with proper sanitization

## Customization

### Changing Target Amounts

Edit in `index.php` and `functions.php`:
```php
$target_amount = ($option === 'seven') ? '1,575,747€' : '7,789€';
```

### Modifying Email Content

Edit email templates in `functions.php`:
- `sept_send_welcome_email()` - Line 243
- `sept_send_constellation_complete_email()` - Line 299

### Adding More Countries

Edit the country dropdown in `footer.php`:
```html
<option value="NEW_CODE">New Country</option>
```

### Customizing Colors

Main colors are defined in `style.css`:
```css
/* Primary gradient */
background: linear-gradient(45deg, #667eea, #764ba2);

/* Accent colors */
color: #4ecdc4; /* Teal */
color: #ff6b6b; /* Red */
color: #f093fb; /* Pink */
```

## Troubleshooting

### Emails Not Sending
1. Install and configure an SMTP plugin
2. Check your server's email configuration
3. Verify the "From" email address matches your domain
4. Check spam folders

### AJAX Not Working
1. Verify jQuery is loaded
2. Check browser console for JavaScript errors
3. Ensure nonce is being generated correctly
4. Verify AJAX URL is correct

### Constellation Logic Issues
1. Check that members are being saved with correct meta data
2. Verify `sept_is_center` meta is set for center members
3. Check WP_Query arguments in constellation assignment

### Images Not Displaying
1. Verify images exist in `assets/images/` folder
2. Check file names match (1.jpeg through 7.jpeg, banner.png)
3. Verify correct file permissions (644 for files)

## Support & Development

### WordPress Requirements
- WordPress 5.0 or higher
- PHP 7.4 or higher
- MySQL 5.6 or higher

### Browser Support
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

### Translation Ready
The theme is translation-ready with text domain `7ensemble`. To translate:
1. Use a plugin like Loco Translate
2. Generate .po/.mo files for your language
3. Place in `/languages/` folder

## Code Comments

All code is commented in English for clarity:
- Function descriptions
- Parameter documentation
- Logic explanations
- Security notes

## WordPress Coding Standards

This theme follows:
- WordPress PHP Coding Standards
- WordPress JavaScript Coding Standards
- WordPress CSS Coding Standards
- Security best practices

## Credits

Developed for 7 Ensemble - Financial Mutual Aid Platform
Theme Version: 1.0.0
License: GNU General Public License v2 or later

## Changelog

### Version 1.0.0 (2024-12-23)
- Initial release
- Complete registration system
- Constellation assignment logic
- Email notification system
- Admin dashboard widget
- Responsive design
- AJAX form submission
- Security features

## Future Enhancements

Possible additions for future versions:
- Member login portal
- Constellation status tracking page
- Payment integration
- Multi-language support
- Advanced analytics dashboard
- Member referral system
- Downloadable certificates
