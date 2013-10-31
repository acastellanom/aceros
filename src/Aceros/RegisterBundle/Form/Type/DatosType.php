<?php 
namespace Aceros\RegisterBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class DatosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre', null, array('label' => ' ', 'translation_domain' => 'FOSUserBundle', 'attr' => array('placeholder' => 'Nombres Completos', 'class' => 'span12')));
        $builder->add('apellidos', null, array('label' => ' ', 'translation_domain' => 'FOSUserBundle', 'attr' => array('placeholder' => 'Apellidos Completos', 'class' => 'span12')));
    }

    public function getName()
    {
        return 'Datos';
    }
}
?>
