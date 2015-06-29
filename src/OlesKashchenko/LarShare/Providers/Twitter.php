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

    public function getSharedCount($url = '')
    {
        if (!$url) {
            $url = Request::url();
        }

        $link = 'http://urls.api.twitter.com/1/urls/count.json?url='. urlencode($url);

        $data = file_get_contents($link);
        $data = json_decode($data);

        $count = 0;
        if (isset($data->count)) {
            $count = $data->count;
        }

        return intval($count);
    } // end getSharedCount
}