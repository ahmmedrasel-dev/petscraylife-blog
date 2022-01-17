<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('backend.category.category', [
      'categories' => Category::get(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'category_name' => ['required', 'unique:categories']
    ]);

    $category = new Category;
    $category->category_name = $request->category_name;
    $category->category_slug = Str::slug($request->category_name);
    $category->save();

    return back()->with('success', 'Category Created Successfully');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function show(Category $category)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function edit(Category $category)
  {
    return view('backend.category.edit-category', [
      'category' => $category,
      'allcategories' => Category::get(),
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Category $category)
  {
    $request->validate([
      'category_name' => ['required', 'unique:categories']
    ]);

    $category->category_name = $request->category_name;
    $category->category_slug = Str::slug($request->category_name);
    $category->save();

    return back()->with('success', 'Category Updated Successfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(Category $category)
  {
    $totalblog = Blog::where('category_id', $category->id)->count();

    if ($totalblog > 0) {
      Blog::where('category_id', $category->id)->update([
        'category_id' => 1,
      ]);
    }

    $category->forceDelete();
    return back()->with('success', 'Category Deleted Successfully.');
  }
}
