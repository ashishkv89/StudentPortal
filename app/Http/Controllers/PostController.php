<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Auth;
use App\Notifications\NewPostEditNotification;
use App\Notifications\NewPostDeleteNotification;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderby('created_at', 'desc')->paginate(10);
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
   
        return redirect()->route('dashboard')->with('success', 'The Post is Created.');
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
        if(! Auth::check())
        {
            $cookie_name = (Str::replace('.','',($request->ip())).'-'. $post->id);
        } else 
        {
                $cookie_name = (Auth::user()->id.'-'. $post->id);
        }
        if(Cookie::get($cookie_name) == '')
        {
            $cookie = cookie($cookie_name, '1', 60);
            $post->increment('view_count'); 
            return response()->view('posts.show', ['post' => $post])->withCookie($cookie);
        } else 
        { 
            return view('posts.show', ['post' => $post]);
        }  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $post = Post::findOrFail($id);
        if(auth()->user()->id == $post->user_id || auth()->user()->role_id == 1)
        {
            return view('posts.edit')->with('post', $post);
        }
        else 
        {
            return redirect()->route('posts.show', ['id' => $post->id])->with('success', 'Sorry, you do not have Access to Edit another user\'s Post.');
        }
        
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
            return redirect()->route('posts.show', ['id' => $post->id])->with('success', 'You have Edited the Post. (Own Post)');
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

            $post->user->notify(new NewPostEditNotification($post));

            return redirect()->route('posts.show', ['id' => $post->id])->with('success', 'You have Edited the Post. (Teacher with Administrator Privilege)');
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
            return redirect()->route('dashboard')->with('success', 'You have Deleted the Post. (Own Post)');
        }
        elseif (auth()->user()->role_id == 1) {
            $post->delete();
            $post->user->notify(new NewPostDeleteNotification($post));
            return redirect()->route('posts.index')->with('success', 'You have Deleted the Post. (Teacher with Administrator Privilege)');
        }
        else 
        {
            return redirect()->route('posts.show', ['id' => $post->id])->with('success', 'Sorry, you do not have Access to Delete another user\'s Post.');
        }
    }
}
