<?php

namespace App\Http\Controllers;

use App\Models\Emd\Tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ToolsController extends Controller
{

  public function index()
  {
    return view('admin.tools.index');
  }

  public function create(Request $request)
  {
    $jsonData = file_get_contents(base_path('./resources/languages/languages.json'));
    $languageData = json_decode($jsonData, true);

    $tools = Tools::get();
    // dd($tools);
    $params = [
      'tools' => $tools,
      'languageData' => $languageData
    ];

    return view('admin.tools.create', $params);
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|string|max:255',
      'slug' => 'required|string|max:255',
      'is-home' => 'boolean',
      'meta-title' => 'nullable|string|max:255',
      'meta-description' => 'nullable|string',
      'tool-lang' => 'required|string|max:10',
      'tool-parent' => 'nullable|integer',
      'contentKey' => 'array',
      'contentValue' => 'array',
    ]);

    info('Data:', $validatedData);


    $contentData = [];
    if (isset($validatedData['contentKey']) && isset($validatedData['contentValue'])) {
        foreach ($validatedData['contentKey'] as $index => $key) {
            if (isset($validatedData['contentValue'][$index])) {
                $contentData[$key] = $validatedData['contentValue'][$index];
            }
        }
    }

    $jsonContent = json_encode($contentData);

    $tool = Tools::create([
      'tool_name' => $validatedData['name'],
      'tool_slug' => $validatedData['slug'],
      'meta_title' => $validatedData['meta-title'],
      'meta_description' => $validatedData['meta-description'],
      'language' => $validatedData['tool-lang'],
      'is_home' => $validatedData['is-home'] ?? 0,
      'parent_id' => $validatedData['tool-parent'],
      'content_keys' => $jsonContent
    ]);


    if ($tool) {
      return redirect()->route('Emd.tools')->with('success', 'Tool created successfully');
    }

    return redirect()->route('Emd.tools')->with('error', 'Tool not created');
  }
}
