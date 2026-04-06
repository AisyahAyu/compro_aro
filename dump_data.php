<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Aktivitas;
use App\Models\Product;

echo "Aktivitas:\n";
foreach (Aktivitas::latest()->limit(5)->get() as $a) {
    echo "ID: {$a->id}, Judul: {$a->judul}, Gambar: {$a->gambar}\n";
}

echo "\nProduk:\n";
foreach (Product::limit(5)->get() as $p) {
    echo "ID: {$p->id}, Nama: {$p->name}, Gambar: {$p->image}\n";
}
