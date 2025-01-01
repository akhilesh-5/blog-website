<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        
    }
    public function create()
    {

    }
    public function store(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'comment'=> 'required|string',
            // 'name' => 'required_if:auth,false|string', // Required only for unauthenticated users
            // 'email' => 'required_if:auth,false|email', // Required only for unauthenticated users
        ]);

        if(Auth::check()){
            $name=Auth::user()->name;
            $email=Auth::user()->email;
        }
        else{
            $name=$request->name;
            $email=$request->email;
        }

        // Create a new comment entry
        Comment::create([
            'comment' => $request->comment,
            'blog_id' => $request->blog_id,
            'name' => $name,
            'email' => $email,
        ]);

        // Redirect to the comments index page with success message
        return redirect()->back()->with('success', 'Comment created successfully!');
    }

    /**
     * Display the specified comment.
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified comment.
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id); // Find the comment by ID
        return view('comments.edit', compact('comment')); // Return the edit form with comment data
    }

    /**
     * Update the specified comment in storage.
     */
    public function update(Request $request, $id)
    {

        // Validate incoming data
        $request->validate([
            'comment'=> 'required|string',
        ]);

        if(Auth::check()){
            $name=Auth::user()->name;
            $email=Auth::user()->email;
        }
        else{
            $name=$request->name;
            $email=$request->email;
        }


        // Find the comment by ID and update it
        $comment = Comment::findOrFail($id);
        $comment->update([
            'comment' => $request->comment,
            'name' => $request->name,
            'email' => $email,
        ]);

        // Redirect to the comments index page with success message
        return redirect()->route('blogs.show', ['blog'=>$comment->blog_id])->with('success', 'Comment updated successfully!');
    }

    /**
     * Remove the specified comment from storage.
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id); // Find the comment by ID
        $comment->delete(); // Delete the comment

        // Redirect to the comments index page with success message
        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}
