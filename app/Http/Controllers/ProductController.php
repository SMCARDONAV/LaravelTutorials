<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = Product::all();

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        try {

            $product = Product::findOrFail($id);

            $viewData = [];
            $viewData['title'] = 'Products - Online Store';
            $viewData['subtitle'] = 'List of products';
            $viewData['product'] = $product;

            return view('product.show')->with('viewData', $viewData);
        } catch (\Exception $e) {
            return redirect()->route('home.index');
        }
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create product';

        return view('product.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {

        Product::validate($request);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(10).'.'.$image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/images', $imageName);
            $imagePath = Storage::url($imagePath);
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imagePath
        ]);

        return back()->with('success', 'Product created successfully.');
    }
}
