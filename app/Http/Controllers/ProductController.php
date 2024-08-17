<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public static $products = [
        ["id"=>"1", "name"=>"TV", "description"=>"Best TV", "price"=>"250"],
        ["id"=>"2", "name"=>"iPhone", "description"=>"Best iPhone","price"=>"150"],
        ["id"=>"3", "name"=>"Chromecast", "description"=>"Best Chromecast","price"=>"80"],
        ["id"=>"4", "name"=>"Glasses", "description"=>"Best Glasses","price"=>"50"]
    ];

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] =  "List of products";
        $viewData["products"] = ProductController::$products;
        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id) : View|RedirectResponse
    {
        $productIndex = (int)$id - 1;

        if (!isset(ProductController::$products[$productIndex])) {
            // Redirect to the home page if the product is not found
            return redirect()->route('home.index');
        }

        $viewData = [];
        $product = ProductController::$products[$productIndex];
        $viewData["title"] = $product["name"]." - Online Store";
        $viewData["subtitle"] =  $product["name"]." - Product information";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }
}

