<?php

namespace App\Http\Controllers;

use App\Models\CustomPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;

class CustomPageController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $customPages = CustomPage::select('id', 'name', 'slug', 'page_key', 'blade_view', 'meta_title', 'meta_description')->get();

    $params = [
      'customPages' => $customPages
    ];

    return view("admin.custom-page.index", $params);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {

    return view("admin.custom-page.create");

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
    $isSitemap = $validatedData['sitemap'] ?? 0;
    $directoryPath = resource_path('views/frontend/emd_custom_pages/');
    if (!FacadesFile::exists($directoryPath)) {
      FacadesFile::makeDirectory($directoryPath, 0755, true);
      info('Directory created: ' . $directoryPath);
    } else {
      info('Directory already exists: ' . $directoryPath);
    }
    $filePath = $directoryPath . $validatedData['view'] . '.blade.php';
    info('Attempting to create file at: ' . $filePath);
    if (!FacadesFile::exists($filePath)) {
      $result = FacadesFile::put($filePath, '@extends(\'layouts.frontend.main\')');
      info('File creation result: ' . ($result !== false ? 'Success' : 'Failed'));
    } else {
      info('File already exists: ' . $filePath);
    }

    try {
      $customPage = CustomPage::create([
        'name' => $validatedData['name'],
        'blade_view' => $validatedData['view'],
        'slug' => $validatedData['slug'],
        'page_key' => $validatedData['key'],
        'meta_title' => $validatedData['meta_title'],
        'meta_description' => $validatedData['meta_description'],
        'sitemap' => $isSitemap,
        'content_keys' => $jsonContent,
      ]);

      if ($customPage) {
        $routeDefinition = "Route::get('{$validatedData['slug']}', 'custom_page_display')->name('EmdCustomPage.{$validatedData['slug']}');";

        $routeFilePath = base_path('routes/custom_pages.php');
        $routeFileContent = FacadesFile::get($routeFilePath);
        $insertPosition = strpos($routeFileContent, "});");
        if ($insertPosition !== false) {
          $updatedRouteFileContent = substr_replace($routeFileContent, "    " . $routeDefinition . "\n", $insertPosition, 0);
          FacadesFile::put($routeFilePath, $updatedRouteFileContent);
        } else {
          info("Route group not found in custom_pages.php.");
        }


        return redirect()->route('custom-page.index');
      } else {
        return redirect()->back();
      }

    } catch (\Exception $e) {
      info($e->getMessage());
    }

  }

  /**
   * Display the specified resource.
   */
  public function show(CustomPage $customPage)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(CustomPage $customPage)
  {
    $page = $customPage;
    return view("admin.custom-page.edit", compact('page'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, CustomPage $customPage)
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
    $isSitemap = $validatedData['sitemap'] ?? 0;
    $customPage->update([
      'name' => $validatedData['name'],
      'blade_view' => $validatedData['view'],
      'slug' => $validatedData['slug'],
      'page_key' => $validatedData['key'],
      'meta_title' => $validatedData['meta_title'],
      'meta_description' => $validatedData['meta_description'],
      'sitemap' => $isSitemap,
      'content_keys' => $jsonContent
    ]);
    return redirect()->route('custom-page.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(CustomPage $customPage)
  {
    $customPage->delete();
    return redirect()->route('custom-page.index');
  }


  public function trashPages(Request $request)
  {
    $trashPage = CustomPage::onlyTrashed()->get();
    
  }


  public function download_content_file($id)
  {
    $page = CustomPage::findOrFail($id);
    $content = $page->content_keys;
    $tempFile = tempnam(sys_get_temp_dir(), $page->slug);
    file_put_contents($tempFile, $content);
    $filename = $page->slug . '.json';
    return response()->download($tempFile, $filename)->deleteFileAfterSend(true);
  }
}
