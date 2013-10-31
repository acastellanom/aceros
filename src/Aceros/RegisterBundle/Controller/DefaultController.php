<?php

namespace Aceros\RegisterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Aceros\RegisterBundle\Entity\Datos;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcerosRegisterBundle:Default:index.html.twig', array('name' => $name));
    }
    public function htmlAction()
    {
        return $this->render('AcerosRegisterBundle:Default:index2.html.twig');
    }
    public function pdfAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $datos = $user->getDatos();
        if ($datos) {
        }
        else {
            $this->container->get('session')->getFlashBag()->set('success', 'Primero llene datos personales');
            return $this->redirect($this->generateUrl('datos'));
        }
        $html = $this->renderView('AcerosRegisterBundle:Default:index2.html.twig');
        return new Response(
		    $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
		    200,
		    array(
		        'Content-Type'          => 'application/pdf; charset=UTF-8',
		        'Content-Disposition'   => 'inline; filename="file.pdf"'
		    )
		);
    }
}