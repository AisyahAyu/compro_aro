<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductLink;
use Illuminate\Http\Request;

class ProductLinkController extends Controller
{
    /**
     * Show the form for editing the product links.
     */
    public function edit()
    {
        $productLink = ProductLink::first();
        if (!$productLink) {
            $productLink = ProductLink::create([
                'marketplace_url' => 'https://ayobelanja.co.id',
                'inaproc_url' => 'https://inaproc.lkpp.go.id',
                'is_active' => true
            ]);
        }
        return view('admin.product-links.edit', compact('productLink'));
    }

    /**
     * Update the product links.
     */
    public function update(Request $request)
    {
        $request->validate([
            'marketplace_url' => 'nullable|string|max:255',
            'inaproc_url' => 'nullable|string|max:255',
            'is_active' => 'nullable'
        ]);

        $productLink = ProductLink::first();
        if (!$productLink) {
            $productLink = new ProductLink();
        }

        $data = $request->except('is_active');

        // Handle is_active checkbox
        $data['is_active'] = $request->has('is_active') ? true : false;

        // Normalize URLs
        if ($data['marketplace_url'] && !str_starts_with($data['marketplace_url'], 'http://') && !str_starts_with($data['marketplace_url'], 'https://')) {
            $data['marketplace_url'] = 'https://' . $data['marketplace_url'];
        }

        if ($data['inaproc_url'] && !str_starts_with($data['inaproc_url'], 'http://') && !str_starts_with($data['inaproc_url'], 'https://')) {
            $data['inaproc_url'] = 'https://' . $data['inaproc_url'];
        }

        $productLink->fill($data);
        $productLink->save();

        return redirect()->route('admin.product-links.edit')->with('success', 'Product links updated successfully.');
    }
}
