<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Catalog;
use AppBundle\Entity\Item;
use AppBundle\Form\Type\CatalogType;
use AppBundle\Form\Type\ItemType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template as Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CatalogController extends Controller
{

    /**
     * @Template()
     * @param Catalog $catalog
     * @return array
     * @Route("/catalogs/{id}", name="catalog")
     */
    public function showAction(Catalog $catalog)
    {
        return [
            'catalog'=>$catalog
        ];
    }

    /**
     * @Route("/create-catalog", name="create-catalog")
     * @param  Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createCatalogAction(Request $request)
    {
        $catalog = new Catalog();
        $form = $this->createForm(new CatalogType(), $catalog);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->persist($catalog);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirect($this->generateUrl('app_default_index'));
        }

        return $this->render('AppBundle:Catalog:create.html.twig',
            [
                'form' => $form->createView(),
            ]);
    }

}