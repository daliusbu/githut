<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 18.2.10
 * Time: 08.05
 */

namespace AppBundle\Service;


interface HttpClientInterface
{
public function get($url);
public function post($url, $data);
}