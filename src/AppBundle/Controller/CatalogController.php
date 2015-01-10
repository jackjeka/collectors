<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template as Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CatalogController extends Controller
{

    /**
     * @param $slug
     * @return array
     * @Route("/{slug}")
     * @Method({"GET"})
     * @Template()
     */

    public function getAction($slug)
    {
        return ['catalog' => $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Catalog')
            ->findOneBySlug($slug)
        ];
    }

}