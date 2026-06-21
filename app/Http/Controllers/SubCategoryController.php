<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function create()
    {
        if (!auth()->user()->can('create',SubCategory::class)){
            abort(403, __('messages.subcategory_create_forbidden'));
        }
        $categories = Category::all();
        $subCategories = SubCategory::orderBy('id', 'desc')->with('category')->paginate(6);

        return view('subCategory.create',compact('subCategories','categories'));
    }

    public function store(Request $request)
    {
        if (!auth()->user()->can('create',SubCategory::class)){
            abort(403, __('messages.subcategory_create_forbidden'));
        }
        $request->validate([
            'name' => 'required|unique:sub_categories,name|max:255',
            'category_id' => 'required|integer',
        ]);
         SubCategory::create([
             'category_id' => $request->category_id,
             'name' => $request->name,
         ]);
         session()->flash('status', __('messages.subcategory_created'));
         return redirect()->back();
    }

    public function update(Request $request)
    {
        if (!auth()->user()->can('update',SubCategory::class)){
            abort(403, __('messages.subcategory_update_forbidden'));
        }

        $request->validate([
            'id' => 'required|integer',
            'name' => 'string|required|unique:sub_categories,name|max:255',
            'category_id' => 'required|integer',
        ]);

        $subCategory = SubCategory::find($request->id);
        $subCategory->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);
        session()->flash('status', __('messages.subcategory_updated'));
        return redirect()->back();
    }

    public function destroy(SubCategory $subCategory)
    {
        if (!auth()->user()->can('delete',SubCategory::class)){
            abort(403, __('messages.subcategory_update_forbidden'));
        }
        if (!$subCategory){
            session()->flash('error', __('messages.subcategory_not_found'));
            return redirect()->back();
        }

        $subCategory->products()->delete();
        $subCategory->delete();
        session()->flash('status', __('messages.subcategory_deleted'));
        return redirect()->back();
    }
}
