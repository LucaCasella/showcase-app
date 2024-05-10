<?php

namespace App\Http\Controllers;

use App\Events\StorageLinkEvent;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function create($album_id)
    {
        // Retrieve the album
        $album = Album::find($album_id);

        // Retrieve related images
        $photos = $album->children;

        return view('backoffice.images.create')->with(['album' => $album, 'photos' => $photos]);
    }

    public function store(Request $request, $album_id)
    {;
        // Validate the input
        $request->validate([
            'photos.*' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        if ($request->hasFile('photos')) {

            $photos = $request->file('photos');

            foreach ($photos as $uploadedPhoto) {

                // Get filename with extension
                $fileNameWithExt = $uploadedPhoto->getClientOriginalName();

                // Get just the filename
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

                // Get extension
                $extension = $uploadedPhoto->getClientOriginalExtension();

                // Create new filename
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

                $path = $uploadedPhoto->storeAs('public/photos/'.$album_id, $fileNameToStore);

                $photo = new Photo();
                $photo->album_id = $album_id;
                $photo->name = $fileNameToStore;
                $photo->photo = $fileNameToStore;
                $photo->save();
                event(new StorageLinkEvent());
            }
        }

        // Redirect the user and send friendly message
        return redirect()->route('index-album')->with('success', 'Photos uploaded');
    }
}
