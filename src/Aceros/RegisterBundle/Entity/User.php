<?php
namespace Aceros\RegisterBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Datos", mappedBy="user")
     */
    protected $datos;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set datos
     *
     * @param \Aceros\RegisterBundle\Entity\Datos $datos
     * @return User
     */
    public function setDatos(\Aceros\RegisterBundle\Entity\Datos $datos = null)
    {
        $this->datos = $datos;
    
        return $this;
    }

    /**
     * Get datos
     *
     * @return \Aceros\RegisterBundle\Entity\Datos 
     */
    public function getDatos()
    {
        return $this->datos;
    }
}