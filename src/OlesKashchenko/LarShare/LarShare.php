<?php

namespace OlesKashchenko\LarShare;


class LarShare
{

    public function renderJs()
    {
        return '<script type="text/javascript" src="'. asset('/packages/oles-kashchenko/lar-share/lar-share.js') .'"></script>';
    } // end renderJs

    public function twitter($params = array())
    {
        $entity = new Providers\Twitter($params);

        return $entity;
    } // end twitter

    public function pinterest($params = array())
    {
        $entity = new Providers\Pinterest($params);

        return $entity;
    } // end pinterest

    public function facebook($params = array())
    {
        $entity = new Providers\Facebook($params);

        return $entity;
    } // end facebook

    public function gplus($params = array())
    {
        $entity = new Providers\GooglePlus($params);

        return $entity;
    } // end gplus

    public function vk($params = array())
    {
        $entity = new Providers\Vkontakte($params);

        return $entity;
    } // end vk
}

