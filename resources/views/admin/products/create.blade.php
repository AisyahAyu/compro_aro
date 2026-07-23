@extends('layouts.admin')

@section('page-title', 'Tambah Produk')
@section('breadcrumb', 'Tambah Produk')

@section('content')
<div class="container pb-5">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Produk Baru</h3>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required placeholder="Masukkan nama produk">
                        </div>

                        <div class="form-group">
                            <label for="category_id">Kategori (Solusi)</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="brand_id">Merek (Brand)</label>
                            <select name="brand_id" id="brand_id" class="form-control mb-2">
                                <option value="">-- Pilih Merek --</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-muted">Atau isi nama merek manual di bawah jika tidak ada di pilihan:</small>
                            <input type="text" name="brand_name" class="form-control mt-1" value="{{ old('brand_name') }}" placeholder="Masukkan nama merek manual">
                        </div>

                        <div class="form-group">
                            <label for="type">Tipe Produk</label>
                            <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}" placeholder="Contoh: Meja Kantor, Kursi Kerja">
                        </div>

                        <div class="form-group">
                            <label for="sku">SKU</label>
                            <input type="text" name="sku" id="sku" class="form-control" value="{{ old('sku') }}" placeholder="Contoh: SKU-10023">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Upload Gambar Produk <span class="text-danger">*</span></label>
                            <input type="file" name="image" id="image" class="form-control-file" required>
                            <small class="text-muted d-block mt-1">Format: jpeg, png, jpg, gif, webp. Ukuran maks: 2MB.</small>
                        </div>

                        <div class="form-group">
                            <label for="dimensions">Dimensi</label>
                            <input type="text" name="dimensions" id="dimensions" class="form-control" value="{{ old('dimensions') }}" placeholder="Contoh: 120 x 60 x 75 cm">
                        </div>

                        <div class="form-group">
                            <label for="country_of_origin">Asal Negara</label>
                            <input type="text" name="country_of_origin" id="country_of_origin" class="form-control" value="{{ old('country_of_origin') }}" placeholder="Contoh: Indonesia, Jepang">
                        </div>

                        <div class="form-group">
                            <label for="specification">Spesifikasi</label>
                            <textarea name="specification" id="specification" class="form-control" rows="4" placeholder="Detail spesifikasi produk...">{{ old('specification') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

                <!-- Variant Groups Section (Shopee style) -->
                <hr>
                <h4 class="mb-3">Informasi Penjualan (Varian)</h4>
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="has_variants" name="has_variants" value="1">
                        <label class="custom-control-label" for="has_variants">Aktifkan Varian untuk produk ini</label>
                    </div>
                </div>

                <div id="variant_ui_container" style="display: none;">
                    <div id="variant_groups_wrapper">
                        <!-- Group blocks appended by JS -->
                    </div>
                    
                    <button type="button" class="btn btn-outline-primary btn-sm mb-4" id="add_group_btn">
                        <i class="fas fa-plus"></i> Tambah Variasi
                    </button>

                    <div id="combinations_container" style="display: none;">
                        <h5 class="mb-3">Daftar Variasi</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="combinations_table">
                                <thead class="bg-light" id="combinations_thead">
                                    <!-- Dynamic header -->
                                </thead>
                                <tbody id="combinations_tbody">
                                    <!-- Dynamic rows -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<style>
    .variant-group-box { border: 1px solid #ddd; padding: 15px; border-radius: 5px; margin-bottom: 15px; position: relative; background: #f9f9f9; }
    .remove-group-btn { position: absolute; top: 10px; right: 10px; color: #dc3545; cursor: pointer; border: none; background: transparent; }
    .option-tags-container { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px; border: 1px solid #ccc; padding: 8px; border-radius: 4px; background: #fff; min-height: 42px; }
    .option-tag { background: #e27d3b; color: #fff; padding: 2px 8px; border-radius: 12px; display: flex; align-items: center; font-size: 0.9rem; }
    .option-tag .remove-tag { margin-left: 5px; cursor: pointer; font-weight: bold; }
    .option-input { border: none; outline: none; flex-grow: 1; min-width: 100px; }
    .preview-img { width: 40px; height: 40px; object-fit: cover; border-radius: 4px; margin-bottom: 5px; }
    .file-upload-wrapper { position: relative; overflow: hidden; display: inline-block; }
    .file-upload-wrapper input[type=file] { position: absolute; left: 0; top: 0; opacity: 0; cursor: pointer; height: 100%; }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hasVariantsCb = document.getElementById('has_variants');
        const variantUiContainer = document.getElementById('variant_ui_container');
        const variantGroupsWrapper = document.getElementById('variant_groups_wrapper');
        const addGroupBtn = document.getElementById('add_group_btn');
        const combinationsContainer = document.getElementById('combinations_container');
        const combinationsThead = document.getElementById('combinations_thead');
        const combinationsTbody = document.getElementById('combinations_tbody');

        let state = {
            groups: []
        };

        hasVariantsCb.addEventListener('change', function() {
            variantUiContainer.style.display = this.checked ? 'block' : 'none';
            if (this.checked && state.groups.length === 0) {
                addGroup();
            }
        });

        addGroupBtn.addEventListener('click', function() {
            if (state.groups.length < 3) {
                addGroup();
            } else {
                alert("Maksimal 3 variasi.");
            }
        });

        function addGroup(name = '', options = []) {
            state.groups.push({ name: name, options: options });
            renderGroups();
            generateCombinations();
        }

        function renderGroups() {
            variantGroupsWrapper.innerHTML = '';
            state.groups.forEach((group, index) => {
                const groupHtml = `
                    <div class="variant-group-box">
                        <button type="button" class="remove-group-btn" onclick="removeGroup(${index})"><i class="fas fa-times"></i></button>
                        <div class="form-group mb-2">
                            <label>Nama Variasi ${index + 1}</label>
                            <input type="text" class="form-control" name="variant_groups[]" value="${group.name}" placeholder="Contoh: Warna, Ukuran" onchange="updateGroupName(${index}, this.value)">
                        </div>
                        <div class="form-group mb-0">
                            <label>Opsi Variasi (Ketik lalu Enter)</label>
                            <div class="option-tags-container" onclick="document.getElementById('opt_input_${index}').focus()">
                                ${group.options.map((opt, optIdx) => `
                                    <span class="option-tag">
                                        ${opt} <span class="remove-tag" onclick="removeOption(${index}, ${optIdx})">&times;</span>
                                        <input type="hidden" name="variant_options[${index}][]" value="${opt}">
                                    </span>
                                `).join('')}
                                <input type="text" class="option-input" id="opt_input_${index}" placeholder="Tambah opsi..." onkeydown="handleOptionInput(event, ${index})">
                            </div>
                        </div>
                    </div>
                `;
                variantGroupsWrapper.insertAdjacentHTML('beforeend', groupHtml);
            });

            if (state.groups.length >= 3) {
                addGroupBtn.style.display = 'none';
            } else {
                addGroupBtn.style.display = 'inline-block';
            }
        }

        window.removeGroup = function(index) {
            state.groups.splice(index, 1);
            renderGroups();
            generateCombinations();
        };

        window.updateGroupName = function(index, val) {
            state.groups[index].name = val;
            generateCombinations();
        };

        window.handleOptionInput = function(e, groupIndex) {
            if (e.key === 'Enter') {
                e.preventDefault(); // Prevent form submission
                const val = e.target.value.trim();
                if (val && !state.groups[groupIndex].options.includes(val)) {
                    state.groups[groupIndex].options.push(val);
                    e.target.value = '';
                    renderGroups();
                    generateCombinations();
                    setTimeout(() => { document.getElementById('opt_input_' + groupIndex).focus(); }, 10);
                }
            }
        };

        window.removeOption = function(groupIndex, optIndex) {
            state.groups[groupIndex].options.splice(optIndex, 1);
            renderGroups();
            generateCombinations();
        };

        let combinationsCache = {}; 

        function saveCurrentInputsToCache() {
            const rows = combinationsTbody.querySelectorAll('tr');
            rows.forEach(row => {
                const key = row.getAttribute('data-key');
                const sku = row.querySelector('.sku-input') ? row.querySelector('.sku-input').value : '';
                const dim = row.querySelector('.dim-input') ? row.querySelector('.dim-input').value : '';
                const spec = row.querySelector('.spec-input') ? row.querySelector('.spec-input').value : '';
                
                if (!combinationsCache[key]) combinationsCache[key] = {};
                combinationsCache[key].sku = sku;
                combinationsCache[key].dimensions = dim;
                combinationsCache[key].specification = spec;
            });
        }

        function generateCombinations() {
            saveCurrentInputsToCache();
            
            const validGroups = state.groups.filter(g => g.name && g.options.length > 0);
            if (validGroups.length === 0) {
                combinationsContainer.style.display = 'none';
                combinationsTbody.innerHTML = '';
                return;
            }

            combinationsContainer.style.display = 'block';

            let theadHtml = '<tr>';
            validGroups.forEach(g => {
                theadHtml += `<th>${g.name}</th>`;
            });
            theadHtml += `<th style="width: 15%;">SKU</th><th style="width: 15%;">Dimensi</th><th style="width: 25%;">Spesifikasi</th><th style="width: 10%;">Gambar</th></tr>`;
            combinationsThead.innerHTML = theadHtml;

            const arrays = validGroups.map(g => g.options);
            const combinations = arrays.reduce((acc, curr) => {
                let res = [];
                acc.forEach(a => {
                    curr.forEach(c => {
                        res.push([...a, c]);
                    });
                });
                return res;
            }, [[]]);

            let tbodyHtml = '';
            combinations.forEach((combo, idx) => {
                const key = combo.join('|');
                const cached = combinationsCache[key] || { sku: '', dimensions: '', specification: '', image_url: '' };
                
                tbodyHtml += `<tr data-key="${key}">`;
                
                combo.forEach((opt, gIdx) => {
                    tbodyHtml += `<td>${opt}
                        <input type="hidden" name="variants[${idx}][option_${gIdx+1}]" value="${opt}">
                    </td>`;
                });

                tbodyHtml += `
                    <td><input type="text" name="variants[${idx}][sku]" class="form-control form-control-sm sku-input" value="${cached.sku}"></td>
                    <td><input type="text" name="variants[${idx}][dimensions]" class="form-control form-control-sm dim-input" value="${cached.dimensions}"></td>
                    <td><textarea name="variants[${idx}][specification]" class="form-control form-control-sm spec-input" rows="2">${cached.specification}</textarea></td>
                    <td>
                        <div class="d-flex flex-column align-items-center">
                            <img src="" class="preview-img" style="display:none;">
                            <div class="file-upload-wrapper mt-1">
                                <button type="button" class="btn btn-xs btn-outline-secondary"><i class="fas fa-image"></i></button>
                                <input type="file" name="variants[${idx}][image]" accept="image/*" onchange="previewVariantImg(this)">
                            </div>
                        </div>
                    </td>
                </tr>`;
            });
            combinationsTbody.innerHTML = tbodyHtml;
        }

        window.previewVariantImg = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = input.parentElement.previousElementSibling;
                    img.src = e.target.result;
                    img.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        };

        // Prevent Enter submission in forms
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                const isOptionInput = event.target.classList.contains('option-input');
                if (isOptionInput || event.target.tagName.toLowerCase() === 'input') {
                    event.preventDefault();
                }
            }
        });
    });
</script>
@endsection
