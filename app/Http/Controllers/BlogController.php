<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;
use App\Photo;
use Carbon\Carbon;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }

    public function index() 
    {
    	// get the latest post form the database
    	$blogs = Blog::where('status', 1)->latest()->get();
        foreach ($blogs as $blog) {
            $blog->body = strip_tags($blog->body);
        }
    	return view('blog.index', compact('blogs'));
    }

    public function create() 
    {
        $categories = Category::pluck('name', 'id');
    	return view('blog.create', compact('categories'));
    }

    public function store(Request $request) 
    {
    	$input = $request->all();
        $input['slug'] = str_slug($request->title);
        $input['meta_title'] = $request->title;

        if ($file = $request->file('photo_id')) {
            $name = Carbon::now(). '.'. $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['photo' => $name, 'title' => $name]);
            $input['photo_id'] = $photo->id;
        }

    	$blog = Blog::create($input);
        if ($categotyIds = $request->category_id) {
            $blog->category()->sync($categotyIds);
        }
    	return redirect('blog');
    }

    public function show($id) 
    {
    	$blog = Blog::findOrFail($id);
    	return view('blog.show', compact('blog'));
    }

    public function edit($id) 
    {
        $categories = Category::pluck('name', 'id');
        $blog = Blog::findOrFail($id);
        return view('blog.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $id) 
    {
        $input = $request->all();
        $blog = Blog::findOrFail($id);

         if ($file = $request->file('photo_id')) {
                
            if ($blog->photo) {
                unlink('images/' . $blog->photo->photo);
                $blog->photo()->delete('photo');
            }    

            $name = Carbon::now(). '.'. $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['photo' => $name, 'title' => $name]);
            $input['photo_id'] = $photo->id;
        }

        $blog->update($input);
        if ($categotyIds = $request->category_id) {
            $blog->category()->sync($categotyIds);
        }
        return redirect('blog');
    }

    public function destroy(Request $request, $id) 
    {
        $blog = Blog::findOrFail($id);
        $categotyIds = $request->category_id;
        $blog->category()->detach($categotyIds);
        $blog->delete($request->all());
        return redirect('/blog/bin');
    }

    public function bin() 
    {
        $deletedBlogs = Blog::onlyTrashed()->get();
        return view('blog.bin', compact('deletedBlogs'));
    }

    public function restore($id) 
    {
        $restoredBlogs = Blog::onlyTrashed()->findOrFail($id);
        $restoredBlogs->restore($restoredBlogs);
        return redirect('/blog');
    }

    public function destroyBlog($id) 
    {
        $destroyBlog = Blog::onlyTrashed()->findOrFail($id);
        if ($destroyBlog->photo) {
            unlink('images/' . $destroyBlog->photo->photo);
            $destroyBlog->photo()->delete('photo');
        }    
        $destroyBlog->forceDelete($destroyBlog);
        return back();
    }

    public function publish(Request $request, $id) 
    {
        $input = $request->all();
        $blog = Blog::findOrFail($id);
        $blog->update($input);
        return back();
    }
}
