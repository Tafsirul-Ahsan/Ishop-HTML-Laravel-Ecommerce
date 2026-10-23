<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')
            ->orderBy('name')
            ->paginate(15);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $category = new Category();

        return view('admin.categories.form', compact('category'));
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['slug'] = $this->uniqueSlug(trim($data['slug'] ?? '') !== '' ? $data['slug'] : $data['name']);
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeImage($request);
        }

        Category::create($data);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Product category created successfully.');
    }

    public function show(Category $category)
    {
        $products = Product::query()
            ->where(function ($query) use ($category) {
                $query->where('type', $category->name)
                    ->orWhere('category', $category->name);
            })
            ->latest()
            ->paginate(12);

        return view('admin.categories.show', compact('category', 'products'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.form', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $this->validatedData($request, $category);
        $data['slug'] = $this->uniqueSlug(trim($data['slug'] ?? '') !== '' ? $data['slug'] : $data['name'], $category->id);
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $newImage = $this->storeImage($request);

            if ($category->image) {
                $oldPath = public_path('uploads/categories/' . $category->image);
                if (is_file($oldPath)) {
                    @unlink($oldPath);
                }
            }

            $data['image'] = $newImage;
        } else {
            unset($data['image']);
        }

        $oldName = $category->name;
        $category->update($data);

        // Keep legacy products connected when the category is renamed.
        if ($oldName !== $category->name) {
            Product::where('type', $oldName)->update(['type' => $category->name]);
            Product::where('category', $oldName)->update(['category' => $category->name]);
        }

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Product category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $inUse = Product::query()
            ->where('type', $category->name)
            ->orWhere('category', $category->name)
            ->exists();

        if ($inUse) {
            return redirect()
                ->route('admin.categories.index')
                ->with('error', 'This category is assigned to one or more products. Reassign those products before deleting it.');
        }

        if ($category->image) {
            $imagePath = public_path('uploads/categories/' . $category->image);
            if (is_file($imagePath)) {
                @unlink($imagePath);
            }
        }

        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Product category deleted successfully.');
    }

    private function validatedData(Request $request, ?Category $category = null): array
    {
        return $request->validate([
            'name' => [
                'required', 'string', 'max:150',
                Rule::unique('categories', 'name')->ignore($category?->id),
            ],
            'slug' => [
                'nullable', 'string', 'max:180',
                Rule::unique('categories', 'slug')->ignore($category?->id),
            ],
            'description' => ['nullable', 'string', 'max:2000'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
        ]);
    }

    private function uniqueSlug(string $value, ?int $ignoreId = null): string
    {
        $base = Str::slug($value) ?: 'category';
        $slug = $base;
        $counter = 2;

        while (Category::where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $base . '-' . $counter++;
        }

        return $slug;
    }

    private function storeImage(Request $request): string
    {
        $directory = public_path('uploads/categories');

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $image = $request->file('image');
        $filename = uniqid('category_', true) . '.' . $image->extension();
        $image->move($directory, $filename);

        return $filename;
    }
}
