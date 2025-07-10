<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileController extends Controller
{
    public function viewEncrypted($filename): StreamedResponse
    {
        $disk = Storage::disk('encrypted');

        if (!$disk->exists($filename)) {
            abort(404, 'File not found.');
        }

        return response()->streamDownload(function () use ($disk, $filename) {
            echo $disk->get($filename);
        }, $filename);
    }
}
