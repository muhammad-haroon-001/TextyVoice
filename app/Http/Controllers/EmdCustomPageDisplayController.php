<?php

namespace App\Http\Controllers;

use App\Models\CustomPage;
use Illuminate\Http\Request;

class EmdCustomPageDisplayController extends Controller
{
  public function custom_page_display(Request $request)
  {
    // Get the current URL path without the leading slash
    $getURL = url()->current();
    $base = basename($getURL);
    // Retrieve the custom page based on the path
    $page = CustomPage::where('page_key', $base)->first();

    $params = [
      'meta_title' => $page->meta_title,
      'meta_description' => $page->meta_description,
      'content' => json_decode($page->content_keys),
      'language' => $page->language,
      'page' => $page
    ];
    // Return the view with the page data
    return view('frontend.emd_custom_pages.' . $page->blade_view, $params);
  }
}
