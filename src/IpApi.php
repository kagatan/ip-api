<?php

namespace Kagatan\IpAPI;

class IpAPI
{
    public static function info($ip)
    {
        $url = 'http://ip-api.com/php/'.$ip.'?fields=message,country,countryCode,city,isp';

        //cURL HTTPS POST
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $response = curl_exec($ch);

        // Закроем линк
        curl_close($ch);

        return unserialize($response);
    }
}
