<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Services\Media\MediaFileService;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => ['required', 'mimes:jpg,png,jpeg', 'max:10240'],
        ]);

        $media = MediaFileService::normalUpload($request->file('file'),
            'medias', null);

        return $this->success_response($media,
            'media has been successfully saved');
    }

    public function destroy(Media $media)
    {
        $media->delete();

        return $this->success_response(null,
            'media has been successfully deleted');
    }
}
