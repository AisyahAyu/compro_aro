# Logo Dual-Mode Feature Documentation

## Overview
This feature allows the company to have two different logos optimized for different background colors:
- **Light Logo**: Used for light/white backgrounds (navbar, main content areas)
- **Dark Logo**: Used for dark backgrounds (footer, dark sections)

## Implementation Details

### Database Changes
- Added `logo_dark` column to `company_profiles` table
- Migration: `2026_03_16_031608_add_logo_dark_to_company_profiles_table`

### Model Updates
- `CompanyProfile` model includes `logo_dark` in fillable fields
- Supports both regular logo and dark logo storage

### Helper Functions
Located in `app/Helpers/LogoHelper.php`:

#### `getCompanyLogo($companyProfile, $context)`
- Returns appropriate logo based on context ('light' or 'dark')
- For dark context:优先使用 `logo_dark`, fallback to regular logo
- For light context: uses regular logo

#### `getCompanyLogoUrl($companyProfile, $context)`
- Returns full asset URL for the appropriate logo

#### `hasDarkLogo($companyProfile)`
- Checks if company has dark logo configured

### View Implementation
- **Footer**: Uses `getCompanyLogo($companyProfile, 'dark')`
- **Navbar**: Uses `getCompanyLogo($companyProfile, 'light')`
- **Admin Forms**: Added logo_dark upload fields in create/edit forms

### CSS Classes
- `.footer-logo`: Base styling for footer logos
- `.navbar-logo`: Base styling for navbar logos  
- `.logo-light-bg`: Drop shadow for light backgrounds
- `.logo-dark-bg`: Drop shadow for dark backgrounds
- Hover effects with scale and brightness transitions

## Usage Examples

### In Blade Templates
```blade
<!-- Footer (dark background) -->
@if($companyProfile && getCompanyLogo($companyProfile, 'dark'))
    <img src="{{ getCompanyLogoUrl($companyProfile, 'dark') }}" 
         alt="{{ $companyProfile->company_name }}" 
         class="footer-logo logo-dark-bg">
@endif

<!-- Navbar (light background) -->
@if($companyProfile && getCompanyLogo($companyProfile, 'light'))
    <img src="{{ getCompanyLogoUrl($companyProfile, 'light') }}" 
         alt="{{ $companyProfile->company_name }}" 
         class="navbar-logo logo-light-bg">
@endif
```

### In Controller
```php
// The controller automatically handles both logo uploads
// Validation includes both logo and logo_dark fields
// File management handles deletion of old logos
```

## File Structure
```
app/
├── Helpers/
│   └── LogoHelper.php          # Helper functions
├── Models/
│   └── CompanyProfile.php      # Updated model
├── Http/Controllers/Admin/
│   └── CompanyProfileController.php  # Updated controller
└── Providers/
    └── AppServiceProvider.php  # Includes helper functions

database/
└── migrations/
    └── 2026_03_16_031608_add_logo_dark_to_company_profiles_table.php

resources/
├── views/
│   ├── partials/
│   │   ├── footer.blade.php    # Uses dark logo
│   │   └── navbar.blade.php    # Uses light logo
│   ├── admin/company-profiles/
│   │   ├── create.blade.php    # Logo upload form
│   │   └── edit.blade.php      # Logo upload form
│   └── layouts/
│       └── app.blade.php       # CSS styling
```

## Benefits
1. **Better Visibility**: Logos optimized for their background colors
2. **Professional Appearance**: Improved contrast and readability
3. **Flexible**: Fallback system ensures logo always displays
4. **Easy Management**: Admin can upload both versions through same interface
5. **Future-Proof**: Helper functions make it easy to extend to other contexts

## Testing
- Database migration applied successfully
- Helper functions loaded via AppServiceProvider
- Forms validate and handle both logo types
- CSS effects applied correctly
- Fallback system works when dark logo not available

## Future Enhancements
- Could extend to support more contexts (e.g., 'transparent', 'gradient')
- Add logo optimization/compression
- Support for different logo formats (SVG, PNG with transparency)
- Add logo preview in admin panel
