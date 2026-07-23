<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

class ProductController extends Controller
{
    // ======================
    // INDEX
    // ======================
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = Product::with(['category', 'brand'])->latest();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('type', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%")
                  ->orWhere('brand_name', 'like', "%{$search}%")
                  ->orWhereHas('brand', function($b) use ($search) {
                      $b->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $data = $query->paginate(10);
        $categories = Category::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get();

        return view('admin.products.index', compact('data', 'search', 'categories', 'brands'));
    }

    // ======================
    // CREATE
    // ======================
    public function create()
    {
        $categories = Category::where('is_active', true)->orderBy('order')->get();
        $brands = Brand::where('is_active', true)->orderBy('order')->get();

        return view('admin.products.create', compact('categories', 'brands'));
    }

    // ======================
    // STORE
    // ======================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'type' => 'nullable|string|max:255',
            'dimensions' => 'nullable|string|max:255',
            'specification' => 'nullable|string',
            'brand_name' => 'nullable|string|max:255',
            'sku' => 'nullable|string|max:255',
            'country_of_origin' => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        $data['has_variants'] = $request->boolean('has_variants');
        $groups = array_values(array_filter($request->input('variant_groups', [])));
        if (count($groups) > 3) {
            $groups = array_slice($groups, 0, 3);
        }
        $data['variant_groups'] = $groups;

        // UPLOAD GAMBAR
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            
            $image->move(public_path('uploads/products'), $filename);
            $data['image'] = 'uploads/products/' . $filename;
        }

        $product = Product::create($data);

        // Proses Varian
        if ($product->has_variants) {
            $submittedVariants = $request->input('variants', []);
            
            foreach ($submittedVariants as $index => $varData) {
                $variantFields = [
                    'option_1' => $varData['option_1'] ?? null,
                    'option_2' => $varData['option_2'] ?? null,
                    'option_3' => $varData['option_3'] ?? null,
                    'sku' => $varData['sku'] ?? null,
                    'dimensions' => $varData['dimensions'] ?? null,
                    'specification' => $varData['specification'] ?? null,
                ];

                // Upload gambar varian
                if ($request->hasFile("variants.{$index}.image")) {
                    $img = $request->file("variants.{$index}.image");
                    $vFilename = time() . '_' . rand(100,999) . '.' . $img->getClientOriginalExtension();
                    $img->move(public_path('uploads/products/variants'), $vFilename);
                    $variantFields['image'] = 'uploads/products/variants/' . $vFilename;
                }

                $product->variants()->create($variantFields);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // ======================
    // EDIT
    // ======================
    public function edit(string $id)
    {
        $data = Product::with('variants')->findOrFail($id);
        $categories = Category::where('is_active', true)->orderBy('order')->get();
        $brands = Brand::where('is_active', true)->orderBy('order')->get();

        return view('admin.products.edit', compact('data', 'categories', 'brands'));
    }

    // ======================
    // UPDATE
    // ======================
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'type' => 'nullable|string|max:255',
            'dimensions' => 'nullable|string|max:255',
            'specification' => 'nullable|string',
            'brand_name' => 'nullable|string|max:255',
            'sku' => 'nullable|string|max:255',
            'country_of_origin' => 'nullable|string|max:255',
        ]);

        $product = Product::findOrFail($id);
        $data = $request->all();
        
        $data['has_variants'] = $request->boolean('has_variants');
        $groups = array_values(array_filter($request->input('variant_groups', [])));
        if (count($groups) > 3) {
            $groups = array_slice($groups, 0, 3);
        }
        $data['variant_groups'] = $groups;

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            // Upload gambar baru
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            
            $image->move(public_path('uploads/products'), $filename);
            $data['image'] = 'uploads/products/' . $filename;
        }

        $product->update($data);

