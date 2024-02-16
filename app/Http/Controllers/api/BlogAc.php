<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogAc extends Controller
{
  public function index(Request $request)
  {
    $blogs = Blog::with('getCategory', 'getUser')->paginate(10);

    return response()->json($blogs);
  }
  public function detail($slug)
  {
    $blog = Blog::with('getCategory', 'getUser')->where('slug', $slug)->first();

    if (!$blog) {
      return response()->json(['message' => 'Blog not found'], 404);
    }

    return response()->json($blog);
  }
}
