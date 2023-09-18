<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $keyword = $request->keyword;
        $date_from = $request->date_from;
        $date_until = $request->date_until;

        if (!empty($date_from) && !empty($date_until)) {
            $posts_query = Post::with('user', 'image')->latest()
                    ->whereDate('created_at', '>=', $date_from)
                    ->whereDate('created_at', '<=', $date_until);
        } elseif(!empty($date_from) && empty($date_until)) {
            $posts_query = Post::with('user', 'image')->latest()
                    ->where('created_at', '>=', $date_from);
        } elseif(empty($date_from) && !empty($date_until)) {
            $posts_query = Post::with('user', 'image')->latest()
                    ->where('created_at', '<=', $date_until);
        } else {
            $posts_query = Post::with('user', 'image')->latest();
        }

        if(!empty($keyword)) {
            $posts = $posts_query
                    ->where(function($query) use($keyword){
                        $query->where('event', 'like', "%{$keyword}%")
                            ->orWhere("emotion", 'like', "%{$keyword}%")
                            ->orWhere("emotion_num", '=', $keyword);
                    })
                    ->paginate(10);
        } else {
            $posts = $posts_query->paginate(10);
        }

        return view('posts.index', ['posts' => $posts, 'keyword' => $keyword, 'date_from' => $date_from, 'date_until' => $date_until]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $post = new Post();

        return view('posts.create', ['post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try{
            $post = new Post();
            $post->user_id = Auth::id();
            $post->event = $request->event;
            $post->emotion = $request->emotion;
            $post->emotion_num = $request->emotion_num;
            $post->save();

            if (!empty($request->file('image'))) {
                $image = new Image();
                $image->name = $request->file('image')->getClientOriginalName();
                $path = Storage::disk('s3')->putFile('/images', $request->file('image'));
                $image->path = Storage::disk('s3')->url($path);
                $post->image()->save($image);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        $this->authorize('update', $post);

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $this->authorize('update', $post);

        DB::beginTransaction();
        try{
            $post->user_id = Auth::id();
            $post->event = $request->event;
            $post->emotion = $request->emotion;
            $post->emotion_num = $request->emotion_num;
            $post->save();

            if (!empty($request->file('image'))) {
                $image_name = $request->file('image')->getClientOriginalName();
                $path = Storage::disk('s3')->putFile('/images', $request->file('image'));
                $image_path =Storage::disk('s3')->url($path);

                if (!empty($post->image)){
                    $post->image->name = $image_name;
                    $post->image->path = $image_path;
                    $post->image->save();
                } else {
                    $image = new Image();
                    $image->name = $image_name;
                    $image->path = $image_path;
                    $post->image()->save($image);
                }
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect(route('posts.index'));
    }
}