        // Proses Varian
        if ($product->has_variants) {
            $submittedVariants = $request->input('variants', []);
            $keptVariantIds = [];

            foreach ($submittedVariants as $index => $varData) {
                $variantId = $varData['id'] ?? null;
                
                $variantFields = [
                    'option_1' => $varData['option_1'] ?? null,
                    'option_2' => $varData['option_2'] ?? null,
                    'option_3' => $varData['option_3'] ?? null,
                    'sku' => $varData['sku'] ?? null,
                    'dimensions' => $varData['dimensions'] ?? null,
                    'specification' => $varData['specification'] ?? null,
                ];

                // Upload gambar varian
                if ($request->hasFile("variants.{$index}.image")) {
                    $img = $request->file("variants.{$index}.image");
                    $vFilename = time() . '_' . rand(100,999) . '.' . $img->getClientOriginalExtension();
                    $img->move(public_path('uploads/products/variants'), $vFilename);
                    
                    // Hapus gambar lama jika update
                    if ($variantId) {
                        $oldVar = $product->variants()->find($variantId);
                        if ($oldVar && $oldVar->image && file_exists(public_path($oldVar->image))) {
                            unlink(public_path($oldVar->image));
                        }
                    }
                    
                    $variantFields['image'] = 'uploads/products/variants/' . $vFilename;
                }

                if ($variantId) {
                    $variant = $product->variants()->find($variantId);
                    if ($variant) {
                        $variant->update($variantFields);
                        $keptVariantIds[] = $variant->id;
                    }
                } else {
                    // Check if exists by options to avoid duplicates if ID was lost
                    $existingVariant = $product->variants()
                        ->where('option_1', $variantFields['option_1'])
                        ->where('option_2', $variantFields['option_2'])
                        ->where('option_3', $variantFields['option_3'])
                        ->first();
                        
                    if ($existingVariant) {
                        $existingVariant->update($variantFields);
                        $keptVariantIds[] = $existingVariant->id;
                    } else {
                        $newVariant = $product->variants()->create($variantFields);
                        $keptVariantIds[] = $newVariant->id;
                    }
                }
            }

            // Hapus varian yang tidak ada di daftar submit
            $variantsToDelete = $product->variants()->whereNotIn('id', $keptVariantIds)->get();
            foreach($variantsToDelete as $vDel) {
                if ($vDel->image && file_exists(public_path($vDel->image))) {
                    unlink(public_path($vDel->image));
                }
                $vDel->delete();
            }
        } else {
            // Jika varian dinonaktifkan, hapus semua varian
            $variantsToDelete = $product->variants()->get();
            foreach($variantsToDelete as $vDel) {
                if ($vDel->image && file_exists(public_path($vDel->image))) {
                    unlink(public_path($vDel->image));
                }
                $vDel->delete();
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    // ======================
    // DELETE
    // ======================
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        // Hapus file gambar
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    // ======================
    // DOWNLOAD TEMPLATE EXCEL
    // ======================
    public function downloadTemplate()
    {
        $spreadsheet = new Spreadsheet();
        
        // Sheet 1: Template Import
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Template Import');

        $headers = [
            'Gambar Produk',
            'Nama Produk',
            'Kategori',
            'Tipe Produk',
            'Dimensi',
            'Spesifikasi',
            'Merek',
            'SKU',
            'Asal Negara'
        ];

        // Tulis header
        foreach ($headers as $colIndex => $header) {
            $colLetter = Coordinate::stringFromColumnIndex($colIndex + 1);
            $sheet->setCellValue($colLetter . '1', $header);
        }

        // Tulis contoh baris
        $example = [
            'meja1.jpg',
            'Meja Staff 2800',
            'Kantor',
            'WS-01',
            '2800×1200',
            'Top MDF',
            'Ferro',
            'WS001',
            'Indonesia'
        ];

        foreach ($example as $colIndex => $value) {
            $colLetter = Coordinate::stringFromColumnIndex($colIndex + 1);
            $sheet->setCellValue($colLetter . '2', $value);
        }

        // Auto-size kolom
        foreach (range(1, count($headers)) as $col) {
            $sheet->getColumnDimensionByColumn($col)->setAutoSize(true);
        }

        // Sheet 2: Referensi Kategori & Merek
        $refSheet = $spreadsheet->createSheet();
        $refSheet->setTitle('Referensi Kategori & Merek');

        $refSheet->setCellValue('A1', 'Kategori yang Tersedia');
        $refSheet->setCellValue('B1', 'Merek yang Tersedia');
        $refSheet->getStyle('A1:B1')->getFont()->setBold(true);

        $categories = Category::orderBy('name')->pluck('name')->toArray();
        $brands = Brand::orderBy('name')->pluck('name')->toArray();

        $maxRows = max(count($categories), count($brands));
        for ($i = 0; $i < $maxRows; $i++) {
            $rowNum = $i + 2;
            if (isset($categories[$i])) {
                $refSheet->setCellValue('A' . $rowNum, $categories[$i]);
            }
            if (isset($brands[$i])) {
                $refSheet->setCellValue('B' . $rowNum, $brands[$i]);
            }
        }

        $refSheet->getColumnDimension('A')->setAutoSize(true);
        $refSheet->getColumnDimension('B')->setAutoSize(true);

        // Set active sheet back to Sheet 1 so it opens on the template form
        $spreadsheet->setActiveSheetIndex(0);

        $writer = new Xlsx($spreadsheet);
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="template_import_produk.xlsx"');
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');
        exit;
    }

    // ======================
    // IMPORT EXCEL & ZIP IMAGES
    // ======================
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls|max:5120',
            'zip' => 'required|file|mimes:zip|max:51200',
        ]);

