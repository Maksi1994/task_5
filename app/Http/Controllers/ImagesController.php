<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    public function show(Image $image)
    {
        return response()->download('storage/images/'.$image->name);
    }

    public function destroy(Image $image)
    {
        Image::findOrFail($image->id)->delete();
        Storage::delete($image->name);
        return back();
    }
}
