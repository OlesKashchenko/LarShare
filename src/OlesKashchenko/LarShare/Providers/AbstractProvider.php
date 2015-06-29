<?php

namespace OlesKashchenko\LarShare\Providers;

use OlesKashchenko\LarShare\Exceptions\LarShareRequiredInputException,
    Illuminate\Support\Facades\Config,
    Illuminate\Support\Facades\Request;


abstract class AbstractProvider
{

    protected $provider;
    protected $options = array();


    public function __construct($params)
    {
        $this->options = array_merge(Config::get('lar-share::'. $this->provider), $params);
    } // end __construct

    public function getOption($ident, $default = false)
    {
        return $this->options[$ident] ? : $default;
    } // end getOption

    public function getRequiredOption($ident, $default = false)
    {
        $option = $this->getOption($ident, $default);
        if (!$option) {
            throw new LarShareRequiredInputException("SocShare: [{$ident}] option is required for [{$this->provider}].");
        }

        return $option;
    } // end getRequiredOption

    public function getJs()
    {
        return "LarShare.show('". $this->getUrl() ."', ". $this->windowHeight .", ". $this->windowWidth .");";
    } // end getJs

    abstract public function getUrl();
    abstract public function getSharedCount();
}