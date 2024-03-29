<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePostLike(Post $post, Request $request)
    {
        if ($post->likedBy($request->user())) {  
            return response(null, 409);
        }
        $post->likes()->create(['user_id' => $request->user()->id]);
        return back();
    }

    public function storeCommentLike(Comment $comment, Request $request)
    {
        if ($comment->likedBy($request->user())) {  
            return response(null, 409);
        }
        $comment->likes()->create(['user_id' => $request->user()->id]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyPostLike(Post $post, Request $request)
    {
        Like::where('likeable_type', 'App\Models\Post')->where('likeable_id', $post->id)->where('user_id', $request->user()->id)->delete();
        return back();
    }

    public function destroyCommentLike(Comment $comment, Request $request)
    {
        Like::where('likeable_type', 'App\Models\Comment')->where('likeable_id', $comment->id)->where('user_id', $request->user()->id)->delete();
        return back();
    }    
    
}
