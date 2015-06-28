<?php

namespace OlesKashchenko\LarShare\Providers;

use OlesKashchenko\LarShare\Providers\AbstractProvider,
    Illuminate\Support\Facades\Request,
    Illuminate\Support\Facades\URL;


class Facebook extends AbstractProvider
{

    protected $provider = 'facebook';
    protected $windowWidth  = 580;
    protected $windowHeight = 325;


    public function getUrl()
    {
        if ($this->getRequiredOption('type') == 'share') {
            return $this->getSimpleShareUrl();
        }

        $url = 'https://www.facebook.com/dialog/share?'
            . 'app_id=' . $this->getRequiredOption('app_id') .'&'
            . 'display=' . $this->getOption('display', 'popup') .'&'
            . 'href=' . urlencode($this->getOption('href', Request::url())) .'&'
            . 'redirect_uri=' . urlencode($this->getOption('redirect_uri', URL::to('_soc-share/close/window')));

        $from = $this->getOption('from');
        if ($from) {
            $url .= '&from=' . $from;
        }

        $to = $this->getOption('to');
        if ($to) {
            $url .= '&to=' . $to;
        }

        $picture = $this->getOption('picture');
        if ($picture) {
            $url .= '&picture=' . urlencode($picture);

            $source = $this->getOption('source');
            if ($source) {
                $url .= '&source=' . urlencode($source);
            }
        }

        $name = $this->getOption('name');
        if ($name) {
            $url .= '&name=' . urlencode($name);
        }

        $caption = $this->getOption('caption');
        if ($caption) {
            $url .= '&caption=' . urlencode($caption);
        }

        $description = $this->getOption('description');
        if ($description) {
            $url .= '&description=' . urlencode($description);
        }

        $properties = $this->getOption('properties');
        if ($properties) {
            $url .= '&properties=' . json_encode($properties);
        }

        $actions = $this->getOption('actions');
        if ($actions) {
            $url .= '&actions=' . json_encode($actions);
        }

        $ref = $this->getOption('ref');
        if ($ref) {
            // FIXME: validate ref
            $url .= '&ref=' . urlencode(implode(',', $ref));
        }

        return $url;
    } // end getUrl

    public function getSimpleShareUrl()
    {
        return 'https://www.facebook.com/share.php?u=' . urlencode($this->getOption('href', Request::url()));
    } // end getSimpleShareUrl
}