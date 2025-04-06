<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\{About, Home, Portfolio, Service};
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        $domain_name = $request->getHost();

        return response()->json([
            'home' => Home::select('id', 'title', 'description', 'image', 'social_link')->where('domain_name' , $domain_name)->first()->toArray(),
            'about' => About::select('title', 'description', 'image', 'skill', 'email', 'contact', 'nationality', 'address')->where('domain_name' , $domain_name)->first()->toArray(),
            'services' => Service::select('id','title', 'description', 'image', 'detail')->whereJsonContains('domain_name' , $domain_name)->get()->toArray(),
            'portfolios' => Portfolio::select('id', 'title', 'description', 'category', 'stacks', 'client', 'date', 'url', 'image')->whereJsonContains('domain_name' , $domain_name)->get()->toArray()
        ]);

//        return view('website.index')
//            ->with('home', Home::select('id', 'title', 'description', 'image', 'social_link')->first()->toArray())
//            ->with('about', About::select('title', 'description', 'image', 'skill', 'email', 'contact', 'nationality', 'address')->first()->toArray())
//            ->with('services', Service::select('id','title', 'description', 'image', 'detail')->get()->toArray())
//            ->with('portfolios', Portfolio::select('id', 'title', 'description', 'category', 'stacks', 'client', 'date', 'url', 'image')->get()->toArray());
    }
}
