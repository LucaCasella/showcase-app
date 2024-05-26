<?php

namespace Service\InstagramAPI;

use Illuminate\Support\Facades\Http;

class InstagramAPI implements InstagramAPIContract
{
    public function getUserID()
    {
        try {
            $response = Http::get('https://graph.instagram.com/v19.0/25134736429475466?fields=id,username&access_token='.env('PLACE_API_KEY')
            );

            if ($response->ok()) {
                return '';
            } else {
                return '';
            }
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getInstagramPhotos() : array | \Exception
    {
        try {
            $response = Http::get('https://graph.instagram.com/v19.0/25134736429475466/media', [
                'fields' => 'id,media_type',
                'access_token' => env('INSTAGRAM_ACCESS_TOKEN')
            ]);

            if ($response->ok()) {
                $data = $response->json();

                $latestAlbums = array_filter($data['data'], function ($album) {
                    return $album['media_type'] !== 'VIDEO';
                });

                $latestAlbums = array_slice($latestAlbums, 0, 4);

                $photos = [];

                foreach ($latestAlbums as $album) {
                    $albumResponse = Http::get("https://graph.instagram.com/{$album['id']}/children", [
                        'fields' => 'id,media_url,permalink',
                        'access_token' => env('INSTAGRAM_ACCESS_TOKEN')
                    ]);

                    if ($albumResponse->ok()) {
                        $albumData = $albumResponse->json();
                        $photos[] = $albumData['data'][0];
                    }
                }

                return $photos;

            } else {
                return [];
            }
        } catch (\Exception $e) {
            return $e;
        }
    }

}
