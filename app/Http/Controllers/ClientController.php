<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ClientController extends Controller
{
    protected function performRequest($method, $url, $parameter = [])
    {
        $client = new Client(['curl' => [CURLOPT_CAINFO => base_path('resources/certs/cacert.pem')]]);

        $response = $client->request($method, $url, $parameter);

        return $response->getBody()->getContents();

    }

    protected function performGetRequest($url)
    {
        $contents = $this->performRequest('GET', $url);
        $decodedContents = json_decode($contents);
        
        return $decodedContents;
        //return response()->json($contents->data);
        
    }

    protected function obtainUrl ()
    {
        $url = public_path(config('linkPreview.linkpreview', 'linkPreview.key'));
        return $this->performGetRequest('http://api.linkpreview.net/?key=5942e7ef52f4c5b3bf4389318384e5ab760ab91faaec9&q=http://heise.de');

        
    }

    protected function obtainUrl2 ($url)
    {
        //$url = public_path(config('linkPreview.linkpreview', 'linkPreview.key'));
        return $this->performGetRequest('http://api.linkpreview.net/?key=5942e7ef52f4c5b3bf4389318384e5ab760ab91faaec9&q='. $url);

        
    }
}
