<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('backend.blogs.blogs', [
      'blogs' => Blog::orderBy('id', 'desc')->simplepaginate(5),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('backend.blogs.add-blog', [
      'categories' => Category::where('id', '!=', 1)->get(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // Blog Thumbnail Image Uploaded
    $thumbnail_img = $request->file('thumbnail');
    $thunmailName = Str::slug($request->blog_title) . '-' . random_int(1, 1000) . '.' . $thumbnail_img->getClientOriginalExtension();
    Image::make($thumbnail_img)->save('backend-assets/upload_images/thumbnail/' . $thunmailName);
    $thumbnail = 'backend-assets/upload_images/thumbnail/' . $thunmailName;

    // Blog Feature Image Uploaded.
    $feature_img = $request->file('feature_image');
    $feature_img_name = Str::slug($request->blog_title) . '-' . random_int(1, 1000) . '-' . $feature_img->getClientOriginalExtension();
    Image::make($feature_img)->save('backend-assets/upload_images/feature_img/' . $feature_img_name);
    $feature_img_location = 'backend-assets/upload_images/feature_img/' . $feature_img_name;

    $blog = new Blog;
    $blog->category_id = $request->category_id;
    $blog->blog_title = $request->blog_title;
    $blog->slug = $request->slug;
    $blog->thumbnail_image = $thumbnail;
    $blog->feature_image = $feature_img_location;
    $blog->blog_details = $request->blog_details;
    $blog->save();

    $blogTag = $request->tags;
    foreach ($blogTag as $key => $value) {
      $tag = new Tag;
      $tag->blog_id = $blog->id;
      $tag->tag_name = $value;
      $tag->save();
    }

    return back()->with('success', 'Blog Created Successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Blog  $blog
   * @return \Illuminate\Http\Response
   */
  public function show(Blog $blog)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Blog  $blog
   * @return \Illuminate\Http\Response
   */
  public function edit(Blog $blog)
  {
    return view('backend.blogs.edit-blog', [
      'blog' => $blog,
      'categories' => Category::where('id', '!=', 1)->get(),
      'tags' => Tag::where('blog_id', $blog->id)->get(),
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Blog  $blog
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Blog $blog)
  {
    // return $request->all();
    if ($request->hasFile('thumbnail')) {
      $oldThumbnail = $blog->thumbnail_image;
      if (file_exists($oldThumbnail)) {
        unlink($oldThumbnail);
      }
      $new_thumbnail_img = $request->file('thumbnail');
      $new_thunmail_name = Str::slug($request->blog_title) . '-' . random_int(1, 1000) . '.' . $new_thumbnail_img->getClientOriginalExtension();
      Image::make($new_thumbnail_img)->save('backend-assets/upload_images/thumbnail/' . $new_thunmail_name);
      $new_thumbnail = 'backend-assets/upload_images/thumbnail/' . $new_thunmail_name;
      $blog->thumbnail_image = $new_thumbnail;
    } else if ($request->hasFile('feature_image')) {
      $old_feature_img = $blog->feature_image;
      if (file_exists($old_feature_img)) {
        unlink($old_feature_img);
      }
      $new_feature_img = $request->file('feature_image');
      $new_feature_img_name = Str::slug($request->blog_title) . '-' . random_int(1, 1000) . '.' . $new_feature_img->getClientOriginalExtension();
      Image::make($new_feature_img)->save('backend-assets/upload_images/feature_img/' . $new_feature_img_name);
      $new_feature_img_location = 'backend-assets/upload_images/feature_img/' . $new_feature_img_name;
      $blog->feature_image = $new_feature_img_location;
    }

    $blog->blog_title = $request->blog_title;
    $blog->category_id = $request->category_id;
    $blog->blog_title = $request->blog_title;
    $blog->slug = $request->slug;
    $blog->blog_details = $request->blog_details;
    $blog->save();

    // Kono Post a jodi Insert Korar somoy tag use na kora hoy tahole Edit korar somoy tag add kora jabe. 
    if ($request->has('blogtags')) {
      $blogTag = $request->blogtags;
      foreach ($blogTag as $key => $value) {
        $tag = new Tag;
        $tag->blog_id = $blog->id;
        $tag->tag_name = $value;
        $tag->save();
      }
    } else {
      if ($request->tags != null) {
        $blogTag = $request->tags;
        foreach ($blogTag as $key => $value) {
          $tag = Tag::findOrFail($request->tag_id[$key]);
          $tag->blog_id = $blog->id;
          $tag->tag_name = $value;
          $tag->save();
        }
      }
    }

    return back()->with('success', 'Blog Updated Successfully.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Blog  $blog
   * @return \Illuminate\Http\Response
   */
  public function destroy(Blog $blog)
  {
    $blog->delete();
    return back()->with('success', 'Blog Deleted Successfully.');
  }

  /**
   *  Display Trashed List Date.
   * 
   */

  public function blogTrash()
  {
    return view('backend.blogs.trash-blog', [
      'blogsTrash' => Blog::onlyTrashed()->get(),
    ]);
  }

  /**
   *  Restore Post Form Trashed List.
   */

  public function blogRestore($id)
  {
    Blog::withTrashed()->where('id', $id)->restore();
    return back();
  }

  /**
   *  Permanently Delete Blog Post From Trashed List.
   */

  public function blogDelete($id)
  {
    Tag::where('blog_id', $id)->forceDelete();
    $thumbnail = Blog::onlyTrashed()->findOrFail($id)->thumbnail_image;
    unlink($thumbnail);
    $featureimg = Blog::onlyTrashed()->findOrFail($id)->feature_image;
    unlink($featureimg);
    Blog::onlyTrashed()->findOrFail($id)->forceDelete();
    return back();
  }

  // Blog Active and Deactive Code.
  public function blogStatus($id, $status)
  {
    if ($status == 1) {
      Blog::where('id', $id)->update(['status' => 2]);
    } elseif ($status == 2) {
      Blog::where('id', $id)->update(['status' => 1]);
    }
  }

  // Blog Feature and General Post.
  public function blogFeaturePost($id, $postid)
  {
    if ($postid == 1) {
      Blog::where('id', $id)->update(['featurepost_status' => 2]);
    } elseif ($postid == 2) {
      Blog::where('id', $id)->update(['featurepost_status' => 1]);
    }
  }
}
