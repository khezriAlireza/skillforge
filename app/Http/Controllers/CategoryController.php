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
            abort(403, 'شما اجازه ایجاد این دسته‌بندی را ندارید.');
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
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            ]);

            if (!$request->hasFile('image')){
                session()->flash('error','تصویری برای دسته انتخاب نکردید.');
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
            session()->flash('status','دسته با موفقیت افزوده شد.');
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
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('image')) {
            if ($category->image && Storage::exists('public/'.$category->image)) {
                Storage::delete('public/'.$category->image);
            }
            $category->image = $request->file('image')->store('categories', 'public');
        }
        $category->update();

        session()->flash('status','دسته با موفقیت ویزایش شد.');
        return redirect()->route('category.create');
    }

    public function destroy(Category $category)
    {
        if (!auth()->user()->can('delete', Category::class)) {
            abort(403, 'شما اجازه ایجاد این دسته‌بندی را ندارید.');
        }

        if (!$category) {
            session()->flash('error','دسته یافت نشد.');
            return redirect()->route('category.create');
        }

        $category->subCategories()->delete();
        Storage::delete('public/'.$category->image);
        $category->delete();

        session()->flash('status','دسته با موفیقت حذف شد.');
        return redirect()->route('category.create');
    }


}
