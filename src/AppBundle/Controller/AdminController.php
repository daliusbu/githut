<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 18.2.12
 * Time: 13.39
 */

namespace AppBundle\Controller;

use AppBundle\Form\Type\CustomerFormType;
use AppBundle\Form\Type\OrderFormType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\Email;

class AdminController extends Controller
{

    /**
     * @Route("/orders", name="orders")
     */
    public function listOrdersAction(Request $request)
    {
        $filters = ['item', 'qnt', 'sum', 'date'];

        foreach ($filters as $param) {
            if ($request->get($param) != null) {
                $filter = $request->get($param);
                $filterName = $param;
            }
        }

        if (isset($filter)) {
            $unpagedOrders = $this->getDoctrine()->getRepository('AppBundle:Order')
                ->findBy([
                $filterName =>$filter
                ],
                    ['date' => 'DESC']);
        } else{
            $unpagedOrders = $this->getDoctrine()->getRepository('AppBundle:Order')
                ->findAll();
        }

        $paginator = $this->get('knp_paginator');
        $orders = $paginator->paginate(
            $unpagedOrders,
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );

        return $this->render('Shop/Order/orders.html.twig', [
            'orders' => $orders
        ]);
    }



    /**
     * @Route("/users", name="users")
     */
    public function listUsersAction(Request $request)
    {
        $paginator = $this->get('knp_paginator');
        $unpagedUsers = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();

        $users = $paginator->paginate(
            $unpagedUsers,
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );
        return $this->render('Shop/customList.html.twig', [
            'users' => $users
        ]);
    }

//
//    /**
//     * @Route("/confOrder", name="confOrder")
//     */
//    public function confOrderAction(Request $request)
//    {
//        $orderQnt = $request->get('orderQnt');
//
//        $formOrder = $this->createForm(OrderFormType::class);
//
//        $formOrder->handleRequest($request);
//
//        if ($formOrder->isSubmitted() && $formOrder->isValid()) {
//
//            $em = $this->getDoctrine()->getManager();
//            $order = $formOrder->getData();
//            $em->persist($order);
//            $em->flush();
//            return $this->redirectToRoute('home');
//        }
//
//        return $this->render('Shop/Order/orderConf.html.twig', [
//            'orderQnt'=>$orderQnt,
//            'formOrder' => $formOrder->createView(),
//        ]);
//
//    }


}
