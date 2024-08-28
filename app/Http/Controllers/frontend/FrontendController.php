<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Emd\Tools;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

  public function showToolBySlug($slug = null)
  {
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
}
