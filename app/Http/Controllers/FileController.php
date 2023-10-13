<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $disk = $request->input('disk') ?? 'public';
        $file = $request->file('file');
        $path = $file->store('file', $disk);
        $url = Storage::disk($disk)->url($path);

        return [
            'message' => 'Upload file',
            'url' => $url
        ];
    }
}
