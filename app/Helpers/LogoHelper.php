<?php

if (!function_exists('getCompanyLogo')) {
    /**
     * Get appropriate company logo based on background context
     *
     * @param mixed $companyProfile
     * @param string $context 'light' or 'dark'
     * @return string|null
     */
    function getCompanyLogo($companyProfile, $context = 'light')
    {
        if (!$companyProfile) {
            return null;
        }

        // For dark background,优先使用 logo_dark
        if ($context === 'dark') {
            return $companyProfile->logo_dark ?? $companyProfile->logo;
        }

        // For light background, use regular logo
        return $companyProfile->logo;
    }
}

if (!function_exists('getCompanyLogoUrl')) {
    /**
     * Get full URL for company logo based on context
     *
     * @param mixed $companyProfile
     * @param string $context 'light' or 'dark'
     * @return string|null
     */
    function getCompanyLogoUrl($companyProfile, $context = 'light')
    {
        $logo = getCompanyLogo($companyProfile, $context);
        return $logo ? asset($logo) : null;
    }
}

if (!function_exists('hasDarkLogo')) {
    /**
     * Check if company has dark logo configured
     *
     * @param mixed $companyProfile
     * @return bool
     */
    function hasDarkLogo($companyProfile)
    {
        return $companyProfile && !empty($companyProfile->logo_dark);
    }
}
