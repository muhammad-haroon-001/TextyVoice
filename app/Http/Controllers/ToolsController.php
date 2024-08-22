<?php

namespace App\Http\Controllers;

use App\Models\Emd\Tools;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File as FacadesFile;

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
      'contentType' => 'array',
    ]);

    info('Data:', $validatedData);

    $contentData = [];
    $totalItems = count($validatedData['contentKey']);
    for ($index = 0; $index < $totalItems; $index++) {
      if (isset($validatedData['contentValue'][$index]) && isset($validatedData['contentType'][$index])) {
        $key = $validatedData['contentKey'][$index];
        $contentData[$key] = [
          'type' => $validatedData['contentType'][$index],
          'value' => $validatedData['contentValue'][$index],
        ];
      }
    }
    $jsonContent = json_encode($contentData, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

    $directoryPath = resource_path('views/frontend/emd_tool_pages/');
    if (!FacadesFile::exists($directoryPath)) {
      FacadesFile::makeDirectory($directoryPath, 0755, true);
      info('Directory created: ' . $directoryPath);
    } else {
      info('Directory already exists: ' . $directoryPath);
    }

    $filePath = $directoryPath . $validatedData['slug'] . '.blade.php';
    info('Attempting to create file at: ' . $filePath);
    if (!FacadesFile::exists($filePath)) {
      $result = FacadesFile::put($filePath, '@extends(\'main\')');
      info('File creation result: ' . ($result !== false ? 'Success' : 'Failed'));
    } else {
      info('File already exists: ' . $filePath);
    }

    $tool = Tools::create([
      'tool_name' => $validatedData['name'],
      'tool_slug' => $validatedData['slug'],
      'meta_title' => $validatedData['meta-title'],
      'meta_description' => $validatedData['meta-description'],
      'language' => $validatedData['tool-lang'],
      'is_home' => $validatedData['is-home'] ?? 0,
      'parent_id' => $validatedData['tool-parent'],
      'content_keys' => $jsonContent,
    ]);

    if ($tool) {
      return redirect()->route('Emd.tools')->with('success', 'Tool created successfully');
    }

    return redirect()->route('Emd.tools')->with('error', 'Tool not created');
  }


}
