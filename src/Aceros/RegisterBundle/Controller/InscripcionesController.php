<?php

namespace Aceros\RegisterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Aceros\RegisterBundle\Entity\Datos;
use Aceros\RegisterBundle\Entity\Inscripcion;
use Aceros\RegisterBundle\Form\Type\InscripcionType;
use Symfony\Component\HttpFoundation\Response;

class InscripcionesController extends Controller
{
	public function indexAction()
	{
		$datos = new Datos();
        $form = $this->createForm(new InscripcionType(), $datos);
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
            	$codigo = $datos->getCodigobarras();
            	$em = $this->getDoctrine()->getManager();
            	$datosentity = $em->getRepository('AcerosRegisterBundle:Datos')->findOneBy(array('codigobarras' => $codigo));
            	if ($datosentity) {
				}
				else {
					$this->container->get('session')->getFlashBag()->set('danger', 'El codigo de barras no existe, no subio sus datos personales o no se registro');
					return $this->redirect($this->generateUrl('inscripciones'));
				}
            	$userentity = $datosentity->getUser();
            	$inscripcionentity = $userentity->getInscripcion();
            	if ($inscripcionentity) {
            		$this->container->get('session')->getFlashBag()->set('warning', 'La persona ya ha sido registrada anteriormente');
					return $this->redirect($this->generateUrl('inscripciones'));
				}
				else {
				}
				$inscripcion = new Inscripcion();
				$inscripcion->setEstado(1);
				$inscripcion->setUser($userentity);
                $em->persist($inscripcion);
                $em->flush();
				$this->container->get('session')->getFlashBag()->set('success', 'La persona ha sido registrada exitosamente');
				return $this->redirect($this->generateUrl('inscripciones'));
            }
        }
        return $this->render('AcerosRegisterBundle:Inscripciones:index.html.twig', array('form' => $form->createView()));
	}
}