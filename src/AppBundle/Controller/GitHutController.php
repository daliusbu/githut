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
        $reposData = $this->get('github_api')->getRepos($username);
        return $this->render('githut/index.html.twig',
            [
                'username' => $username,
                    ]
        );
    }

    public function profileAction($username)
    {
        $profileData = $this->get('github_api')->getprofile($username);
        return $this->render('githut/profile.html.twig', $profileData);
    }

    public function reposAction($username){
        $reposData = $this->get('github_api')->getrepos($username);
        return $this->render('githut/repos.html.twig', $reposData);
    }
}