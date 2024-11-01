<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class TinymceController extends Controller
{
    public function upload(Request $request)
    {
        $fileName = time() . $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads', $fileName, 'public');
        return response()->json([
            'location' => env('APP_URL') . Storage::url($path)
        ]); 
        
        /*$imgpath = request()->file('file')->store('uploads', 'public'); 
        return response()->json(['location' => "/storage/$imgpath"]);*/

    }
}
