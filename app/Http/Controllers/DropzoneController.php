<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DropzoneController extends Controller
{
    public function dropzone()
    {
        return view('dropzone');
    }

    public function dropzoneStore(Request $request)
    {
        $image= $request->file('file');
        $imageName= time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        return Response::json([
            'success'=>$imageName
        ]);
    }

}
