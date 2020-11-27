<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ZipArchive;
use File;
use Illuminate\Support\Facades\Response;

class ZipController extends Controller
{
    public function zipFile()
    {
        $zip= new ZipArchive;
        $fileName='myzip.zip';
        if ($zip->open(public_path($fileName),ZipArchive::CREATE)=== TRUE)
        {
            $files=File::files(public_path('myfiles'));
            foreach ($files as $key => $value)
            {
                $relativeNameInZipFile=basename($value);
                $zip->addFile($value,$relativeNameInZipFile);
            }
            $zip->close();
        }
        return Response::download(public_path($fileName));
    }
}
