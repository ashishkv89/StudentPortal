<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderby('created_at', 'desc')->paginate(3);
        return view('comments.index', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required',
            'post_id' => 'required'
        ]);

        $post = Post::findorFail($validatedData['post_id']);

        $comment = new Comment;
        $comment->message = $validatedData['message'];
        $comment->post_id = $post->id;
        $comment->user_id = auth()->user()->id;
        $comment->save();
   
        return back()->with('message', 'Comment Added to Post.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.show', ['comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit')->with('comment', $comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required',
            'post_id' => 'required'
        ]);

        $post = Post::findorFail($validatedData['post_id']);

            $comment = new Comment;
            $comment->message = $validatedData['message'];
            $comment->post_id = $post->id;
            $comment->user_id = auth()->user()->id;
            $comment->save();
            return redirect()->route('posts.show', ['id' => $post->id])->with('message', 'You have Edited the Comment');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $post = $comment->post;
        if (auth()->user()->id == $post->user_id) {
            $comment->delete();
            return back()->with('message', 'You have Deleted the Comment. (Own Post)');
        }
        elseif(auth()->user()->id == $comment->user_id)
        {
            $comment->delete();
            return back()->with('message', 'You have Deleted the Comment. (Own Comment)');
        }
        elseif (auth()->user()->role_id == 1) {
            $comment->delete();
            return back()->with('message', 'You have Deleted the Comment. (Teacher with Administrator Privilege)');
        }
        else 
        {
            return back()->with('message', 'Sorry, you do not have Access to Delete another student\'s Comment.');
        }
    }
}
