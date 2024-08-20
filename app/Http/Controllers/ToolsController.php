<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ToolsController extends Controller
{

  public function index()
  {
    return view('layouts.admin.tools.index');
  }

  public function create(Request $request)
  {
    $languagesData = view()->share('languagesData');
    return view('layouts.admin.tools.create', compact('languagesData'));
  }
}
