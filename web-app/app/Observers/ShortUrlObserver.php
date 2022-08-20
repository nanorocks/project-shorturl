<?php

namespace App\Observers;

use App\Models\Browser;
use App\Models\ShortUrl;
use Jenssegers\Agent\Agent;

class ShortUrlObserver
{
    /**
     * Handle the ShortUrl "created" event.
     *
     * @param  \App\Models\ShortUrl  $shortUrl
     * @return void
     */
    public function created(ShortUrl $shortUrl)
    {
        $agent = new Agent();

        Browser::create([
            Browser::PLATFORM => $agent->platform(),
            Browser::DEVICE => $agent->device(),
            Browser::BROWSER_TYPE => $agent->browser(),
            Browser::CLIENT_IP => $this->getIPAddress(),
            Browser::SHORTURL_ID => $shortUrl->id
        ]);
    }

    /**
     * Handle the ShortUrl "updated" event.
     *
     * @param  \App\Models\ShortUrl  $shortUrl
     * @return void
     */
    public function updated(ShortUrl $shortUrl)
    {
        //
    }

    /**
     * Handle the ShortUrl "deleted" event.
     *
     * @param  \App\Models\ShortUrl  $shortUrl
     * @return void
     */
    public function deleted(ShortUrl $shortUrl)
    {
        //
    }

    /**
     * Handle the ShortUrl "restored" event.
     *
     * @param  \App\Models\ShortUrl  $shortUrl
     * @return void
     */
    public function restored(ShortUrl $shortUrl)
    {
        //
    }

    /**
     * Handle the ShortUrl "force deleted" event.
     *
     * @param  \App\Models\ShortUrl  $shortUrl
     * @return void
     */
    public function forceDeleted(ShortUrl $shortUrl)
    {
        //
    }

    private function getIPAddress()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }
}
