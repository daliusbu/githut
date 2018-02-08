<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 18.2.8
 * Time: 16.17
 */

namespace AppBundle\Service;

use GuzzleHttp;

class GithubApi
{

    public function getProfile($username)
    {
        $client = new GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.github.com/users/' . $username);
//        dump($response->getBody()->getContents());
        $data = json_decode($response->getBody()->getContents(), true);

        return ['avatar_url' => $data['avatar_url'],
            'name' => $data['name'],
            'login' => $data['login'],
            'details' => [
                'company' => $data['company'],
                'location' => $data['location'],
                'joined_on' => 'Joined on ' . (new \DateTime($data['created_at']))->format('Y-m-d'),
            ],
            'blog' => 'Mano blogas',
            'social_data' => [
                "Public Repos" => $data['public_repos'],
                "Followers" => $data['followers'],
                "Following" => $data['following'],
            ],
        ];
    }
}