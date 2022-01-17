<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Jorenvh\Share\ShareFacade;

class SocialShareController extends Controller
{
  public function index()
  {

    $shareButtons = ShareFacade::page(

      'http://127.0.0.1:8000/',

      'Your share text comes here',

    )
      ->facebook()
      ->twitter()
      ->linkedin()
      ->telegram()
      ->whatsapp()
      ->reddit();
    $posts = Blog::get();

    return view('frontend.pages.post', [
      'shareButtons' => $shareButtons,
      'posts' => $posts,
    ]);
  }
}
