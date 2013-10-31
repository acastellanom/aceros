<?php

namespace Aceros\RegisterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Aceros\RegisterBundle\Entity\Datos;
use Aceros\RegisterBundle\Form\Type\DatosType;
use Symfony\Component\HttpFoundation\Response;

class DatosController extends Controller
{
	public function editAction()
	{
		$user = $this->container->get('security.context')->getToken()->getUser();
		$datos = $user->getDatos();
		if ($datos) {
		}
		else {
			$datos = new Datos();
			$datos->setUser($user);
		}
        $form = $this->createForm(new DatosType(), $datos);
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
            	$idfosuser = $user->getId();
            	$datos->setCodigobarras($idfosuser+20130000);
				$em = $this->getDoctrine()->getManager();
                $em->persist($datos);
                $em->flush();
				$this->container->get('session')->getFlashBag()->set('success', 'Los datos personales se registraron correctamente');
				return $this->redirect($this->generateUrl('fos_user_profile_show'));
            }
        }
        return $this->render('AcerosRegisterBundle:Datos:index.html.twig', array('form' => $form->createView()));
	}
}