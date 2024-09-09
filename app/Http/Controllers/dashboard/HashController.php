<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HashController extends Controller
{
    public function index($hash)
    {
        $user = User::where('hash', $hash)->first();

        if (!$user) {
            return redirect('/');
        }

        return redirect()->route('login', ['hash' => $hash]);
    }
}
