<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('footer_settings', function (Blueprint $table) {
            $table->id();

            // Warna Footer
            $table->string('footer_bg_color')->default('#0B042E');
            $table->string('footer_text_color')->default('rgba(255,255,255,0.9)');
            $table->string('footer_heading_color')->default('#FE9800');
            $table->string('footer_link_color')->default('rgba(255,255,255,0.9)');
            $table->string('footer_link_hover_color')->default('#FE9800');
            $table->string('footer_border_color')->default('rgba(255,255,255,0.1)');

            // Warna Icon
            $table->string('contact_icon_color')->default('#FE9800');
            $table->string('social_icon_color')->default('rgba(255,255,255,0.7)');
            $table->string('social_icon_hover_color')->default('#FE9800');

            // Tombol Lokasi
            $table->string('location_btn_bg_color')->default('transparent');
            $table->string('location_btn_text_color')->default('#FE9800');
            $table->string('location_btn_border_color')->default('#FE9800');

            // Branding
            $table->string('footer_logo')->nullable();
            $table->string('footer_copyright')->nullable();

            // Google Maps
            $table->text('footer_google_maps_iframe')->nullable();
            $table->text('footer_google_maps_link')->nullable();

            $table->timestamps();
        });

        // Seed default settings row
        \Illuminate\Support\Facades\DB::table('footer_settings')->insert([
            'footer_bg_color'           => '#0B042E',
            'footer_text_color'         => 'rgba(255,255,255,0.9)',
            'footer_heading_color'      => '#FE9800',
            'footer_link_color'         => 'rgba(255,255,255,0.9)',
            'footer_link_hover_color'   => '#FE9800',
            'footer_border_color'       => 'rgba(255,255,255,0.1)',
            'contact_icon_color'        => '#FE9800',
            'social_icon_color'         => 'rgba(255,255,255,0.7)',
            'social_icon_hover_color'   => '#FE9800',
            'location_btn_bg_color'     => 'transparent',
            'location_btn_text_color'   => '#FE9800',
            'location_btn_border_color' => '#FE9800',
            'footer_logo'               => null,
            'footer_copyright'          => null,
            'footer_google_maps_iframe' => 'https://www.google.com/maps?q=PT+Aro+Baskara+Esa&ll=-6.2119878,106.8585438&z=15&output=embed',
            'footer_google_maps_link'   => 'https://www.google.com/maps/place/PT+Aro+Baskara+Esa/@-6.2119878,106.8585438',
            'created_at'                => now(),
            'updated_at'                => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_settings');
    }
};
