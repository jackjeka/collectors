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

        return ['catalogs' => $catalogs];
    }
}