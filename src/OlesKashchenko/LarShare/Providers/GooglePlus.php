<?php

namespace OlesKashchenko\LarShare\Providers;

use OlesKashchenko\LarShare\Providers\AbstractProvider,
    Illuminate\Support\Facades\Request;


class GooglePlus extends AbstractProvider
{

    protected $provider = 'gplus';
    protected $windowWidth  = 490;
    protected $windowHeight = 600;


    public function getUrl()
    {
        $url = 'https://plus.google.com/share?'
            . 'url=' . urlencode($this->getOption('url', Request::url()));

        $language = $this->getOption('hl');
        if ($language) {
            $url .= '&hl=' . $language;
        }

        return $url;
    } // end getUrl

    public function getSharedCount()
    {
        return;
    } // end getSharedCount
}