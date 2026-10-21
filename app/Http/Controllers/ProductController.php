<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display all products.
     */
    public function index(Request $request)
    {
        $products = Product::query()
            ->when($request->filled('q'), function ($query) use ($request) {
                $term = trim($request->input('q'));

                $query->where(function ($subQuery) use ($term) {
                    $subQuery->where('name', 'like', "%{$term}%")
                        ->orWhere('sku', 'like', "%{$term}%")
                        ->orWhere('category', 'like', "%{$term}%");
                });
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.finance.products.index', compact('products'));
    }

    /**
     * Show product creation form.
     */
    public function create()
    {
        $product = new Product();

        return view('admin.finance.products.create', compact('product'));
    }

    /**
     * Store a new product.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:190',
            ],

            'sku' => [
                'nullable',
                'string',
                'max:100',
                'unique:products,sku',
            ],

            'category' => [
                'nullable',
                'string',
                'max:100',
            ],

            'purchase_price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'selling_price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'stock' => [
                'required',
                'integer',
                'min:0',
            ],

            'low_stock_at' => [
                'required',
                'integer',
                'min:0',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],

            // Existing website product fields
            'type' => [
                'required',
                'string',
                'max:255',
            ],

            'qty' => [
                'required',
                'string',
                'max:255',
            ],

            'short_des' => [
                'required',
                'string',
                'max:255',
            ],

            'tags' => [
                'nullable',
                'string',
                'max:255',
            ],

            'thum_img' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                
            ],

            'moreimg' => [
                'nullable',
                'array',
            ],

            'moreimg.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                
            ],

            'adinfo' => [
                'required',
                'string',
            ],

            'description' => [
                'required',
                'string',
            ],
        ]);

        // Checkbox value
        $data['is_active'] = $request->boolean('is_active');

        // Store thumbnail in public/uploads
        if ($request->hasFile('thum_img')) {
            $image = $request->file('thum_img');

            $filename = uniqid('product_', true)
                . '.' . $image->extension();

            $image->move(public_path('uploads'), $filename);

            $data['thum_img'] = $filename;
        }

        // Additional images are not a column in the supplied products table.
        // Do not pass them to Product::create().

        unset($data['moreimg']);

        Product::create($data);

        return redirect()
            ->route('admin.finance.products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Show edit form.
     */
    public function edit(Product $product)
    {
        return view('admin.finance.products.edit', compact('product'));
    }

    /**
     * Update existing product.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:190',
            ],

            'sku' => [
                'nullable',
                'string',
                'max:100',
                Rule::unique('products', 'sku')->ignore($product->id),
            ],

            'category' => [
                'nullable',
                'string',
                'max:100',
            ],

            'purchase_price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'selling_price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'stock' => [
                'required',
                'integer',
                'min:0',
            ],

            'low_stock_at' => [
                'required',
                'integer',
                'min:0',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],

            // Existing website product fields
            'type' => [
                'required',
                'string',
                'max:255',
            ],

            'qty' => [
                'required',
                'string',
                'max:255',
            ],

            'short_des' => [
                'required',
                'string',
                'max:255',
            ],

            'tags' => [
                'nullable',
                'string',
                'max:255',
            ],

            'thum_img' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'moreimg' => [
                'nullable',
                'array',
            ],

            'moreimg.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'adinfo' => [
                'required',
                'string',
            ],

            'description' => [
                'required',
                'string',
            ],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        // Replace thumbnail only when a new image is uploaded.
        if ($request->hasFile('thum_img')) {
            $image = $request->file('thum_img');

            $filename = uniqid('product_', true)
                . '.' . $image->extension();

            $image->move(public_path('uploads'), $filename);

            // Delete old thumbnail after the new upload succeeds.
            if ($product->thum_img) {
                $oldImage = public_path(
                    'uploads/' . $product->thum_img
                );

                if (is_file($oldImage)) {
                    @unlink($oldImage);
                }
            }

            $data['thum_img'] = $filename;
        } else {
            // Preserve the existing thumbnail.
            unset($data['thum_img']);
        }

        // Additional images require a separate storage strategy/table.
        unset($data['moreimg']);

        $product->update($data);

        return redirect()
            ->route('admin.finance.products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Delete product.
     */
    public function destroy(Product $product)
    {
        if (
            $product->saleItems()->exists() ||
            $product->purchaseItems()->exists()
        ) {
            return back()->with(
                'error',
                'This product has transaction history and cannot be deleted.'
            );
        }

        // Delete thumbnail if it exists.
        if ($product->thum_img) {
            $imagePath = public_path(
                'uploads/' . $product->thum_img
            );

            if (is_file($imagePath)) {
                @unlink($imagePath);
            }
        }

        $product->delete();

        return redirect()
            ->route('admin.finance.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
