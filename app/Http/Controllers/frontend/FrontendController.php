<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CustomPage;
use App\Models\Emd\Tools;
use Illuminate\Http\Request;

class FrontendController extends Controller
{


  public function homeTool()
  {
    $tool = Tools::where('is_home', 1)->firstOrFail();
    $params = [
      'meta_title' => $tool->meta_title,
      'meta_description' => $tool->meta_description,
      'content' => json_decode($tool->content_keys),
      'language' => $tool->language,
      'tool' => $tool
    ];
    return view('frontend.home', $params);
  }


  public function native_tools_language($slug = null)
  {

    $tool = Tools::where('tool_slug', $slug)->firstOrFail();
    if ($tool->parent_id !== 0) {
      abort(404);
    }
    $viewName = 'frontend.emd_tool_pages.' . $tool->tool_slug;
    $params = [
      'meta_title' => $tool->meta_title,
      'meta_description' => $tool->meta_description,
      'content' => json_decode($tool->content_keys),
      'language' => $tool->language,
      'tool' => $tool
    ];

    return view($viewName, $params);
  }


  public function other_tools_language($lang, $slug)
{
    $tool = Tools::with('parent')->where('tool_slug', $slug)->where('language', $lang)->firstOrFail();
    $params = [
        'meta_title' => $tool->meta_title,
        'meta_description' => $tool->meta_description,
        'content' => json_decode($tool->content_keys),
        'language' => $tool->language,
        'tool' => $tool
    ];
    if ($tool->parent_id === 0) {
        $viewName = 'frontend.emd_tool_pages.' . $tool->tool_slug;
        return view($viewName, $params);
    } else {
        $parentTool = $tool->parent;
        if ($parentTool) {
            if ($parentTool->is_home == 1) {
                return view('frontend.home', $params);
            } else {
                $viewName = 'frontend.emd_tool_pages.' . $parentTool->tool_slug;
                return view($viewName, $params);
            }
        } else {

            abort(404);
        }
    }
}




  public function showCustomPageBySlug($slug = null)
  {
    // Check if the slug exists in the CustomPage table
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
