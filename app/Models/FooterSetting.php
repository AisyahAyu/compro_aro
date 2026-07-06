<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    protected $table = 'footer_settings';

    protected $fillable = [
        'footer_bg_color',
        'footer_text_color',
        'footer_heading_color',
        'footer_link_color',
        'footer_link_hover_color',
        'footer_border_color',
        'contact_icon_color',
        'social_icon_color',
        'social_icon_hover_color',
        'location_btn_bg_color',
        'location_btn_text_color',
        'location_btn_border_color',
        'footer_logo',
        'footer_copyright',
        'footer_google_maps_iframe',
        'footer_google_maps_link',
    ];

    /**
     * Default values for footer settings.
     */
    public static function getDefaults(): array
    {
        return [
            'footer_bg_color'          => '#0B042E',
            'footer_text_color'        => 'rgba(255,255,255,0.9)',
            'footer_heading_color'     => '#FE9800',
            'footer_link_color'        => 'rgba(255,255,255,0.9)',
            'footer_link_hover_color'  => '#FE9800',
            'footer_border_color'      => 'rgba(255,255,255,0.1)',
            'contact_icon_color'       => '#FE9800',
            'social_icon_color'        => 'rgba(255,255,255,0.7)',
            'social_icon_hover_color'  => '#FE9800',
            'location_btn_bg_color'    => 'transparent',
            'location_btn_text_color'  => '#FE9800',
            'location_btn_border_color'=> '#FE9800',
            'footer_logo'              => null,
            'footer_copyright'         => null,
            'footer_google_maps_iframe'=> 'https://www.google.com/maps?q=PT+Aro+Baskara+Esa&ll=-6.2119878,106.8585438&z=15&output=embed',
            'footer_google_maps_link'  => 'https://www.google.com/maps/place/PT+Aro+Baskara+Esa/@-6.2119878,106.8585438',
        ];
    }

    /**
     * Get the first record or return an instance with defaults.
     */
    public static function getSettings(): self
    {
        $settings = self::first();
        if (!$settings) {
            $settings = new self(self::getDefaults());
        }
        return $settings;
    }
}
