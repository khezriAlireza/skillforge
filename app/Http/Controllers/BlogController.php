<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        if (!auth()->user()->can('create', Blog::class)){
            abort(403, __('messages.product_create_forbidden'));
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
            abort(403, __('messages.blog_create_forbidden'));
        }

        return view('blog.create');
    }

    public function store(BlogRequest $request)
    {
        if (!auth()->user()->can('create', Blog::class)) {
            abort(403, __('messages.blog_create_forbidden'));
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
        session()->flash('status', __('messages.blog_created'));
        return redirect()->route('blog.index');
    }

    public function edit(Blog $post)
    {
        if (!auth()->user()->can('update', Blog::class)){
            abort(403, __('messages.blog_update_forbidden'));
        }
        return view('blog.edit',compact('post'));
    }

    public function update(BlogRequest $request, Blog $post)
    {
        if (!auth()->user()->can('update', $post)) {
            abort(403, __('messages.blog_edit_forbidden'));
        }

        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($post->image && \Storage::disk('public')->exists($post->image)) {
                \Storage::disk('public')->delete($post->image);
            }

            $data['image'] = $request->file('image')->store('posts', 'public');
        } else {
            $data['image'] = $post->image;
        }

        $post->update([
            'title' => $data['title'],
            'text' => $data['text'],
            'image' => $data['image'],
        ]);

        session()->flash('status', __('messages.blog_updated'));
        return redirect()->route('blog.index');
    }

    public function destroy(Blog $post)
    {
        if (!auth()->user()->can('delete',Blog::class)){
            abort(403, __('messages.blog_delete_forbidden'));
        }
        if (!$post){
            session()->flash('error', __('messages.blog_not_found'));
        }
        $post->delete();
        session()->flash('status', __('messages.blog_deleted'));
        return redirect()->back();
    }

    public function favourite(Request $request)
    {
        if (!auth()->user()->can('favourite', Blog::class)) {
            abort(403, __('messages.blog_favourite_forbidden'));
        }

        $favPosts = array_filter([
            $request->fav_post_1,
            $request->fav_post_2,
            $request->fav_post_3,
        ]);

        if (count($favPosts) !== count(array_unique($favPosts))) {
            session()->flash('error', __('messages.blog_favourite_duplicate'));
            return redirect()->back();
        }

        Blog::where('favourite', 1)->update(['favourite' => 0]);

        foreach (['fav_post_1', 'fav_post_2', 'fav_post_3'] as $favPostKey) {
            $postId = (int) $request->input($favPostKey);
            if ($postId && Blog::find($postId)) {
                Blog::where('id', $postId)->update(['favourite' => 1]);
            }
        }

        session()->flash('status', __('messages.blog_favourite_updated'));
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
