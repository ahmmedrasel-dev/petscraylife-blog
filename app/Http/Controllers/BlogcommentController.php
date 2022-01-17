<?php

namespace App\Http\Controllers;

use App\Models\Blog_comment;
use Illuminate\Http\Request;

class BlogcommentController extends Controller
{
  public function blogCommentPost(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required',
      'comments' => 'required|max:400'
    ]);
    $comments = new Blog_comment;
    $comments->post_id = $request->post_id;
    $comments->provider_name = $request->name;
    $comments->provider_email = $request->email;
    $comments->comments = $request->comments;
    $comments->save();

    return back()->with('success', 'Comments Submited Successfully.');
  }
}
