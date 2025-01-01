<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $title = $request->input('title');
    
        $query = Blog::query();
    
        if ($title) {
            $query->where('title', 'like', '%' . $title . '%')
                  ->orWhere('short_content', 'like', '%' . $title . '%')
                  ->orWhere('content', 'like', '%' . $title . '%');
            
        }

    
        $blogs = $query->paginate(5);
    
        return view('blogs.index', compact('blogs', 'title'));
    }
    public function create()
    {
        return view('blogs.create');
    }
    public function store(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'title' => 'required|string|max:255',
            'short_content' => 'required|string',
            'content' => 'nullable|string',
        ]);

        // Create a new blog entry
        Blog::create([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'user_id'=> Auth::user()->id,
        ]);

        // Redirect to the blogs index page with success message
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    }

    /**
     * Display the specified blog.
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id); // Find the blog by ID
        return view('blogs.show', compact('blog')); // Return the view with the blog data
    }

    /**
     * Show the form for editing the specified blog.
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id); // Find the blog by ID
        return view('blogs.edit', compact('blog')); // Return the edit form with blog data
    }

    /**
     * Update the specified blog in storage.
     */
    public function update(Request $request, $id)
    {

        // Validate incoming data
        $request->validate([
            'title' => 'required|string|max:255',
            'short_content' => 'required|string',
            'content' => 'nullable|string',
        ]);


        // Find the blog by ID and update it
        $blog = Blog::findOrFail($id);
        $blog->update([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
        ]);

        // Redirect to the blogs index page with success message
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }

    /**
     * Remove the specified blog from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id); // Find the blog by ID
        $blog->delete(); // Delete the blog

        // Redirect to the blogs index page with success message
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully!');
    }
}
