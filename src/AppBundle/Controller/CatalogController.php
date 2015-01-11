<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Catalog;
use AppBundle\Form\Type\CatalogType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template as Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class CatalogController extends Controller
{

    /**
     * @Template()
     * @param  Catalog $catalog
     * @return array
     */
    public function viewAction(Catalog $catalog)
    {
        return [
            'catalog' => $catalog
        ];
    }

    /**
     * @param Request $request
     * @return Response
     * @Method({"POST", "GET"})
     * @Route("/create-catalog")
     * @Template()
     */
    public function createAction(Request $request)
    {

        $catalog = new Catalog();

        $form = $this->createForm(new CatalogType(), $catalog);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->persist($catalog);
            $this->getDoctrine()->getManager()->flush();
        }

        return [
            'form' => $form->createView(),
        ];
    }
}