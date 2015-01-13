<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Catalog;
use AppBundle\Form\Type\CatalogType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template as Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
            'catalog' => $catalog
        ];
    }

    /**
     * @Route("/create-catalog", name="create-catalog")
     * @param  Request $request
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
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

    /**
     * @Route("/catalogs/{id}/update", name="catalog_update")
     * @Template()
     * @param Request $request
     * @param $catalog
     * @return array|RedirectResponse
     */
    public function updateAction(Request $request, Catalog $catalog, $id)
    {
        $form = $this->createForm(new CatalogType(), $catalog);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $this->getDoctrine()
                ->getManager()
                ->flush();
            return $this->redirectToRoute('catalog', array('id' => $id), 301);
        }
        return [
            'catalog' => $catalog,
            'form' => $form->createView(),
        ];
    }
}