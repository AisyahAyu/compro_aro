@extends('layouts.admin')

@section('title', 'Tampilan Footer')
@section('page-title', 'Tampilan Footer')
@section('breadcrumb', 'Pengaturan / Tampilan Footer')

@section('content')
<!-- Load Tailwind CSS via CDN with Preflight disabled to prevent style collisions with AdminLTE/Bootstrap -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        corePlugins: {
            preflight: false,
        }
    }
</script>

<div class="row">
    <!-- FORM COLUMN (LEFT) -->
    <div class="col-lg-6 col-md-12 mb-4">
        <div class="card card-primary card-outline shadow-md">
            <div class="card-header bg-white py-3">
                <h3 class="card-title font-semibold text-lg text-gray-800 m-0">
                    <i class="fas fa-palette text-blue-500 mr-2"></i> Pengaturan Warna & Branding Footer
                </h3>
            </div>
            
            <form action="{{ route('admin.footer-settings.update') }}" method="POST" enctype="multipart/form-data" id="footer-settings-form">
                @csrf
                @method('PUT')
                
                <div class="card-body">
                    <!-- SECTION 1: WARNA FOOTER -->
                    <h5 class="text-blue-600 font-bold border-b pb-2 mb-3 text-base">
                        <i class="fas fa-paint-brush mr-2"></i> Warna Footer
                    </h5>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="footer_bg_color" class="text-gray-700 font-medium text-sm mb-1 block">Footer Background Color</label>
                                <div class="input-group">
                                    <input type="text" class="form-control color-input @error('footer_bg_color') is-invalid @enderror" id="footer_bg_color" name="footer_bg_color" value="{{ old('footer_bg_color', $settings->footer_bg_color) }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text p-1 bg-white">
                                            <input type="color" class="color-picker-trigger w-7 h-7 border-0 cursor-pointer" value="{{ Str::startsWith($settings->footer_bg_color, '#') ? $settings->footer_bg_color : '#0B042E' }}">
                                        </span>
                                    </div>
                                </div>
                                @error('footer_bg_color')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="footer_text_color" class="text-gray-700 font-medium text-sm mb-1 block">Footer Text Color</label>
                                <div class="input-group">
                                    <input type="text" class="form-control color-input @error('footer_text_color') is-invalid @enderror" id="footer_text_color" name="footer_text_color" value="{{ old('footer_text_color', $settings->footer_text_color) }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text p-1 bg-white">
                                            <input type="color" class="color-picker-trigger w-7 h-7 border-0 cursor-pointer" value="{{ Str::startsWith($settings->footer_text_color, '#') ? $settings->footer_text_color : '#ffffff' }}">
                                        </span>
                                    </div>
                                </div>
                                @error('footer_text_color')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="footer_heading_color" class="text-gray-700 font-medium text-sm mb-1 block">Footer Heading Color</label>
                                <div class="input-group">
                                    <input type="text" class="form-control color-input @error('footer_heading_color') is-invalid @enderror" id="footer_heading_color" name="footer_heading_color" value="{{ old('footer_heading_color', $settings->footer_heading_color) }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text p-1 bg-white">
                                            <input type="color" class="color-picker-trigger w-7 h-7 border-0 cursor-pointer" value="{{ Str::startsWith($settings->footer_heading_color, '#') ? $settings->footer_heading_color : '#FE9800' }}">
                                        </span>
                                    </div>
                                </div>
                                @error('footer_heading_color')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="footer_border_color" class="text-gray-700 font-medium text-sm mb-1 block">Footer Border Color</label>
                                <div class="input-group">
                                    <input type="text" class="form-control color-input @error('footer_border_color') is-invalid @enderror" id="footer_border_color" name="footer_border_color" value="{{ old('footer_border_color', $settings->footer_border_color) }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text p-1 bg-white">
                                            <input type="color" class="color-picker-trigger w-7 h-7 border-0 cursor-pointer" value="{{ Str::startsWith($settings->footer_border_color, '#') ? $settings->footer_border_color : '#ffffff' }}">
                                        </span>
                                    </div>
                                </div>
                                @error('footer_border_color')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="footer_link_color" class="text-gray-700 font-medium text-sm mb-1 block">Footer Link Color</label>
                                <div class="input-group">
                                    <input type="text" class="form-control color-input @error('footer_link_color') is-invalid @enderror" id="footer_link_color" name="footer_link_color" value="{{ old('footer_link_color', $settings->footer_link_color) }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text p-1 bg-white">
                                            <input type="color" class="color-picker-trigger w-7 h-7 border-0 cursor-pointer" value="{{ Str::startsWith($settings->footer_link_color, '#') ? $settings->footer_link_color : '#ffffff' }}">
                                        </span>
                                    </div>
                                </div>
                                @error('footer_link_color')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="footer_link_hover_color" class="text-gray-700 font-medium text-sm mb-1 block">Footer Link Hover Color</label>
                                <div class="input-group">
                                    <input type="text" class="form-control color-input @error('footer_link_hover_color') is-invalid @enderror" id="footer_link_hover_color" name="footer_link_hover_color" value="{{ old('footer_link_hover_color', $settings->footer_link_hover_color) }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text p-1 bg-white">
                                            <input type="color" class="color-picker-trigger w-7 h-7 border-0 cursor-pointer" value="{{ Str::startsWith($settings->footer_link_hover_color, '#') ? $settings->footer_link_hover_color : '#FE9800' }}">
                                        </span>
                                    </div>
                                </div>
                                @error('footer_link_hover_color')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 2: WARNA ICON -->
                    <h5 class="text-blue-600 font-bold border-b pb-2 mt-4 mb-3 text-base">
                        <i class="fas fa-icons mr-2"></i> Warna Icon
                    </h5>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="contact_icon_color" class="text-gray-700 font-medium text-sm mb-1 block">Contact Icon Color</label>
                                <div class="input-group">
                                    <input type="text" class="form-control color-input @error('contact_icon_color') is-invalid @enderror" id="contact_icon_color" name="contact_icon_color" value="{{ old('contact_icon_color', $settings->contact_icon_color) }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text p-1 bg-white">
                                            <input type="color" class="color-picker-trigger w-7 h-7 border-0 cursor-pointer" value="{{ Str::startsWith($settings->contact_icon_color, '#') ? $settings->contact_icon_color : '#FE9800' }}">
                                        </span>
                                    </div>
                                </div>
                                @error('contact_icon_color')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="social_icon_color" class="text-gray-700 font-medium text-sm mb-1 block">Social Media Icon Color</label>
                                <div class="input-group">
                                    <input type="text" class="form-control color-input @error('social_icon_color') is-invalid @enderror" id="social_icon_color" name="social_icon_color" value="{{ old('social_icon_color', $settings->social_icon_color) }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text p-1 bg-white">
                                            <input type="color" class="color-picker-trigger w-7 h-7 border-0 cursor-pointer" value="{{ Str::startsWith($settings->social_icon_color, '#') ? $settings->social_icon_color : '#ffffff' }}">
                                        </span>
                                    </div>
                                </div>
                                @error('social_icon_color')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="social_icon_hover_color" class="text-gray-700 font-medium text-sm mb-1 block">Social Media Hover Color</label>
                                <div class="input-group">
                                    <input type="text" class="form-control color-input @error('social_icon_hover_color') is-invalid @enderror" id="social_icon_hover_color" name="social_icon_hover_color" value="{{ old('social_icon_hover_color', $settings->social_icon_hover_color) }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text p-1 bg-white">
                                            <input type="color" class="color-picker-trigger w-7 h-7 border-0 cursor-pointer" value="{{ Str::startsWith($settings->social_icon_hover_color, '#') ? $settings->social_icon_hover_color : '#FE9800' }}">
                                        </span>
                                    </div>
                                </div>
                                @error('social_icon_hover_color')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 3: TOMBOL LOKASI -->
                    <h5 class="text-blue-600 font-bold border-b pb-2 mt-4 mb-3 text-base">
                        <i class="fas fa-map-marked-alt mr-2"></i> Tombol Lokasi
                    </h5>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="location_btn_bg_color" class="text-gray-700 font-medium text-sm mb-1 block">Button BG Color</label>
                                <div class="input-group">
                                    <input type="text" class="form-control color-input @error('location_btn_bg_color') is-invalid @enderror" id="location_btn_bg_color" name="location_btn_bg_color" value="{{ old('location_btn_bg_color', $settings->location_btn_bg_color ?? 'transparent') }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text p-1 bg-white">
                                            <input type="color" class="color-picker-trigger w-7 h-7 border-0 cursor-pointer" value="{{ Str::startsWith($settings->location_btn_bg_color, '#') ? $settings->location_btn_bg_color : '#000000' }}">
                                        </span>
                                    </div>
                                </div>
                                @error('location_btn_bg_color')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <small class="text-gray-400 text-xs mt-1 block">Tulis `transparent` untuk latar bening</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="location_btn_text_color" class="text-gray-700 font-medium text-sm mb-1 block">Button Text Color</label>
                                <div class="input-group">
                                    <input type="text" class="form-control color-input @error('location_btn_text_color') is-invalid @enderror" id="location_btn_text_color" name="location_btn_text_color" value="{{ old('location_btn_text_color', $settings->location_btn_text_color) }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text p-1 bg-white">
                                            <input type="color" class="color-picker-trigger w-7 h-7 border-0 cursor-pointer" value="{{ Str::startsWith($settings->location_btn_text_color, '#') ? $settings->location_btn_text_color : '#FE9800' }}">
                                        </span>
                                    </div>
                                </div>
                                @error('location_btn_text_color')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="location_btn_border_color" class="text-gray-700 font-medium text-sm mb-1 block">Button Border Color</label>
                                <div class="input-group">
                                    <input type="text" class="form-control color-input @error('location_btn_border_color') is-invalid @enderror" id="location_btn_border_color" name="location_btn_border_color" value="{{ old('location_btn_border_color', $settings->location_btn_border_color) }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text p-1 bg-white">
                                            <input type="color" class="color-picker-trigger w-7 h-7 border-0 cursor-pointer" value="{{ Str::startsWith($settings->location_btn_border_color, '#') ? $settings->location_btn_border_color : '#FE9800' }}">
                                        </span>
                                    </div>
                                </div>
                                @error('location_btn_border_color')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 4: BRANDING -->
                    <h5 class="text-blue-600 font-bold border-b pb-2 mt-4 mb-3 text-base">
                        <i class="fas fa-copyright mr-2"></i> Branding
                    </h5>
                    
                    <div class="form-group mb-3">
                        <label for="footer_logo" class="text-gray-700 font-medium text-sm mb-1 block">Upload Logo Footer</label>
                        <div class="input-group mb-2">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="footer_logo" name="footer_logo" accept="image/*">
                                <label class="custom-file-label" for="footer_logo">Pilih file logo...</label>
                            </div>
                        </div>
                        @error('footer_logo')
                            <small class="text-danger block mb-2">{{ $message }}</small>
                        @enderror
                        <small class="text-gray-400 text-xs block mb-2">Unggah untuk menimpa logo footer default (Format: PNG, JPG, SVG, WebP. Maks: 2MB)</small>
                        
                        @if($settings->footer_logo)
                            <div class="flex items-center gap-3 bg-gray-50 border p-2 rounded mt-2 max-w-sm" id="logo-status-container">
                                <img src="{{ asset('storage/' . $settings->footer_logo) }}" alt="Logo Footer" class="h-10 object-contain max-w-[120px] bg-[#0b042e] p-1 rounded">
                                <div class="text-xs text-gray-500">Logo kustom aktif</div>
                                <button type="button" class="btn btn-xs btn-danger ml-auto" id="delete-logo-btn">
                                    <i class="fas fa-trash-alt mr-1"></i> Hapus
                                </button>
                                <input type="hidden" name="remove_logo" id="remove_logo" value="0">
                            </div>
                        @else
                            <div class="text-xs text-gray-400 mt-2">Menggunakan Logo Default Perusahaan (Logo Versi Gelap)</div>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="footer_copyright" class="text-gray-700 font-medium text-sm mb-1 block">Footer Copyright Text</label>
                        <input type="text" class="form-control @error('footer_copyright') is-invalid @enderror" id="footer_copyright" name="footer_copyright" value="{{ old('footer_copyright', $settings->footer_copyright) }}" placeholder="Contoh: PT. ARO Baskara Esa. All rights reserved.">
                        @error('footer_copyright')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <small class="text-gray-400 text-xs mt-1 block">Biarkan kosong untuk menggunakan nama perusahaan default</small>
                    </div>

                    <!-- GOOGLE MAPS -->
                    <h5 class="text-blue-600 font-bold border-b pb-2 mt-4 mb-3 text-base">
                        <i class="fas fa-map-marked-alt mr-2"></i> Google Maps
                    </h5>
                    
                    <div class="form-group mb-3">
                        <label for="footer_google_maps_iframe" class="text-gray-700 font-medium text-sm mb-1 block">Google Maps Embed URL (Iframe Src)</label>
                        <textarea class="form-control" id="footer_google_maps_iframe" name="footer_google_maps_iframe" rows="3" placeholder="Masukkan URL iframe saja (bukan seluruh tag iframe) dari Google Maps Sharing">{{ old('footer_google_maps_iframe', $settings->footer_google_maps_iframe) }}</textarea>
                        <small class="text-gray-400 text-xs mt-1 block">Salin tautan dari atribut `src` pada kode embed iframe Google Maps.</small>
                    </div>

                    <div class="form-group mb-3">
                        <label for="footer_google_maps_link" class="text-gray-700 font-medium text-sm mb-1 block">Google Maps Redirect URL (Tombol Buka Lokasi)</label>
                        <input type="url" class="form-control @error('footer_google_maps_link') is-invalid @enderror" id="footer_google_maps_link" name="footer_google_maps_link" value="{{ old('footer_google_maps_link', $settings->footer_google_maps_link) }}" placeholder="https://maps.app.goo.gl/xyz">
                        @error('footer_google_maps_link')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                
                <div class="card-footer bg-gray-50 border-t py-3 flex gap-3">
                    <button type="submit" class="btn btn-primary font-medium px-4 shadow-sm">
                        <i class="fas fa-save mr-2"></i> Simpan Perubahan
                    </button>
                    <button type="button" class="btn btn-default font-medium border text-gray-700" id="reset-btn-trigger">
                        <i class="fas fa-undo mr-2"></i> Reset ke Default
                    </button>
                </div>
            </form>

            <form action="{{ route('admin.footer-settings.reset') }}" method="POST" id="reset-form" class="hidden">
                @csrf
            </form>
        </div>
    </div>

    <!-- LIVE PREVIEW COLUMN (RIGHT) -->
    <div class="col-lg-6 col-md-12">
        <div class="card card-secondary card-outline shadow-md sticky top-4">
            <div class="card-header bg-white py-3">
                <h3 class="card-title font-semibold text-lg text-gray-800 m-0">
                    <i class="fas fa-eye text-green-500 mr-2"></i> Live Footer Preview
                </h3>
            </div>
            
            <div class="card-body p-0 bg-gray-100 overflow-hidden">
                <div class="p-3 bg-light border-b text-xs text-gray-500 flex items-center justify-between">
                    <span><i class="fas fa-info-circle mr-1"></i> Perubahan pada color picker akan langsung terlihat di sini sebelum disimpan.</span>
                    <span class="badge badge-success">Realtime</span>
                </div>
                
                <!-- PREVIEW CONTAINER -->
                <div id="footer-preview-container" class="p-6 transition-all duration-300 min-h-[480px] flex flex-col justify-between" style="
                    background-color: var(--preview-bg) !important;
                    color: var(--preview-text) !important;
                    border-top: 4px solid var(--preview-border) !important;
                    --preview-bg: {{ $settings->footer_bg_color }};
                    --preview-text: {{ $settings->footer_text_color }};
                    --preview-heading: {{ $settings->footer_heading_color }};
                    --preview-link: {{ $settings->footer_link_color }};
                    --preview-link-hover: {{ $settings->footer_link_hover_color }};
                    --preview-border: {{ $settings->footer_border_color }};
                    --preview-contact-icon: {{ $settings->contact_icon_color }};
                    --preview-social-icon: {{ $settings->social_icon_color }};
                    --preview-social-hover: {{ $settings->social_icon_hover_color }};
                    --preview-btn-bg: {{ $settings->location_btn_bg_color }};
                    --preview-btn-text: {{ $settings->location_btn_text_color }};
                    --preview-btn-border: {{ $settings->location_btn_border_color }};
                ">
                    <!-- Dynamic style rules scoped to this container -->
                    <style>
                        #footer-preview-container .preview-heading {
                            color: var(--preview-heading) !important;
                        }
                        #footer-preview-container .preview-link {
                            color: var(--preview-link) !important;
                            text-decoration: none;
                            transition: color 0.2s ease;
                        }
                        #footer-preview-container .preview-link:hover {
                            color: var(--preview-link-hover) !important;
                        }
                        #footer-preview-container .preview-contact-icon {
                            color: var(--preview-contact-icon) !important;
                        }
                        #footer-preview-container .preview-social-icon {
                            color: var(--preview-social-icon) !important;
                            transition: color 0.2s ease;
                        }
                        #footer-preview-container .preview-social-icon:hover {
                            color: var(--preview-social-hover) !important;
                        }
                        #footer-preview-container .preview-btn {
                            background-color: var(--preview-btn-bg) !important;
                            color: var(--preview-btn-text) !important;
                            border: 1px solid var(--preview-btn-border) !important;
                            border-radius: 20px;
                            padding: 6px 16px;
                            font-size: 0.85rem;
                            display: inline-block;
                            transition: all 0.2s ease;
                            text-decoration: none;
                        }
                        #footer-preview-container .preview-btn:hover {
                            background-color: var(--preview-btn-text) !important;
                            color: #ffffff !important;
                        }
                        #footer-preview-container .preview-map-border {
                            border-radius: 10px;
                            overflow: hidden;
                            border: 2px solid var(--preview-border) !important;
                        }
                        #footer-preview-container .preview-divider {
                            border-color: var(--preview-border) !important;
                            opacity: 0.2;
                            margin: 1.5rem 0;
                        }
                    </style>

                    <div class="row text-left">
                        <!-- Column 1: Logo & Deskripsi -->
                        <div class="col-md-6 col-12 mb-4">
                            <div class="mb-3 h-14 flex items-center justify-start">
                                @if($settings->footer_logo)
                                    <img id="preview-logo-img" src="{{ asset('storage/' . $settings->footer_logo) }}" alt="Logo Preview" class="h-10 object-contain max-w-[150px]">
                                    <div id="preview-logo-placeholder" class="hidden font-bold text-lg text-white">LOGO</div>
                                @elseif($companyProfile && getCompanyLogo($companyProfile, 'dark'))
                                    <img id="preview-logo-img" src="{{ getCompanyLogoUrl($companyProfile, 'dark') }}" alt="Logo Preview" class="h-10 object-contain max-w-[150px]">
                                    <div id="preview-logo-placeholder" class="hidden font-bold text-lg text-white">LOGO</div>
                                @else
                                    <div id="preview-logo-placeholder" class="font-bold text-lg text-white">LOGO</div>
                                    <img id="preview-logo-img" src="" alt="Logo Preview" class="hidden h-10 object-contain max-w-[150px]">
                                @endif
                            </div>
                            <p class="text-xs leading-relaxed" style="opacity: 0.9;">
                                PT ARO Baskara Esa berkomitmen menjadi mitra pengadaan yang andal bagi sektor swasta dan instansi pemerintah. Dengan mengutamakan integritas, efisiensi, dan kepatuhan terhadap regulasi.
                            </p>
                        </div>

                        <!-- Column 2: Hubungi Kami -->
                        <div class="col-md-6 col-12 mb-4">
                            <h6 class="preview-heading font-bold text-sm mb-3">Hubungi Kami</h6>
                            <div class="text-xs space-y-2">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-envelope preview-contact-icon w-4 text-center"></i>
                                    <a href="#" class="preview-link">{{ $companyProfile->email ?? 'arobaskara@gmail.com' }}</a>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-phone preview-contact-icon w-4 text-center"></i>
                                    <span style="opacity: 0.9;">{{ $companyProfile->phone ?? '(021) 38835187' }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="fab fa-whatsapp preview-contact-icon w-4 text-center"></i>
                                    <a href="#" class="preview-link">{{ $companyProfile->whatsapp ?? '+62 822-8888-6009' }}</a>
                                </div>
                            </div>
                        </div>

                        <!-- Column 3: Tautan Navigasi -->
                        <div class="col-md-6 col-12 mb-4">
                            <h6 class="preview-heading font-bold text-sm mb-3">Tautan</h6>
                            <ul class="list-none p-0 text-xs space-y-2">
                                <li>
                                    <a href="#" class="preview-link flex items-center">
                                        <i class="fas fa-chevron-right preview-contact-icon mr-2 text-[8px]"></i> Beranda
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="preview-link flex items-center">
                                        <i class="fas fa-chevron-right preview-contact-icon mr-2 text-[8px]"></i> Tentang
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="preview-link flex items-center">
                                        <i class="fas fa-chevron-right preview-contact-icon mr-2 text-[8px]"></i> Produk
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Column 4: Lokasi & Map -->
                        <div class="col-md-6 col-12 mb-4">
                            <h6 class="preview-heading font-bold text-sm mb-2">Lokasi Kami</h6>
                            <a href="{{ $settings->footer_google_maps_link ?? 'javascript:void(0)' }}" target="_blank" class="preview-btn mb-2" id="preview-maps-btn">
                                <i class="fas fa-map-marked-alt mr-2"></i> Buka Lokasi
                            </a>
                            <div class="preview-map-border h-24 w-full bg-gray-300 relative overflow-hidden flex items-center justify-center text-gray-500 font-semibold text-[10px]" id="preview-map-container">
                                <iframe id="preview-map-iframe" src="{{ $settings->footer_google_maps_iframe }}" width="100%" height="100%" style="border:0; {{ !$settings->footer_google_maps_iframe ? 'display:none;' : '' }}" allowfullscreen="" loading="lazy"></iframe>
                                <div id="preview-map-placeholder" class="{{ $settings->footer_google_maps_iframe ? 'hidden' : '' }} absolute inset-0 flex items-center justify-center flex-col bg-gray-200">
                                    <i class="fas fa-map-marked-alt text-2xl opacity-30 mb-1"></i>
                                    <span>Google Maps Embed</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <hr class="preview-divider">

                    <!-- Footer Bottom -->
                    <div class="row align-items-center text-xs">
                        <div class="col-md-6 text-center text-md-left mb-2 mb-md-0">
                            <span id="preview-copyright-text" style="opacity: 0.8;">
                                &copy; {{ date('Y') }} {{ $settings->footer_copyright ?? ($companyProfile->company_name ?? 'PT ARO Baskara Esa') }}.
                            </span>
                        </div>
                        <div class="col-md-6 text-center text-md-right">
                            <div class="flex gap-3 justify-center justify-content-md-end">
                                <a href="#" class="preview-social-icon text-lg"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="preview-social-icon text-lg"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="preview-social-icon text-lg"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="preview-social-icon text-lg"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const previewContainer = document.getElementById('footer-preview-container');
        
        // Color Syncing (Color input syncs to text input, and updates CSS custom properties in live preview)
        const colorMappings = {
            'footer_bg_color': '--preview-bg',
            'footer_text_color': '--preview-text',
            'footer_heading_color': '--preview-heading',
            'footer_link_color': '--preview-link',
            'footer_link_hover_color': '--preview-link-hover',
            'footer_border_color': '--preview-border',
            'contact_icon_color': '--preview-contact-icon',
            'social_icon_color': '--preview-social-icon',
            'social_icon_hover_color': '--preview-social-hover',
            'location_btn_bg_color': '--preview-btn-bg',
            'location_btn_text_color': '--preview-btn-text',
            'location_btn_border_color': '--preview-btn-border'
        };

        // Initialize color synchronizers
        document.querySelectorAll('.color-picker-trigger').forEach(trigger => {
            const inputGroup = trigger.closest('.input-group');
            const textInput = inputGroup.querySelector('.color-input');
            const cssVar = colorMappings[textInput.id];

            // Helper to sync trigger picker color if text input is a valid solid hex
            const syncTriggerColor = () => {
                const val = textInput.value.trim();
                if (/^#[0-9A-F]{6}$/i.test(val)) {
                    trigger.value = val;
                } else if (/^#[0-9A-F]{3}$/i.test(val)) {
                    const expanded = '#' + val[1] + val[1] + val[2] + val[2] + val[3] + val[3];
                    trigger.value = expanded;
                }
            };

            // Set initial trigger state
            syncTriggerColor();

            // When trigger color is picked
            trigger.addEventListener('input', function(e) {
                textInput.value = e.target.value;
                // Update live preview style properties
                previewContainer.style.setProperty(cssVar, e.target.value);
            });

            // When text is typed manually
            textInput.addEventListener('input', function(e) {
                syncTriggerColor();
                // Update live preview style properties
                previewContainer.style.setProperty(cssVar, e.target.value);
            });
        });

        // Branding Logo Preview
        const logoInput = document.getElementById('footer_logo');
        const previewLogoImg = document.getElementById('preview-logo-img');
        const previewLogoPlaceholder = document.getElementById('preview-logo-placeholder');

        if (logoInput) {
            logoInput.addEventListener('change', function(e) {
                // Update filename label in custom file input
                const fileName = e.target.files[0] ? e.target.files[0].name : 'Pilih file logo...';
                const fileLabel = e.target.nextElementSibling;
                if (fileLabel) {
                    fileLabel.textContent = fileName;
                }

                // Show dynamic image preview
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        if (previewLogoImg) {
                            previewLogoImg.src = event.target.result;
                            previewLogoImg.classList.remove('hidden');
                        }
                        if (previewLogoPlaceholder) {
                            previewLogoPlaceholder.classList.add('hidden');
                        }
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // Handle delete logo kustom
        const deleteLogoBtn = document.getElementById('delete-logo-btn');
        const removeLogoInput = document.getElementById('remove_logo');
        const logoContainer = document.getElementById('logo-status-container');
        
        if (deleteLogoBtn && removeLogoInput) {
            deleteLogoBtn.addEventListener('click', function() {
                if (confirm('Apakah Anda yakin ingin menghapus logo kustom ini? Logo default perusahaan akan digunakan kembali.')) {
                    removeLogoInput.value = '1';
                    if (logoContainer) {
                        logoContainer.classList.add('hidden');
                    }
                    
                    // Revert preview to corporate logo (if available)
                    @if($companyProfile && getCompanyLogo($companyProfile, 'dark'))
                        previewLogoImg.src = "{{ getCompanyLogoUrl($companyProfile, 'dark') }}";
                        previewLogoImg.classList.remove('hidden');
                        previewLogoPlaceholder.classList.add('hidden');
                    @else
                        previewLogoImg.classList.add('hidden');
                        previewLogoPlaceholder.classList.remove('hidden');
                    @endif
                }
            });
        }

        // Branding Copyright Preview
        const copyrightInput = document.getElementById('footer_copyright');
        const previewCopyright = document.getElementById('preview-copyright-text');
        const defaultCopyright = "{{ $companyProfile->company_name ?? 'PT ARO Baskara Esa' }}";

        if (copyrightInput && previewCopyright) {
            copyrightInput.addEventListener('input', function(e) {
                const year = new Date().getFullYear();
                const text = e.target.value.trim();
                previewCopyright.textContent = `© ${year} ${text ? text : defaultCopyright}.`;
            });
        }

        // Google Maps Preview
        const mapsLinkInput = document.getElementById('footer_google_maps_link');
        const previewMapsBtn = document.getElementById('preview-maps-btn');
        if (mapsLinkInput && previewMapsBtn) {
            mapsLinkInput.addEventListener('input', function(e) {
                const val = e.target.value.trim();
                previewMapsBtn.href = val ? val : 'javascript:void(0)';
            });
        }

        const mapsIframeInput = document.getElementById('footer_google_maps_iframe');
        const previewMapIframe = document.getElementById('preview-map-iframe');
        const previewMapPlaceholder = document.getElementById('preview-map-placeholder');

        if (mapsIframeInput && previewMapIframe && previewMapPlaceholder) {
            mapsIframeInput.addEventListener('input', function(e) {
                const val = e.target.value.trim();
                if (val) {
                    previewMapIframe.src = val;
                    previewMapIframe.style.display = 'block';
                    previewMapPlaceholder.classList.add('hidden');
                } else {
                    previewMapIframe.style.display = 'none';
                    previewMapPlaceholder.classList.remove('hidden');
                }
            });
        }

        // Form Submit Confirmation
        const form = document.getElementById('footer-settings-form');
        if (form) {
            form.addEventListener('submit', function(e) {
                if (!confirm('Apakah Anda yakin ingin menyimpan perubahan tampilan footer?')) {
                    e.preventDefault();
                }
            });
        }

        // Reset to Default Confirmation
        const resetBtnTrigger = document.getElementById('reset-btn-trigger');
        const resetForm = document.getElementById('reset-form');
        
        if (resetBtnTrigger && resetForm) {
            resetBtnTrigger.addEventListener('click', function(e) {
                if (confirm('Apakah Anda yakin ingin mereset pengaturan warna footer ke default bawaan sistem? Tindakan ini tidak dapat dibatalkan.')) {
                    resetForm.submit();
                }
            });
        }
    });
</script>
@endsection
