<?php

namespace OlesKashchenko\LarShare\Providers;

use OlesKashchenko\LarShare\Providers\AbstractProvider,
    Illuminate\Support\Facades\Request;


class Pinterest extends AbstractProvider
{

    protected $provider = 'pinterest';
    protected $windowWidth  = 700;
    protected $windowHeight = 300;


    public function getUrl()
    {
        $currentUrl = $this->getOption('url', Request::url());
        $description = $this->getOption('description', Request::url());

        $url = 'https://www.pinterest.com/pin/create/button/?'
            . 'url=' . urlencode($currentUrl) .'&'
            . 'description=' . urlencode($description);

        $media = $this->getRequiredOption('media');
        $url .= '&media=' . urlencode($media);

        return $url;
    } // end getUrl

    public function getSharedCount()
    {
        return;
    } // end getSharedCount
}