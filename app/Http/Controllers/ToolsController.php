<?php

namespace App\Http\Controllers;

use App\Models\Emd\Tools;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Storage;

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
    // dd($request->all());

    try {
      $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'meta-title' => 'nullable|string|max:255',
        'meta-description' => 'nullable|string',
        'contentKey' => 'array',
        'contentValue' => 'array',
        'contentType' => 'array',
      ]);

      // dd($validatedData);

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

      $tool = Tools::findOrFail($id);
      $tool->update([
        'tool_name' => $validatedData['name'],
        'meta_title' => $validatedData['meta-title'],
        'meta_description' => $validatedData['meta-description'],
        'content_keys' => $jsonContent,
      ]);

      return redirect()->route('Emd.tools')->with('success', 'Tool updated successfully');
    } catch (\Throwable $th) {
      info($th->getMessage());
    }
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

  public function download_content_file($id)
  {
    $tool = Tools::findOrFail($id);
    $content = $tool->content_keys;
    $tempFile = tempnam(sys_get_temp_dir(), $tool->tool_slug);
    file_put_contents($tempFile, $content);
    $filename = $tool->tool_slug . '.json';
    return response()->download($tempFile, $filename)->deleteFileAfterSend(true);
  }


  public function upload_content_file(Request $request, $id)
  {
    try {
      $tool = Tools::findOrFail($id);
      $request->validate([
        'content' => 'required|file|mimes:json',
      ]);
      $fileContent = file_get_contents($request->file('content')->getRealPath());

      $tool->update([
        'content_keys' => $fileContent,
      ]);

      return redirect()->back()->with('success', 'Tool content updated successfully');
    } catch (\Throwable $th) {
      info($th->getMessage());
    }
  }
}
