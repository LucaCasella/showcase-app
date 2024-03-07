<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        // Retrieve all videos
        $videos = Video::all();
//        dd($videos);
        return view('backoffice.videos.index')->with('videos', $videos);
    }

    public function create()
    {
        return view('backoffice.videos.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validate the input
        $request->validate([
            'title' => 'required',
            'video' => 'required|mimes:mp4'
        ]);

        // Get filename with extension
        $fileNameWithExt = $request->file('video')->getClientOriginalName();

        // Get just the filename
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        // Get extension
        $extension = $request->file('video')->getClientOriginalExtension();

        // Create new filename
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;

        // Upload image
        $path = $request->file('video')->storeAs('public/videos', $fileNameToStore);

        // Create album
        $video = new Video;
        $video->title = $request->input('title');
        $video->video = $fileNameToStore;
        $video->save();

        // Redirect the user and send friendly message
        return redirect()->route('index-video')->with('success', 'Video created successfully');
    }
}
