<?php 
namespace Aceros\RegisterBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class InscripcionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('codigobarras', null, array('label' => ' ', 'translation_domain' => 'FOSUserBundle', 'attr' => array('placeholder' => 'Codigo de barras')));
    }

    public function getName()
    {
        return 'codigo';
    }
}
?>