        $file = $request->file('file');
        $zipFile = $request->file('zip');
        
        // Buat folder sementara untuk ekstraksi ZIP
        $tempExtractPath = public_path('uploads/temp_import_' . time() . '_' . uniqid());
        if (!file_exists($tempExtractPath)) {
            mkdir($tempExtractPath, 0777, true);
        }

        // Ekstrak ZIP
        $zip = new \ZipArchive();
        if ($zip->open($zipFile->getRealPath()) === TRUE) {
            $zip->extractTo($tempExtractPath);
            $zip->close();
        } else {
            $this->deleteDirectory($tempExtractPath);
            return redirect()->route('admin.products.index')->with('error', 'Gagal mengekstrak file ZIP Gambar.');
        }

        try {
            $spreadsheet = IOFactory::load($file->getRealPath());
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();
        } catch (\Exception $e) {
            $this->deleteDirectory($tempExtractPath);
            return redirect()->route('admin.products.index')->with('error', 'Gagal membaca file Excel: ' . $e->getMessage());
        }

        $successCount = 0;
        $failCount = 0;
        $errorsList = [];
        $seenSkus = [];

        foreach ($rows as $rowIndex => $row) {
            if ($rowIndex === 0) continue; // Skip header

            // Cek apakah baris kosong
            $isEmpty = true;
            foreach ($row as $val) {
                if ($val !== null && trim((string)$val) !== '') {
                    $isEmpty = false;
                    break;
                }
            }
            if ($isEmpty) continue;

            $gambar = isset($row[0]) ? trim((string)$row[0]) : '';
            $nama = isset($row[1]) ? trim((string)$row[1]) : '';
            $kategori = isset($row[2]) ? trim((string)$row[2]) : '';
            $tipe = isset($row[3]) ? trim((string)$row[3]) : '';
            $dimensi = isset($row[4]) ? trim((string)$row[4]) : '';
            $spesifikasi = isset($row[5]) ? trim((string)$row[5]) : '';
            $merek = isset($row[6]) ? trim((string)$row[6]) : '';
            $sku = isset($row[7]) ? trim((string)$row[7]) : '';
            $asal = isset($row[8]) ? trim((string)$row[8]) : '';

            $rowNum = $rowIndex + 1;
            $rowErrors = [];

            // Pencocokan gambar di ZIP
            $matchedImagePath = null;
            if (empty($gambar)) {
                $rowErrors[] = "Kolom 'Gambar Produk' wajib diisi.";
            } else {
                $matchedImagePath = $this->findFileRecursive($tempExtractPath, $gambar);
                if (!$matchedImagePath) {
                    $rowErrors[] = "Gambar '{$gambar}' tidak ditemukan di dalam file ZIP Gambar.";
                }
            }

            if (empty($nama)) $rowErrors[] = "Kolom 'Nama Produk' wajib diisi.";
            
            // Pencocokan Kategori (Otomatis Buat jika tidak ada)
            $categoryId = null;
            if (empty($kategori)) {
                $rowErrors[] = "Kolom 'Kategori' wajib diisi.";
            } else {
                $categoryModel = Category::where('name', 'like', $kategori)->first();
                if (!$categoryModel) {
                    try {
                        $categoryModel = Category::create([
                            'name' => $kategori,
                            'description' => 'Kategori otomatis dibuat dari import Excel.',
                            'image' => 'uploads/default.png',
                            'order' => 0,
                            'is_active' => true
                        ]);
                    } catch (\Exception $e) {
                        $rowErrors[] = "Gagal membuat kategori baru '{$kategori}': " . $e->getMessage();
                    }
                }
                if ($categoryModel) {
                    $categoryId = $categoryModel->id;
                }
            }

            if (empty($tipe)) $rowErrors[] = "Kolom 'Tipe Produk' wajib diisi.";
            if (empty($dimensi)) $rowErrors[] = "Kolom 'Dimensi' wajib diisi.";
            if (empty($spesifikasi)) $rowErrors[] = "Kolom 'Spesifikasi' wajib diisi.";
            
            // Pencocokan Merek (Otomatis Buat jika tidak ada)
            $brandId = null;
            $brandNameVal = null;
            if (empty($merek)) {
                $rowErrors[] = "Kolom 'Merek' wajib diisi.";
            } else {
                $brandModel = Brand::where('name', 'like', $merek)->first();
                if (!$brandModel) {
                    try {
                        $brandModel = Brand::create([
                            'name' => $merek,
                            'logo' => 'uploads/default.png',
                            'order' => 0,
                            'is_active' => true
                        ]);
                    } catch (\Exception $e) {
                        // Jika gagal membuat, fallback ke manual name
                    }
                }
                if ($brandModel) {
                    $brandId = $brandModel->id;
                    $brandNameVal = $brandModel->name;
                } else {
                    $brandId = null;
                    $brandNameVal = $merek;
                }
            }
            
            if (empty($sku)) {
                $rowErrors[] = "Kolom 'SKU' wajib diisi.";
            } else {
                if (Product::where('sku', $sku)->exists()) {
                    $rowErrors[] = "SKU '{$sku}' sudah terdaftar di database.";
                } elseif (in_array($sku, $seenSkus, true)) {
                    $rowErrors[] = "SKU '{$sku}' duplikat di dalam file Excel.";
                } else {
                    $seenSkus[] = $sku;
                }
            }
            
            if (empty($asal)) $rowErrors[] = "Kolom 'Asal Negara' wajib diisi.";

            if (count($rowErrors) > 0) {
                $failCount++;
                $errorsList[] = [
                    'row' => $rowNum,
                    'sku' => $sku ?: '-',
                    'errors' => $rowErrors
                ];
                continue;
            }

            // Pindahkan gambar dari folder temp ke uploads/products
            $ext = pathinfo($matchedImagePath, PATHINFO_EXTENSION);
            $uniqueFilename = time() . '_' . uniqid() . '.' . $ext;
            
            if (!file_exists(public_path('uploads/products'))) {
                mkdir(public_path('uploads/products'), 0777, true);
            }
            
            $destinationPath = public_path('uploads/products/' . $uniqueFilename);
            copy($matchedImagePath, $destinationPath);
            $dbImagePath = 'uploads/products/' . $uniqueFilename;

            try {
                Product::create([
                    'image' => $dbImagePath,
                    'name' => $nama,
                    'category_id' => $categoryId,
                    'brand_id' => $brandId,
                    'type' => $tipe,
                    'dimensions' => $dimensi,
                    'specification' => $spesifikasi,
                    'brand_name' => $brandNameVal,
                    'sku' => $sku,
                    'country_of_origin' => $asal,
                ]);
                $successCount++;
            } catch (\Exception $e) {
                $failCount++;
                $errorsList[] = [
                    'row' => $rowNum,
                    'sku' => $sku,
                    'errors' => ["Gagal menyimpan ke database: " . $e->getMessage()]
                ];
            }
        }

        // Hapus folder temp ekstraksi ZIP
        $this->deleteDirectory($tempExtractPath);

        return redirect()->route('admin.products.index')
            ->with('import_summary', [
                'success' => $successCount,
                'fail' => $failCount,
                'errors' => $errorsList
            ]);
    }

    private function findFileRecursive($dir, $filename)
    {
        if (!file_exists($dir)) return null;

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($dir, \RecursiveDirectoryIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if ($file->isFile() && strtolower($file->getFilename()) === strtolower($filename)) {
                return $file->getPathname();
            }
        }

        return null;
    }

    private function deleteDirectory($dir)
    {
        if (!file_exists($dir)) return;

        $files = array_diff(scandir($dir), ['.', '..']);
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? $this->deleteDirectory("$dir/$file") : unlink("$dir/$file");
        }

        return rmdir($dir);
    }
}
