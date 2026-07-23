<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function index(Product $product)
    {
        $product->load('variants');
        return view('admin.products.variants', compact('product'));
    }

    public function updateGroups(Request $request, Product $product)
    {
        $request->validate([
            'has_variants' => 'boolean',
            'variant_groups' => 'nullable|array',
            'variant_groups.*' => 'string|max:255'
        ]);

        $has_variants = $request->boolean('has_variants');
        $groups = array_values(array_filter($request->input('variant_groups', [])));
        
        // Max 3 groups
        if (count($groups) > 3) {
            $groups = array_slice($groups, 0, 3);
        }

        $product->update([
            'has_variants' => $has_variants,
            'variant_groups' => $groups
        ]);

        return redirect()->route('admin.products.edit', $product->id)->with('success', 'Grup varian berhasil diperbarui.');
    }

    public function storeVariant(Request $request, Product $product)
    {
        $request->validate([
            'option_1' => 'nullable|string|max:255',
            'option_2' => 'nullable|string|max:255',
            'option_3' => 'nullable|string|max:255',
            'sku' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'dimensions' => 'nullable|string|max:255',
            'specification' => 'nullable|string',
            'type' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['option_1', 'option_2', 'option_3', 'sku', 'dimensions', 'specification', 'type']);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $filename);
            $data['image'] = 'uploads/products/' . $filename;
        }

        $product->variants()->create($data);

        return redirect()->route('admin.products.edit', $product->id)->with('success', 'Kombinasi varian berhasil ditambahkan.');
    }

    public function destroyVariant(ProductVariant $variant)
    {
        if ($variant->image && file_exists(public_path($variant->image))) {
            unlink(public_path($variant->image));
        }
        $variant->delete();
        return redirect()->back()->with('success', 'Varian berhasil dihapus.');
    }
}
