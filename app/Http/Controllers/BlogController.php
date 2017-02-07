<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function index() {

    	// get the latest post form the database
    	$blogs = Blog::latest()->get();
    	return view('blog.index', compact('blogs'));
    }

    public function create() {
    	return view('blog.create');
    }

    public function store(Request $request) {
    	$input = $request->all();
    	Blog::create($input);
    	return back();
    }

    public function show($id) {
    	$blog = Blog::findOrFail($id);
    	return view('blog.show', compact('blog'));
    }
}
