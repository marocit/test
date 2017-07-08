<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Link;
use App\Category;
//use Dusterio\LinkPreview\Client;


class TweetsController extends ClientController
{
    public function index()
    {
        $tweets = Tweet::all();
        $links = Link::alL();

        return view('tweets.index', compact('tweets', 'links'));
        //return dd($tweets);
    }

      public function material()
    {
        $tweets = Tweet::all();
        $links = Link::with('categories')->get();

        return view('tweets.material', compact('tweets', 'links'));
        //return dd($tweets);
    }

    public function category(Category $category)
    {
        $categoryName = $category->name;
        $categoryId = $category->id;
        $links = $category->links()->latestFirst()->get();
        //$links = $category::with('links')->orderBy('name', 'asc')->get();

        return view('tweets.categories', compact('links','categoryName', 'categoryId'));

        
    }

    public function category1(Category $category)
    {
        $categoryName = $category->name;
        $categoryId = $category->id;
        $links = $category->links()->latestFirst()->get();
        //$links = $category::with('links')->orderBy('name', 'asc')->get();

        return response($links);

        
    }

    public function maps()
    {
        return view('maps.index');
    }

        public function test()
    {
        $tweets = Tweet::all();
        $links = Link::with('categories')->get();

        return response($links);
        //return dd($tweets);
    }

    public function deleteLink($link) 
    {
        Link::findOrFail($link)->delete();

        return response()->json('Item deleted');
    } 


    public function getURL()
    {
        $linkPrev = $this->obtainURL();

        dd($linkPrev);
    }

      public function getURL2(Request $request)
    {
        

        $url = $request->all();
        $linkPrev = $this->obtainURL2($url['url']);
        
        //dd($url);
        //dd($linkPrev);
        //return $linkPrev->title;
        Link::forceCreate([
            'title' => $linkPrev->title,
            'description' => $linkPrev->description,
            'cover' => $linkPrev->image,
            'url' => $linkPrev->url
        ]);

        return response()->json('Success', 200);

        
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body'  => 'required'
        ]);
            
        
        Tweet::forceCreate([
            'body' => request('body'),
            'user_id' => Auth::User()->id
        ]);

        //Preview::setUrl('https://www.boogiecall.com');
        
        //$tweet = $request->all();
        //$tweet['user_id'] = Auth::User()->id;
        //Auth::user()->tweets()->save($tweet);
        //Tweet::create($tweet);

        //$this->detectLink($tweet);
        

        //return redirect('/admin/customers');
        //return response()->json(['done']);
        //return $input;
        //return redirect()->back();
        return ['message' => 'Tweet created'];
    }

    public function saveLocation(Request $request) 
    {
        
    }

    

    public function author(User $author)
    {
        $authorname = $author->name;


    }

}
