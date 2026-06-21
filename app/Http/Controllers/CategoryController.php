<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function create()
    {
        if (!auth()->user()->can('create', Category::class)) {
            abort(403, __('messages.category_create_forbidden'));
        }

        $categories = Category::orderBy('id', 'desc')->paginate(6);
        return view('category.create',['categories'=>$categories]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user->role == 'admin'){
            $request->validate([
                'name' => 'required|unique:categories,name|string|max:255',
                'description' => 'required|string',
                'image' => 'required|image|mimes:png,webp,jpg,gif,jpeg|max:2048',

            ]);

            if (!$request->hasFile('image')){
                session()->flash('error', __('messages.category_image_required'));
               return redirect()->back();
            }

            $imagePath = null;
            if ($request->hasFile('image')){
                $imagePath = $request->file('image')->store('categories','public');
            }
            Category::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $imagePath,
            ]);
            session()->flash('status', __('messages.category_created'));
            return redirect()->back();
        }

        return redirect()->route('welcome');
    }

    public function edit(Category $category)
    {
        $this->authorize('update', $category);

        return view('category.edit', compact('category'));
    }

    public function update( Category $category,Request $request)
    {
        $this->authorize('update', $category);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:png,webp,jpg,gif,jpeg|max:2048',
        ]);


        if ($request->hasFile('image')) {
            if ($category->image && Storage::exists('public/'.$category->image)) {
                Storage::delete('public/'.$category->image);
            }
            $category->image = $request->file('image')->store('categories', 'public');
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        session()->flash('status', __('messages.category_updated'));
        return redirect()->route('category.create');
    }

    public function destroy(Category $category)
    {
        if (!auth()->user()->can('delete', Category::class)) {
            abort(403, __('messages.category_create_forbidden'));
        }

        if (!$category) {
            session()->flash('error', __('messages.category_not_found'));
            return redirect()->route('category.create');
        }

        $category->subCategories()->delete();
        Storage::delete('public/'.$category->image);
        $category->delete();

        session()->flash('status', __('messages.category_deleted'));
        return redirect()->route('category.create');
    }


}
