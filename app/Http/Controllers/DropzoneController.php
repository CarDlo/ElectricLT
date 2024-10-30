<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropzoneController extends Controller
{

    public function store(Request $request){
        
        $image = $request->file('file');
        $imageName = time().rand(1,1000).'.'.$image->extension();
        $image->move(public_path('images'), $imageName);

        return response()->json(['success' => $imageName]);
    }

}
