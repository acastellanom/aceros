<?php

namespace Aceros\RegisterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Datos
 *
 * @ORM\Table(name="datos")
 * @ORM\Entity
 */
class Datos
{
    /**
     * @ORM\OneToOne(targetEntity="User", inversedBy="datos")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;
    
    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=255)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="codigobarras", type="integer")
     */
    private $codigobarras;

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
     * Set userId
     *
     * @param integer $userId
     * @return Datos
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    
        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Datos
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Datos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    
        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set codigobarras
     *
     * @param integer $codigobarras
     * @return Datos
     */
    public function setCodigobarras($codigobarras)
    {
        $this->codigobarras = $codigobarras;
    
        return $this;
    }

    /**
     * Get codigobarras
     *
     * @return integer
     */
    public function getCodigobarras()
    {
        return $this->codigobarras;
    }

    /**
     * Set user
     *
     * @param Aceros\RegisterBundle\\Entity\User $user
     * @return Datos
     */
    public function setUser(\Aceros\RegisterBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return Aceros\RegisterBundle\\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}