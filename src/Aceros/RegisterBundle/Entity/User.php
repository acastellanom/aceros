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

    /**
     * @ORM\OneToOne(targetEntity="Inscripcion", mappedBy="user")
     */
    protected $inscripcion;

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

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set inscripcion
     *
     * @param \Aceros\RegisterBundle\Entity\Inscripcion $inscripcion
     * @return User
     */
    public function setInscripcion(\Aceros\RegisterBundle\Entity\Inscripcion $inscripcion = null)
    {
        $this->inscripcion = $inscripcion;
    
        return $this;
    }

    /**
     * Get inscripcion
     *
     * @return \Aceros\RegisterBundle\Entity\Inscripcion 
     */
    public function getInscripcion()
    {
        return $this->inscripcion;
    }
}