<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;

class TextToSpeechController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:txt,doc,docx|max:2048',
        ]);
        $file = $request->file('file');
        $filePath = $file->getPathname();
        $content = '';

        $extension = $file->getClientOriginalExtension();
        if ($extension === 'txt') {
            $content = file_get_contents($filePath);
        } elseif (in_array($extension, ['doc', 'docx'])) {
            $phpWord = IOFactory::load($filePath);
            $text = '';
            foreach ($phpWord->getSections() as $section) {
                foreach ($section->getElements() as $element) {
                    if (method_exists($element, 'getText')) {
                        $text .= $element->getText() . "\n";
                    }
                }
            }
            $content = $text;
        }
        return response()->json(['content' => $content]);
    }

    public function TextToSpeech(Request $request){
        $request->validate([
            'content' => 'required | string',
            'language' => 'required | string',
        ]);

        $content = $request->input('content');
        $language = $request->input('language');
        if($content == '' || $language == ''){
            return response()->json(['error' => 'Empty content or language']);
        }else{
            return response()->json(['content' => $content, 'language' => $language]);
        }
    }
}
