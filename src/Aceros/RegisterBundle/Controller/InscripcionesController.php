<?php

namespace Aceros\RegisterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Aceros\RegisterBundle\Entity\Asistentes;
use Aceros\RegisterBundle\Entity\Inscripcion;
use Aceros\RegisterBundle\Form\Type\InscripcionType;
use Symfony\Component\HttpFoundation\Response;

class InscripcionesController extends Controller
{
	public function indexAction()
	{
		$asistentes = new Asistentes();
        $form = $this->createForm(new InscripcionType(), $asistentes);
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
            	$codigo = $asistentes->getCodigobarras();
            	$em = $this->getDoctrine()->getManager();
            	$asistenteentity = $em->getRepository('AcerosRegisterBundle:Asistentes')->findOneBy(array('codigobarras' => $codigo));
            	if ($asistenteentity) {
				}
				else {
					$this->container->get('session')->getFlashBag()->set('danger', 'El codigo de barras no existe');
					return $this->redirect($this->generateUrl('inscripciones'));
				}
            	$inscripcionentity = $asistenteentity->getInscripcion();
            	if ($inscripcionentity) {
            		$this->container->get('session')->getFlashBag()->set('warning', 'La persona ya ha sido registrada anteriormente');
					return $this->redirect($this->generateUrl('inscripciones'));
				}
				else {
				}
				$inscripcion = new Inscripcion();
				$inscripcion->setEstado(1);
				$inscripcion->setAsistentes($asistenteentity);
                $em->persist($inscripcion);
                $em->flush();
				$this->container->get('session')->getFlashBag()->set('success', 'Registro exitoso');
				return $this->redirect($this->generateUrl('inscripciones'));
            }
        }
        return $this->render('AcerosRegisterBundle:Inscripciones:index.html.twig', array('form' => $form->createView()));
	}
}