<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogAc extends Controller
{
  public function index(Request $request)
  {
    $blogs = Blog::with('getCategory')->paginate(10);

    return response()->json($blogs);
  }
}
