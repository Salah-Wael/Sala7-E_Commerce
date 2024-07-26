<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\ImageController;

class CategoryController extends Controller
{
    public static function getAllCategories()
    {
        return DB::table('categories')->get();
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:500',
                'image_path' => 'required|image|mimes:jpeg,jpg,png,jfif,svg|max:5048',
            ],
            #errors
            [
                'image_path.image' => "The file field must be an image.",
                'image_path.mimes' => "The file field must be an image with extension jpeg, jpg, png, jfif, or svg.",
            ]
        );

        $category = new Category();
        $category->name = ucwords(strtolower($request->name));
        $category->description = $request->description;
        $category->image_path = ImageController::storeImage($request, 'image_path', 'assets/img/categories/');
        $category->save();

        $tag = new Tag();
        $tag->tag = ucwords(strtolower($request->name));

        return redirect()->route('category.index')->with(['message' => 'Category added successfully']);
    }

    public function index()
    {
        $categories = DB::table('categories')->get();

        return view('category.index', ['categories' => $categories]);
    }


    public function edit($categoryName)
    {
        $category = DB::table('categories')->where('name', $categoryName)->first();
        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request, $categoryName)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:500',
                'image_path' => 'image|mimes:jpeg,jpg,png,jfif,svg|max:5048',
            ],
            #errors
            [
                'image_path.image' => "The file field must be an image.",
                'image_path.mimes' => "The file field must be an image with extension jpeg, jpg, png, jfif, or svg.",
            ]
        );

        
        

        $category = Category::where('name', $categoryName)->firstOr(function(){ return ErrorController::error404()->with(['message' => 'Category not found']);});

        Tag::updateOrCreate(['tag' => $categoryName], [
            'tag' => ucwords(strtolower($request->name))
        ]);

        $category->name = ucwords(strtolower($request->name));
        
        $category->description = $request->description;

        if ($request->hasFile('image_path')) {
            ImageController::deleteImage($category->image_path, 'assets/img/categories/');
            $category->image_path = ImageController::storeImage($request, 'image_path', 'assets/img/categories/');
        }

        $category->updated_at = now();

        $category->save();

        return redirect()->route('category.index')->with(['message' => 'Category updated successfully']);
        
    }

    public function delete($categoryName)
    {
        $category = Category::where('name', $categoryName)->first();
        if ($category) {
            ImageController::deleteImage($category->image_path, 'assets/img/categories/');
            $category->delete();

            return redirect()->route('category.index')->with(['message' => 'Category deleted successfully']);
        }

        return ErrorController::error404()->with(['message' => 'Category not found']);
    }

}
