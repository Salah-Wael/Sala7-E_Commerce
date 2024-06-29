<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    public function create()
    {
        $categories = Category::all()->select(['name']);
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'description' => 'string',
                'price' => 'required|numeric',
                'quantity' => 'required|integer',
                'image_path' => 'required|image|mimes:jpeg,jpg,png,jfif,svg|max:5048',
                'category_name' => 'required|string|max:255',
            ],
            #errors
            [
                'image_path.image' => "The file field must be an image.",
                'image_path.mimes' => "The file field must be an image with extension jpeg, jpg, png, jfif, or svg.",
            ]
        );

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_name = $request->category_name;
        $product->image_path = ImageController::storeImage($request, 'image_path', 'assets/img/products/');
        $product->save();
        return redirect()->route('product.index')->with(['message' => 'Product added successfully']);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            $related = Product::where('category_name', '=', $product->category_name)->take(6)->get();
            return view('product.show', compact('product', 'related'));
        }

        // Return custom 404 view if product is not found
        return view('error.404')->with(['message' => 'Product ID not found']);
    }

    public function index()
    {
        $products = Product::orderby('created_at', 'desc')->paginate(12);
        $categories = DB::table('categories')->get();

        return view('product.index', compact('products', 'categories'));
    }
    public function productsTable()
    {
        $products = Product::all();
        // $categories = DB::table('categories')->get();

        return view('product.products-table', compact('products'));
    }


    public function edit($id)
    {
        $product = Product::find($id);
        if ($product) {
            $categories = Category::where('name', '!=', $product->category_name)->get(['name']);
            return view('product.edit', compact('product', 'categories'));
        }

        // Return custom 404 view if product is not found
        return view('error.404')->with(['message' => 'Product ID not found']);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'description' => 'string',
                'price' => 'required|numeric',
                'quantity' => 'required|integer',
                'image_path' => 'image|mimes:jpeg,jpg,png,jfif,svg|max:5048',
                'category_name' => 'required|string|max:255',
            ],
            #errors
            [
                'image_path.image' => "The file field must be an image.",
                'image_path.mimes' => "The file field must be an image with extension jpeg, jpg, png, jfif, or svg.",
            ]
        );

        $product = Product::find($id);
        if ($product) {

            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->category_name = $request->category_name;

            if ($request->hasFile('image_path')) {
                ImageController::deleteImage($request->image_path, 'assets/img/products/');
                $product->image_path = ImageController::storeImage($request, 'image_path', 'assets/img/products/');
            }

            $product->updated_at = now();

            $product->save();
            // Store the current route name in session
            Session::put('previous_route', Route::currentRouteName());

            // Later, retrieve the previous route name
            $previousRoute = Session::get('previous_route');

            elseif ($previousRoute == 'product.table') {
                return redirect()->route('product.table')->with('message', 'Product updated successfully');
            } else {
                // Handle default redirect or error case
                return redirect()->route('home'); // Example of a default route
            }
        }
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) {
            ImageController::deleteImage($product->image_path, 'assets/img/products/');
            $product->delete();
            return redirect()->route('product.index')->with(['message' => 'Product deleted successfully']);
        }

        // Return custom 404 view if product is not found
        return view('error.404')->with(['message' => 'Product ID not found']);
    }
}
