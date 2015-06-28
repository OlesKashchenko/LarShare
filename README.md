# LarShare
Social networks share component

#Installation
Add dependency to composer.json:
"require": {
    "oles-kashchenko/lar-share": "0.*"
}

Add to app/config/app.php:
'providers' => array(
//...
    'OlesKashchenko\LarShare\LarShareServiceProvider',
//...
),
'aliases' => array(
//...
    'LarShare' => 'OlesKashchenko\LarShare\Facades\LarShare',
//...
),

Then run commands:
$ php artisan config:publish oles-kashchenko/lar-share
$ php artisan asset:publish oles-kashchenko/lar-share

#Usage
Currently supported networks: google+, facebook, twitter, vkontakte, pinterest.
<a href="{{ SocShare::gplus()->getUrl() }}" target="_blank">Google+</a>
<a href="{{ SocShare::pinterest(['media' => asset('/img/pin.png'), 'description' => 'oh hai'])->getUrl() }}" target="_blank">Pin it!</a>

Or go with js to open share dialog in new window:
{{ SocShare::renderJs() }}

<a onclick="{{ SocShare::vk()->getJs() }}" href="javascript:void(0);">Share me</a>

All available parameteres listed in config file.
