<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 18.2.7
 * Time: 14.19
 */

namespace AppBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use GuzzleHttp;

class GitHutController extends Controller
{

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name ="githut")
     */
    public function githutAction(Request $request)
    {

        $client = new GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.github.com/users/daliusbu');
        dump($response);


        return $this->render('githut/index.html.twig',
            [
                'avatar_url' => 'https://avatars0.githubusercontent.com/u/25664565?v=4',
                'name' => 'Dalius',
                'login' => 'daliusbu',
                'details' => [
                    'company' => "Kompanija",
                    'location' => 'Kaunas',
                    'joined_on' => 'Jonied on 2017.02.02',
                ],
                'blog' => 'Mano blogas',
                'social_data' => [
                    "Public Repos" => 12,
                    "Followers" => 10,
                    "Following" => 30,
                ],
                'repo_count'=>5,
                'most_stars'=>4,
                'repos' =>[
                    [
                        'name'=> 'debugger',
                        'url' => 'https://api.github.com/users/daliusbu',
                        'stargazers_count'=> 20,
                        'description'=>'Learn Symfony',
                    ],
                    [
                        'name'=> 'Hello World',
                        'url' => 'https://github.com/daliusbu/hello-world',
                        'stargazers_count'=> 10,
                        'description'=>'First git',
                    ],
                    [
                        'name'=> 'Java',
                        'url' => 'https://github.com/daliusbu/JavaFx2',
                        'stargazers_count'=> 20,
                        'description'=>'Learn Symfony',
                    ],

                ],
            ]
            );
    }


    /**
     * @param Request $request
     * @Route("/profile", name ="profile")
     */
    public function profileAction(Request $request)
    {

        return $this->render('githut/profile.html.twig', [
                'avatar_url' => 'https://avatars0.githubusercontent.com/u/25664565?v=4',
                'name' => 'Dalius',
                'login' => 'daliusbu',
                'details' => [
                    'company' => "Kompanija",
                    'location' => 'Kaunas',
                    'joined_on' => 'Jonied on 2017.02.02',
                ],
                'blog' => 'Mano blogas',
                'social_data' => [
                    "Public Repos" => 12,
                    "Followers" => 10,
                    "Following" => 30,
                ],

            ]
        );
    }
}