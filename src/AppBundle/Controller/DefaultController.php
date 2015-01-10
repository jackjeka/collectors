<?php

namespace AppBundle\Controller;

use AppBundle\Repository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Template ()
     * @Route("/")
     * @Method({"GET"})
     */
    public function indexAction(Request $request)
    {
        $catalogs = $this->getDoctrine()->getManager()->getRepository('AppBundle:Catalog')->findAll();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $catalogs,
            $request->query->get('page', 1), 5);
        return ['pagination' => $pagination, 'catalogs' => $catalogs];
    }
}