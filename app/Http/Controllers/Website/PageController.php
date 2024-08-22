<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Home;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __invoke(Request $request): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('website.index')
            ->with('home', Home::select('id', 'title', 'description', 'image', 'social_link')->first()->toArray())
            ->with('about', About::select('title', 'description', 'image', 'skill', 'email', 'contact', 'nationality', 'address')->first()->toArray())
            ->with('services', Service::select('id','title', 'description', 'image', 'detail')->get()->toArray())
            ->with('portfolios', Portfolio::select('id', 'title', 'description', 'category', 'stacks', 'client', 'date', 'url', 'image')->get()->toArray());
    }
}
