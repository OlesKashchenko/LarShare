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

    public function getSharedCount($url = '')
    {
        if (!$url) {
            $url = Request::url();
        }

        $link = 'https://plusone.google.com/_/+1/fastbutton?url='. urlencode($url);

        $data = file_get_contents($link);
        preg_match( '/window\.__SSR = {c: ([\d]+)/', $data, $matches);

        $count = 0;
        if (isset($matches[0])) {
            $count = str_replace( 'window.__SSR = {c: ', '', $matches[0]);
        }

        return $count;
    } // end getSharedCount
}