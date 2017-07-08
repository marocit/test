<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dusterio\LinkPreview\Client;
use App\Link;
use App\Category;


class LinkPreviewController extends Controller
{
    public function index()
    {
        $links = Link::all();

        return view('links.indexvue', compact('links'));        
    }

      public function getlinks()
    {
        $links = Link::with('categories')->orderBy('id', 'desc')->get();

        return response()->json($links, 200);
    }

    public function getResponseUrl(Request $request)
    {
        $url = $request->all();
        $linkPrev = $this->obtainURL($url['url']);

        //dd($request->all());
        Link::forceCreate([
            'title' => $linkPrev['title'],
            'description' => $linkPrev['description'],
            'cover' => $linkPrev['cover'],
            'url' => $url['url'],
            'category_id' => $url['category']
            
        ]);
        return response()->json('Success', 200);
    }

    protected function getUrl($url)
    {
        $previewClient = new Client($url);
        $response = $previewClient->getPreview('general');
        $response = $response->toArray();
        //$response = json_decode($response);
        //return $decodedContents;
        return $response;
    }

    protected function obtainUrl($url)
    {
        return $this->getUrl($url);
    }
}
