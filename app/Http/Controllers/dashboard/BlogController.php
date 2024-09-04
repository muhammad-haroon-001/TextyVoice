<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view("admin.custom-page.index");
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {

    return view("admin.blog.create");

  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|string|max:255',
      'view' => 'required|string|max:255',
      'slug' => 'required|string|max:255',
      'key' => 'required|string|max:255',
      'meta_title' => 'nullable|string|max:255',
      'meta_description' => 'nullable|string',
      'sitemap' => 'boolean',
      'contentKey' => 'array',
      'contentValue' => 'array',
      'contentType' => 'array'
    ]);

  }

  /**
   * Display the specified resource.
   */
  public function show(Blog $Blog)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Blog $Blog)
  {
    $page = $Blog;
    return view("admin.custom-page.edit", compact('page'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Blog $Blog)
  {
    return redirect()->route('custom-page.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Blog $Blog)
  {
    $Blog->delete();
    return redirect()->route('custom-page.index');
  }
}
