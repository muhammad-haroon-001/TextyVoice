<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpeechToTextController extends Controller
{
    public function downloadAudio(Request $request){
        $audioFile = $request->file('audio_data');
        $fileName = 'recording_' . time() . '.wav';
        $path = public_path('assets/download-audio');

        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $audioFile->move($path, $fileName);

        return response()->json([
            'message' => 'Audio uploaded successfully',
            'file_path' => asset('assets/download-audio/'.$fileName)
        ], 200);
    }

    public function uploadAudio(Request $request){
        if ($request->hasFile('audio_data')) {
            $file = $request->file('audio_data');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/upload-audio');
            $file->move($destinationPath, $fileName);
            return response()->json([
                'message' => 'Audio uploaded successfully',
                'file_path' => asset('assets/upload-audio/' . $fileName),
            ]);
        }

        return response()->json(['error' => 'Audio file upload failed'], 500);
    }
}
