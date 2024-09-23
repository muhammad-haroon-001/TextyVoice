<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Emd\Tools;
use Illuminate\Http\Request;

class languageSwitcherController extends Controller
{
    public function Index(Request $request)
    {
        $request->validate([
            'lang' => 'required',
            'slug' => 'required',
        ]);
        $lang = $request->input('lang');
        $slug = $request->input('slug');
        $tool = Tools::where('tool_slug', $slug)->first();
        if ($tool) {
            if($tool->parent_id == 0) {
                $relatedTool = Tools::where('parent_id', $tool->id)->where('language', $lang)->first();
            }else{
                $relatedTool = Tools::where('parent_id', $tool->parent_id)->where('language', $lang)->first();
            }
            if ($relatedTool) {
                return response()->json([
                    'lang' => $lang,
                    'slug' => $relatedTool->tool_slug,
                    'status' => "success",
                    'is_home' => 0
                ]);
            } else {
                $relatedTool = Tools::where('id', $tool->parent_id)
                    ->where('language', $lang)
                    ->first();
                if ($relatedTool) {
                    return response()->json([
                        'lang' => $lang,
                        'slug' => $relatedTool->tool_slug,
                        'status' => "success",
                        'is_home' => 1
                    ]);
                }
            }
        }
        return response()->json(['status' => "fail"]);
    }
}
