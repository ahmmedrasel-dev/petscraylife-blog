<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Blog_comment;
use App\Models\Category;
use Illuminate\Http\Request;

class Frontend extends Controller
{
  public function frontendLayout()
  {
    return view('frontend.main-content', [
      'blogs' => Blog::where('status', 1)->latest()->paginate(3),
      'featureBlog' => Blog::where('featurepost_status', 2)->limit(4)->get(),
    ]);
  }

  public function singlePost($slug)
  {
    $blog = Blog::where('slug', $slug)->first();
    $shareButtons = \Share::currentPage()
      ->facebook()
      ->twitter()
      ->linkedin()
      ->telegram()
      ->whatsapp();
    // $posts = Blog::get();


    $blog->increment('post_view');
    $recentpost = Blog::latest()->limit(4)->get();
    $comments = Blog_comment::where('post_id', $blog->id)->where('status', 2)->get();
    $allcategory = Category::where('id', '!=', 1)->get();
    $mostpopular = Blog::orderBy('post_view', 'desc')->limit(5)->get();
    return view('frontend.pages.blog-details', [
      'post' => Blog::where('slug', $slug)->first(),
      'recentposts' => $recentpost,
      'categories' => $allcategory,
      'popularPost' => $mostpopular,
      'comments' => $comments,
      'shareButtons' => $shareButtons,
    ]);
  }


  public function contact()
  {
    return view('frontend.pages.contact');
  }

  public function about()
  {
    return view('frontend.pages.about');
  }
}
