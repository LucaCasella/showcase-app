<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'yt_video_id' => 'required',
        ]);

        // Create the video
        $video = new Video;
        $video->title = $request->input('title');
        $video->yt_video_id = $request->input('yt_video_id');
        $video->save();

        // Redirect the user and send friendly message
        return redirect()->route('index-video')->with('success', 'Video created successfully');
    }

    public function edit($video_id)
    {
        // Retrieve selected video
        $video = Video::find($video_id);

        return view('backoffice.videos.edit')->with('video', $video);
    }

    public function update(Request $request, $video_id)
    {
        // Validate the input
        $request->validate([
            'title' => 'required',
            'yt_video_id' => 'required',
        ]);

        // Retrieve selected video
        $video = Video::findOrFail($video_id);

        // Update title
        $video->title = $request->title;
        $video->yt_video_id = $request->yt_video_id;
        $video->updated_at = now();

        // Save updates
        $video->save();

        // Redirect the user and send friendly message
        return redirect()->route('index-video')->with('success', 'Video updated successfully');
    }

    public function destroy($video_id)
    {
        // Retrieve and delete selected video
        $video = Video::findOrFail($video_id)->delete();

        // Redirect the user and display success message
        return redirect()->route('index-video')->with('success', 'Video deleted successfully');
    }
}
