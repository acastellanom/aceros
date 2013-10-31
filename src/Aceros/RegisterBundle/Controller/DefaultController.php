<?php

namespace Aceros\RegisterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
        $html = $this->renderView('AcerosRegisterBundle:Default:index2.html.twig');
        return new Response(
		    $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
		    200,
		    array(
		        'Content-Type'          => 'application/pdf; charset=utf-8',
		        'Content-Disposition'   => 'inline; filename="file.pdf"'
		    )
		);
    }
}