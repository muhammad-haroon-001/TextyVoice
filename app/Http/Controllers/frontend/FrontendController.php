<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CustomPage;
use App\Models\Emd\Tools;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

  public function showPageBySlug($slug = null)
  {
    // Check if the slug is null or exists in the Tools table
    if (is_null($slug) || Tools::where('tool_slug', $slug)->exists()) {
      if (is_null($slug)) {
        $tool = Tools::where('is_home', 1)->firstOrFail();
      } else {
        $tool = Tools::where('tool_slug', $slug)->firstOrFail();
      }

      if ($tool->is_home == 1) {
        return view('frontend.home', compact('tool'));
      } else {
        $viewName = 'frontend.emd_tool_pages.' . $tool->tool_slug;
        return view($viewName, compact('tool'));
      }
    }

    // If the slug exists in the CustomPage table
    if (CustomPage::where('slug', $slug)->exists()) {
      $customPage = CustomPage::where('slug', $slug)->firstOrFail();
      $viewName = 'frontend.emd_custom_pages.' . $customPage->blade_view;

      $params = [
        'meta_title' => $customPage->meta_title,
        'meta_description' => $customPage->meta_description,
        'content' => json_decode($customPage->content, true),
      ];

      return view($viewName, $params);
    }

    // If the slug doesn't match any records, return a 404 response
    abort(404);
  }

}
