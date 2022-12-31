<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderby('created_at', 'desc')->paginate(5);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable | mimes:jpg,jpeg,png,gif',
            'view_count' => 'required',
        ]);

        $imagePath=null;
        if($request->hasFile('image'))
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameToSave = $filename.'_'.time().'.'.$extension;
            $imagePath = $request->file('image')->storeAs('images', $filenameToSave, 'public');
        }

        $post = new Post;
        $post->title = $validatedData['title'];
        $post->description = $validatedData['description'];
        $post->view_count = $validatedData['view_count'];
        $post->image = $imagePath;
        $post->user_id = auth()->user()->id;
        $post->save();
   
        return redirect()->route('dashboard')->with('message', 'The Post is Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $post->increment('view_count');
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
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

        $post = Post::findOrFail($id);
        if(auth()->user()->id == $post->user_id)
        {            
            $validatedData = $request->validate([
                   'title' => 'required',
                  'description' => 'required',
                   'image' => 'nullable | mimes:jpg,jpeg,png,gif',
                   'view_count' => 'required',
               ]);
               $post->title = $validatedData['title'];
               $post->description = $validatedData['description'];
               $post->view_count = $validatedData['view_count'];
               $post->user_id = auth()->user()->id;

               if($request->hasFile('image'))
               {
                    $filenameWithExt = $request->file('image')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $filenameToSave = $filename.'_'.time().'.'.$extension;
                    $imagePath = $request->file('image')->storeAs('images', $filenameToSave, 'public');
                    $post->image = $imagePath;
                }
                $post->save();
            return redirect()->route('posts.show', ['id' => $post->id])->with('message', 'You have Edited the Post. (Own Post)');
        }
        elseif (auth()->user()->role_id == 1) 
        {
            $validatedData = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'image' => 'nullable | mimes:jpg,jpeg,png,gif',
                'view_count' => 'required',
            ]);
            $post->title = $validatedData['title'];
            $post->description = $validatedData['description'];
            $post->view_count = $validatedData['view_count'];
            $post->user_id = auth()->user()->id;

            if($request->hasFile('image'))
            {
                 $filenameWithExt = $request->file('image')->getClientOriginalName();
                 $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                 $extension = $request->file('image')->getClientOriginalExtension();
                 $filenameToSave = $filename.'_'.time().'.'.$extension;
                 $imagePath = $request->file('image')->storeAs('images', $filenameToSave, 'public');
                 $post->image = $imagePath;
             }
             $post->save();
            return redirect()->route('posts.show', ['id' => $post->id])->with('message', 'You have Edited the Post. (Teacher with Administrator Privilege)');
        }
        else 
        {
            return redirect()->route('posts.show', ['id' => $post->id])->with('message', 'Sorry, you do not have Access to Edit another student\'s Post.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if(auth()->user()->id == $post->user_id)
        {
            $post->delete();
            return redirect()->route('dashboard')->with('message', 'You have Deleted the Post. (Own Post)');
        }
        elseif (auth()->user()->role_id == 1) {
            $post->delete();
            return redirect()->route('posts.index')->with('message', 'You have Deleted the Post. (Teacher with Administrator Privilege)');
        }
        else 
        {
            return redirect()->route('posts.show', ['id' => $post->id])->with('message', 'Sorry, you do not have Access to Delete another student\'s Post.');
        }
    }
}
