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
    $tools = Tools::with('parent')
      ->select('id', 'tool_name', 'tool_slug', 'parent_id', 'language', 'is_home')
      ->where('deleted_at', null)
      ->get();

    $params = [
      'tools' => $tools
    ];

    return view('admin.tools.index', $params);
  }

  public function create(Request $request)
  {
    $jsonData = file_get_contents(base_path('./resources/languages/languages.json'));
    $languageData = json_decode($jsonData, true);

    $tools = Tools::get();
    $params = [
      'tools' => $tools,
      'languageData' => $languageData
    ];

    return view('admin.tools.create', $params);
  }

  public function store(Request $request)
  {
    $request->merge([
      'is-home' => $request->has('is-home') ? 1 : 0,
  ]);
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
    $isHome = $validatedData['is-home'] ?? 0;
    if (!$isHome) {
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
    }

    $tool = Tools::create([
      'tool_name' => $validatedData['name'],
      'tool_slug' => $validatedData['slug'],
      'meta_title' => $validatedData['meta-title'],
      'meta_description' => $validatedData['meta-description'],
      'language' => $validatedData['tool-lang'],
      'is_home' => $isHome,
      'parent_id' => $validatedData['tool-parent'],
      'content_keys' => $jsonContent,
    ]);

    if ($tool) {
      return redirect()->route('Emd.tools')->with('success', 'Tool created successfully');
    }

    return redirect()->route('Emd.tools')->with('error', 'Tool not created');
  }


  public function destroy($id)
  {
    $tool = Tools::findOrFail($id);
    $tool->delete();

    return redirect()->route('Emd.tools')->with('success', 'Tool deleted successfully');
  }


  public function edit($slug)
  {
    $tool = Tools::where('tool_slug', $slug)->first();
    $jsonData = file_get_contents(base_path('./resources/languages/languages.json'));
    $languageData = json_decode($jsonData, true);

    $params = [
      'tool' => $tool,
      'languageData' => $languageData
    ];
    return view('admin.tools.edit', $params);

  }


  public function update(Request $request, $id)
  {

    $request->merge([
      'is-home' => $request->has('is-home') ? 1 : 0,
  ]);


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
    $isHome = $validatedData['is-home'] ?? 0;
    if (!$isHome) {
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
    }

    $tool = Tools::findOrFail($id);
    $tool->update([
      'tool_name' => $validatedData['name'],
      'tool_slug' => $validatedData['slug'],
      'meta_title' => $validatedData['meta-title'],
      'meta_description' => $validatedData['meta-description'],
      'language' => $validatedData['tool-lang'],
      'is_home' => $isHome,
      'parent_id' => $validatedData['tool-parent'],
      'content_keys' => $jsonContent,
    ]);
    return redirect()->route('Emd.tools')->with('success', 'Tool updated successfully');
  }



  public function trash_tools(Request $request)
  {
    // get soft delte data
    $tools = Tools::onlyTrashed()->get();
    $params = [
        'tools' => $tools,
    ];
    return view('admin.tools.trash', $params);
  }


  public function restore_tool($id)
  {
    $tool = Tools::onlyTrashed()->findOrFail($id);
    $tool->restore();
    return redirect()->route('Emd.tools')->with('success', 'Tool restored successfully');
  }



}
