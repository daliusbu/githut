<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 18.2.10
 * Time: 08.09
 */

namespace AppBundle\Service;

use \GuzzleHttp\Client;


class GuzzleHttpClient implements HttpClientInterface
{
public function get($url){
    $client = new Client();
    $response = $client->request('GET', $url);
    return json_decode($response->getBody()->getContents(), true);
}

public function post($url, $data){
    // Not in use
}
}