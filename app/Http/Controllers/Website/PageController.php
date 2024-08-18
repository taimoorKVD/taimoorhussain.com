<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __invoke(Request $request): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('website.index')
            ->with('home', Home::with(['socialLinks' => function ($query) {
                $query->select('home_id', 'link', 'svg');
            }])
                ->select('id', 'title', 'description', 'bg-image')
                ->first()
                ->toArray()
            );
    }
}
