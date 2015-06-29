<?php

namespace OlesKashchenko\LarShare\Providers;

use OlesKashchenko\LarShare\Providers\AbstractProvider,
    Illuminate\Support\Facades\Request;


class Twitter extends AbstractProvider
{

    protected $provider = 'twitter';
    protected $windowWidth  = 550;
    protected $windowHeight = 300;


    public function getUrl()
    {
        $currentUrl = $this->getOption('url', Request::url());

        $url = 'https://twitter.com/share?'
            . 'url=' . urlencode($currentUrl);

        $text = $this->getOption('text');
        if ($text) {
            $url .= '&text=' . urlencode($text);
        }

        $related = $this->getOption('related');
        if ($related) {
            $related = implode(',', $related);
            $url .= '&related=' . urlencode($related);
        }

        $hashtags = $this->getOption('hashtags');
        if ($hashtags) {
            $hashtags = implode(',', $hashtags);
            $url .= '&hashtags=' . urlencode($hashtags);
        }

        $via = $this->getOption('via');
        if ($via) {
            $url .= '&via=' . urlencode($via);
        }

        return $url;
    } // end getUrl

    public function getSharedCount()
    {
        return;
    } // end getSharedCount
}