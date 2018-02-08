<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 18.1.30
 * Time: 14.12
 */

namespace AppBundle\Controller;


use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;


/**
 *
 * @Route("/lucky")
 */

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number/{max}")
     */
    public function numberAction($max, LoggerInterface $logger)
    {
        $number = mt_rand(0, $max);
        $logger->info('We are logging');
       return $this->render('/lucky/number.html.twig', array(
         'number'=> $number
    ));
    }

    /**
     * @Route ("/blog/{page}", name="blog_list", requirements ={"page":"\d+"}, defaults={"page" : "12"})
     */

    public function blogListAction($page)
    {
        $listOfBlogs = " the list of my blogs:";
        return $this->render('/blog/listAll.html.twig', array(
            'blogList' =>$listOfBlogs,
            'blog1' => '1) Blog No 1',
            'blog2' => '2) Another blog',
            'blog3' => '3) Yet another blog',
            'page' => 'This is page No.'.$page
        ));
    }

    /**
     * @param $blogName
     * @return Response
     * @Route("/blog/{blogName}", name ="blog_show")
     */
 public function showAction($blogName){

        $message = 'you are reading my blog '. $blogName;
        return $this->render('/blog/blogContent.html.twig', array(
            'blog'=>$message,
        ));
 }

    /**
     *
     * @Route ("/test/{testParam}", name ="test_param")
     */
public function test404($testParam){

    $money = null;
    if ($testParam == 1){
        $money = 'Excellent choice! ';
    }


     if (!$money){
         throw $this->createNotFoundException ('Page with slug route ' . $testParam . " NOT FOUND");
     }
     return $this->render('/blog/blogContent.html.twig', array(
         'blog'=>$money)
     );
}


    /**
     * @Route("/redir")
     */
public function redirest(){
    return $this->redirectToRoute("blog_list", array('page'=>9));
}

    /**
     * @Route("/test2")
     */
public function test2(Request $request, SessionInterface $session){
    $req = $request->query->get('name', 'Vardas') . " ";
    $req .= $request->query->get('lname', 'Pavarde') . ", ";
    $req .= $request->query->get('joks', 'karoce!');
    $req .= $session->get('foo');
    $name = $session->get('foo');

    if($name = $session->get('foo') != 'naujiejos'){

        $session->set('foo', $name .= '_bar');
    }



    $this->addFlash('belekas', '1234 You are a perfect man! '.$name);

return $this->render('/blog/blogContent.html.twig', array(
    'blog'=>$req,
));
}

}