<?php

namespace Aceros\RegisterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcerosRegisterBundle:Default:index.html.twig', array('name' => $name));
    }
    public function pdfAction($name)
    {
        $html = $this->renderView('AcerosRegisterBundle:Default:index2.html.twig', array('name' => $name));
        return new Response(
		    $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
		    200,
		    array(
		        'Content-Type'          => 'application/pdf',
		        'Content-Disposition'   => 'inline; filename="file.pdf"'
		    )
		);
    }
}