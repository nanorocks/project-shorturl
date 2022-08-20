<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\ShortUrl;

use Jenssegers\Agent\Agent;
use App\Http\Requests\StoreUrlRequest;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function store(StoreUrlRequest $request)
    {
        $shortUrl = ShortUrl::where(ShortUrl::URL, $request->url)->first();

        if(!is_null($shortUrl)) {
            return redirect()->back()->with('success', sprintf("%s/%s", config('app.url'),  $shortUrl->uuid));
        }

        $guid = str_replace('-', '', Uuid::uuid4());

        $shortUrl = ShortUrl::create([
            ShortUrl::URL => $request->url,
            ShortUrl::UUID => $guid
        ]);

        return redirect()->back()->with('success', sprintf("%s/%s", config('app.url'),  $shortUrl->uuid));
    }

    public function serveUrl(string $uuid)
    {
        $shortUrl = ShortUrl::where('uuid', $uuid)->first();

        if(is_null($shortUrl)) {
            abort(404);
        }

        return redirect($shortUrl->url);
    }
}
