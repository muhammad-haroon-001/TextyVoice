<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class SettingKeyController extends Controller
{
    public function index()
    {
        $settings = config('setting_key');
        return view('admin.setting.key.index',compact('settings'));
    }
    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'contentKey' => 'required|array',
            'contentValue' => 'required|array',
            'contentType' => 'required|array',
        ]);

        // Get the file path for the config
        $configFilePath = config_path('setting_key.php');

        // Create the file if it doesn't exist
        if (!File::exists($configFilePath)) {
            File::put($configFilePath, "<?php\n\nreturn [\n];");
        }

        // Get the existing config
        $existingConfig = include($configFilePath);

        // Initialize the content data
        $contentData = [];
        $totalItems = count($validatedData['contentKey']);

        // Collect the key-value pairs
        for ($index = 0; $index < $totalItems; $index++) {
            $key = $validatedData['contentKey'][$index];
            $value = $validatedData['contentValue'][$index];
            $contentData[$key] = $value;  // Collect new settings
        }

        // Merge existing and new content
        $updatedConfig = array_merge($existingConfig, $contentData);

        // Build the content for the config file
        $configContent = "<?php\n\nreturn [\n";
        foreach ($updatedConfig as $key => $value) {
            $configContent .= "    '" . addslashes($key) . "' => '" . addslashes($value) . "',\n";
        }
        $configContent .= "];\n";

        // Write the updated config to the file
        File::put($configFilePath, $configContent);

        return redirect()->route('setting-key.index')->with('success', 'Setting Key saved successfully');
    }
    public function show($key)
    {
        $settings = config('setting_key');

        if (array_key_exists($key, $settings)) {
            unset($settings[$key]);
            $filePath = config_path('setting_key.php');
            $fileContent = "<?php\n\nreturn " . var_export($settings, true) . ";\n";
            file_put_contents($filePath, $fileContent);
            Artisan::call('config:cache');
            return redirect()->back()->with('success', 'Setting Key deleted successfully');
        }
        return redirect()->back()->with('fail', 'something went wrong');
    }
}