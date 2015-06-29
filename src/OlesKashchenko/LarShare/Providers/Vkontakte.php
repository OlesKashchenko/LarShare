<?php

namespace OlesKashchenko\LarShare\Providers;

use OlesKashchenko\LarShare\Providers\AbstractProvider,
    Illuminate\Support\Facades\Request;


class Vkontakte extends AbstractProvider
{

    protected $provider = 'vk';
    protected $windowWidth  = 590;
    protected $windowHeight = 415;


    public function getUrl()
    {
        $currentUrl = $this->getOption('url', Request::url());

        $url = 'http://vk.com/share.php?'
            . 'url=' . urlencode($currentUrl);

        $title = $this->getOption('title');
        if ($title) {
            $url .= '&title=' . urlencode($title);
        }

        $description = $this->getOption('description');
        if ($description) {
            $url .= '&description=' . urlencode($description);
        }

        $image = $this->getOption('image');
        if ($image) {
            $url .= '&image=' . urlencode($image);
        }

        $noparse = $this->getOption('noparse') ? 'true' : 'false';
        $url .= '&noparse=' . $noparse;

        return $url;
    } // end getUrl

    public function getSharedCount($url = '')
    {
        if (!$url) {
            $url = Request::url();
        }

        $link = 'https://vk.com/share.php?act=count&index=1&url='. urlencode($url);

        $data = file_get_contents($link);
        $data = preg_match('/^VK.Share.count\(\d+,\s+(\d+)\);$/i', $data, $matches);

        $count = 0;
        if (isset($matches[1])) {
            $count = $matches[1];
        }

        return intval($count);
    } // end getSharedCount
}