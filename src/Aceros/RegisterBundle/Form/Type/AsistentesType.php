<?php 
namespace Aceros\RegisterBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AsistentesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre', null, array('label' => ' ', 'translation_domain' => 'FOSUserBundle', 'attr' => array('placeholder' => 'Nombres Completos', 'class' => 'form-control')));
        $builder->add('apellidos', null, array('label' => ' ', 'translation_domain' => 'FOSUserBundle', 'attr' => array('placeholder' => 'Apellidos Completos', 'class' => 'form-control')));
        $builder->add('email', 'email', array('label' => ' ', 'translation_domain' => 'FOSUserBundle', 'attr' => array('placeholder' => 'Email', 'class' => 'form-control')));
    }
    public function getName()
    {
        return 'Datos';
    }
}
?>
