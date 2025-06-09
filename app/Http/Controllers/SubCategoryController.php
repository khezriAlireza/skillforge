<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    public function create()
    {
        if (!auth()->user()->can('create',SubCategory::class)){
            abort(403,'شما اجازه ایجاد زیردسته را ندارید.');
        }
        $categories = Category::all();
        $subCategories = SubCategory::orderBy('id', 'desc')->with('category')->paginate(6);

        return view('subCategory.create',compact('subCategories','categories'));
    }

    public function store(Request $request)
    {
        if (!auth()->user()->can('create',SubCategory::class)){
            abort(403,'شما اجازه ایجاد زیردسته را ندارید.');
        }
        $request->validate([
            'name' => 'required|unique:sub_categories,name|max:255',
            'category_id' => 'required|integer',
        ]);
         SubCategory::create([
             'category_id' => $request->category_id,
             'name' => $request->name,
         ]);
         session()->flash('status','زیر دسته با موفقیت افزوده شد');
         return redirect()->back();
    }

    public function update(Request $request)
    {
        if (!auth()->user()->can('update',SubCategory::class)){
            abort(403,'شما اجازه ویرایش زیردسته را ندارید.');
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
        session()->flash('status','زیردسته با موفقیت ویرایش شد.');
        return redirect()->back();
    }

    public function destroy(SubCategory $subCategory)
    {
        if (!auth()->user()->can('delete',SubCategory::class)){
            abort(403,'شما اجازه ویرایش زیردسته را ندارید.');
        }
        if (!$subCategory){
            session()->flash('error','زیردسته یافت نشد.');
            return redirect()->back();
        }

        $subCategory->products()->delete();
        $subCategory->delete();
        session()->flash('status','زیردسته با موفقیت حذف شد.');
        return redirect()->back();
    }
}
