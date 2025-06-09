<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class BlogController extends Controller
{
    public function index()
    {
        if (!auth()->user()->can('create', Blog::class)){
            abort(403,'شما توانایی افزودن محصول جدید را ندارید.');
        }
        $posts = Blog::with('post')->orderBy('id','desc')
            ->paginate(6);
        $favPosts = Blog::where('favourite', 1)->take(3)->get();
        $favPost1 = $favPosts->get(0);
        $favPost2 = $favPosts->get(1);
        $favPost3 = $favPosts->get(2);

        return view('blog.index', compact('posts', 'favPost1', 'favPost2', 'favPost3'));
    }

    public function create()
    {
        if (!auth()->user()->can('create', Blog::class)){
            abort('403','شما تواینایی ایجاد پست جدید ندارید.');
        }

        return view('blog.create');
    }

    public function store(BlogRequest $request)
    {
        if (!auth()->user()->can('create', Blog::class)) {
            abort(403, 'شما اجازه ایجاد پست جدید را ندارید.');
        }
        $imagePath = null;
        if ($request->hasFile('image')){
            $imagePath = $request->file('image')->store('posts','public');
        }

        Blog::create([
            'title' => $request->title,
            'user_id' => auth()->user()->id,
            'text' => $request->text,
            'image' => $imagePath,
        ]);
        session()->flash('status','پست با موفقیت ثبت شد!');
        return redirect()->route('blog.index');
    }

    public function edit(Blog $post)
    {
        if (!auth()->user()->can('update', Blog::class)){
            abort(403,'شما توانایی ویرایش پست را ندارید.');
        }
        return view('blog.edit',compact('post'));
    }

    public function update(BlogRequest $request, Blog $post)
    {
        if (!auth()->user()->can('update', $post)) {
            abort(403, 'شما اجازه ویرایش این پست را ندارید.');
        }

        $data = $request->validated();

        // Handle new image upload if a new file is selected
        if ($request->hasFile('image')) {
            // Optional: Delete old image if exists
            if ($post->image && \Storage::disk('public')->exists($post->image)) {
                \Storage::disk('public')->delete($post->image);
            }

            $data['image'] = $request->file('image')->store('posts', 'public');
        } else {
            // If no new image uploaded, keep the existing one
            $data['image'] = $post->image;
        }

        $post->update([
            'title' => $data['title'],
            'text' => $data['text'],
            'image' => $data['image'],
        ]);

        session()->flash('status','پست با موفقیت ویرایش شد.');
        return redirect()->route('blog.index');
    }

    public function destroy(Blog $post)
    {
        if (!auth()->user()->can('delete',Blog::class)){
            abort(403,'شما توانایی حذف پست را ندارید.');
        }
        if (!$post){
            session()->flash('error','پست مورد نظر یافت نشد.');
        }
        $post->delete();
        session()->flash('status','محصول مورد نظر با موفقیت حذف شد');
        return redirect()->back();
    }

    public function favourite(Request $request)
    {
        if (!auth()->user()->can('favourite', Blog::class)) {
            abort(403, 'شما توانایی برگزیدن پست را ندارید.');
        }

        $favPosts = array_filter([
            $request->fav_post_1,
            $request->fav_post_2,
            $request->fav_post_3,
        ]);

        if (count($favPosts) !== count(array_unique($favPosts))) {
            session()->flash('error', 'پست‌های انتخابی نمی‌توانند مشابه باشند.');
            return redirect()->back();
        }


        // حذف همه برگزیده‌ها
        Blog::where('favourite', 1)->update(['favourite' => 0]);

        // اعمال برگزیده‌های جدید
        foreach (['fav_post_1', 'fav_post_2', 'fav_post_3'] as $favPostKey) {
            $postId = (int) $request->input($favPostKey);
            if ($postId && Blog::find($postId)) {
                Blog::where('id', $postId)->update(['favourite' => 1]);
            }
        }

        session()->flash('status', 'پست‌های برگزیده با موفقیت آپدیت شدند.');
        return redirect()->back();
    }

    public function show($post)
    {
        $cartQuantity = CartItem::where('user_id', Auth::id())->with('product')->get();
        $cartItems = $cartQuantity->sum('quantity');
        $post = Blog::find($post);
        return view('blog.main',compact('post','cartItems'));
    }

    public function list()
    {
        $cartQuantity = CartItem::where('user_id', Auth::id())->with('product')->get();
        $cartItems = $cartQuantity->sum('quantity');
        $posts = Blog::with('post')->orderBy('id','desc')
            ->paginate(6);
        return view('blog.post_list',compact('posts','cartItems'));
    }



}
