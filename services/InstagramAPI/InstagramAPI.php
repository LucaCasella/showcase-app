<?php

namespace Service\InstagramAPI;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Http;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use function MongoDB\BSON\toJSON;

class InstagramAPI implements InstagramAPIContract
{
    private $client;
    private $url;
    private $token;
    public function __construct() {
        $this->client = new Client();
        $this->url = 'https://graph.instagram.com/v19.0/me/media?fields=id,media_type&access_token=';
        $this->token = env('instagram_access_token');
    }

    /**
     * @throws GuzzleException
     */
    public function getInstagramPhoto(): void
    {
//        return $this->client->request('GET', $this->url.$this->token)->getBody();

        $response = Http::get($this->url.$this->token);

        if ($response->successful()) {
            $data = $response->json();
            echo json_decode($data);
//            $var = json_encode($date);
//            dd($var[0]);
//            $var1 = json_decode($var, true);


//            foreach($var1 as $v) {
//                echo $v->media_type;
//            };

        }

        else {
            $statusCode = $response->status();
            $errorMessage = $response->body();
        }
    }
}
