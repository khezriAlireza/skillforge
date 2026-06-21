<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create()
    {
        if (!auth()->user()->can('create', Product::class)){
            abort(403, __('messages.product_create_forbidden'));
        }
        $categories = Category::with('subCategories')->get();
        return view('products.create',compact('categories'));

    }

    public function getSubcategories($categoryId)
    {
        $subCategories = Category::find($categoryId)->subCategories()->get();
        return response()->json($subCategories);
    }

    public function store(Request $request)
    {
        if (!auth()->user()->can('create', Product::class)){
            abort(403, __('messages.product_create_forbidden'));
        }
        $request->validate([
            'name' =>'string|unique:products,name|max:255|required',
            'description' => 'string|required',
            'sub_category_id' => 'required|integer',
            'category_id' => 'required|integer',
            'price' => 'string|required|max:255',
            'stock' => 'integer|nullable',
            'active' => 'integer|nullable',
            'image' => 'image|nullable|mimes:png,webp,jpg,gif,jpeg|max:2048',
            'is_special' => 'nullable|boolean',
            'discount' => 'nullable|numeric|min:0|max:100',
        ]);
        $request->price =  str_replace(',', '', $request->price);

        if (!$request->hasFile('image')){
            session()->flash('error', __('messages.product_image_required'));
            return redirect()->back();
        }

        $imagePath = null;
        if ($request->hasFile('image')){
            $imagePath = $request->file('image')->store('products','public');
        }
        $active = $request->has('active') ? 1 : 0;
        $is_special = $request->has('is_special') ? 1 : 0;

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'active' => $active,
            'discount' => $request->discount,
            'is_special' => $is_special,
            'image' => $imagePath
        ]);
        session()->flash('status', __('messages.product_created'));
        return redirect()->back();
    }

    public function index()
    {
        if (!auth()->user()->can('view',Product::class)){
            abort(403, __('messages.product_view_forbidden'));
        }
        $products = Product::with('subCategory')->with('category')->orderBy('id','desc')
            ->paginate(6);
        return view('products.index',compact('products'));
    }

    public function edit(Product $product)
    {
        if (!auth()->user()->can('update',Product::class)){
            abort(403, __('messages.product_update_forbidden'));
        }
        if (!$product){
            session()->flash('error', __('messages.product_not_found'));
            return redirect()->back();
        }

        $categories = Category::with('subCategories')->get();
        return view('products.edit',compact('categories','product'));
    }

    public function update(Product $product, Request $request)
    {
        if (!auth()->user()->can('update',Product::class)){
            abort(403, __('messages.product_update_forbidden'));
        }
        $request->validate([
            'name' =>'string|max:255|required',
            'description' => 'string|required',
            'sub_category_id' => 'required|integer',
            'category_id' => 'required|integer',
            'price' => 'string|required|max:255',
            'stock' => 'integer|nullable',
            'active' => 'integer|nullable',
            'image' => 'image|nullable|mimes:png,jpg,gif,jpeg|max:2048',
            'is_special' => 'nullable|boolean',
            'discount' => 'nullable|numeric|min:0|max:100',
        ]);

        $existingProduct = Product::where('name', $request->name)
            ->where('id', '!=', $product->id)
            ->first();
        if ($existingProduct) {
            session()->flash('error', __('messages.product_name_taken'));
            return redirect()->back();
        }
        $request->price =  str_replace(',', '', $request->price);

        $imagePath = $product->image;
        if ($request->hasFile('image')){
            Storage::delete('app/public/'.$product->image);
            $imagePath = $request->file('image')->store('products','public');
        }
        $active = $request->has('active') ? 1 : 0;
        $is_special = $request->has('is_special') ? 1 : 0;


        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'discount' => $request->discount,
            'is_special' => $is_special,
            'active' => $active,
            'image' => $imagePath
        ]);
        session()->flash('status', __('messages.product_updated'));
        return redirect()->back();

    }

    public function destroy(Product $product)
    {
        if (!auth()->user()->can('delete',Product::class)){
            abort(403, __('messages.product_delete_forbidden'));
        }
        if (!$product){
            session()->flash('error', __('messages.product_not_found'));
        }
        $product->delete();
        session()->flash('status', __('messages.product_deleted'));
        return redirect()->back();
    }
}
