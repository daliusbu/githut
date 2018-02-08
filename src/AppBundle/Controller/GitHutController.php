<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 18.2.7
 * Time: 14.19
 */

namespace AppBundle\Controller;

use AppBundle\Service\GithubApi;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use GuzzleHttp;

class GitHutController extends Controller
{

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/{username}", name ="githut", defaults={"username":"daliusbu"})
     */
    public function githutAction(Request $request, $username)
    {

       $data = (new GithubApi())->getProfile($username);


        return $this->render('githut/index.html.twig',
            [

                'repo_count'    => 10, //     $data['repo_count'],
                'most_stars'    => 20,  //   $data['most_stars'],
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