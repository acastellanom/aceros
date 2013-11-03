<?php

namespace Aceros\RegisterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Aceros\RegisterBundle\Entity\Asistentes;
use Aceros\RegisterBundle\Form\Type\AsistentesType;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $asistentes = new Asistentes();
        $form = $this->createForm(new AsistentesType(), $asistentes);
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $repository = $this->getDoctrine()
                    ->getRepository('AcerosRegisterBundle:Asistentes');
                $query = $repository->createQueryBuilder('p')
                    ->orderBy('p.id', 'DESC')
                    ->setMaxResults(1)
                    ->getQuery();
                $asistententity = $query->getSingleResult();
                $asiscodlast = $asistententity->getCodigobarras();
                $asistentes->setCodigobarras($asiscodlast+1);
                $usuarionombre1 = rand(0,99999999999999999);
                $usuarionombre2 = rand(0,99999999999999999);
                $usuarionombre = $usuarionombre1.'_'.$usuarionombre2;
                $em = $this->getDoctrine()->getManager();
                $pdffile = $em->getRepository('AcerosRegisterBundle:Asistentes')->findBy(array('pdf' => $usuarionombre));
                while ($pdffile) {
                    $usuarionombre1 = rand(0,99999999999999999);
                    $usuarionombre2 = rand(0,99999999999999999);
                    $usuarionombre = $usuarionombre1.'_'.$usuarionombre2;
                    $pdffile = $em->getRepository('AcerosRegisterBundle:Asistentes')->findBy(array('pdf' => $usuarionombre));
                }
                $asistentes->setPdf($usuarionombre);
                $em->persist($asistentes);
                $em->flush();
                $this->get('knp_snappy.pdf')->generateFromHtml(
                    $this->renderView(
                        'AcerosRegisterBundle:Default:pdf.html.twig',
                        array(
                            'datos'  => $asistentes
                        )
                    ),
                    'pdf/'.$usuarionombre.'.pdf'
                );

                $this->container->get('session')->getFlashBag()->set('success', 'Registro correctamente, pdf creado');
                return $this->redirect($this->generateUrl('homepage'));
            }
        }
        return $this->render('AcerosRegisterBundle:Default:index.html.twig', array('form' => $form->createView()));
    }
    public function htmlAction()
    {
        return $this->render('AcerosRegisterBundle:Default:pdf.html.twig');
    }
}