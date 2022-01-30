<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DropzoneController extends Controller
{
    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');
        $folder = $request->input('folder');

        if ($folder == 'gallery') {
            $record_folder = 'upload/gallery';
        }

        $imageName = $folder . Str::random(64) . time() . '.' . $image->extension();




        $image->move(public_path($record_folder), $imageName);

        return response()->json(['success' => $imageName]);
    }
}
