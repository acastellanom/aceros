<?php
namespace Aceros\RegisterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscripcion
 *
 * @ORM\Table(name="inscripcion")
 * @ORM\Entity
 */
class Inscripcion
{
    /**
     * @ORM\OneToOne(targetEntity="Asistentes", inversedBy="inscripcion")
     * @ORM\JoinColumn(name="asistentes_id", referencedColumnName="id")
     */
    protected $asistentes;

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
    private $asistentesId;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="boolean")
     */
    private $estado;

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
     * Set asistentesId
     *
     * @param integer $asistentesId
     * @return Inscripcion
     */
    public function setAsistentesId($asistentesId)
    {
        $this->asistentesId = $asistentesId;
    
        return $this;
    }

    /**
     * Get asistentesId
     *
     * @return integer 
     */
    public function getAsistentesId()
    {
        return $this->asistentesId;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Inscripcion
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set asistentes
     *
     * @param \Aceros\RegisterBundle\Entity\Asistentes $asistentes
     * @return Inscripcion
     */
    public function setAsistentes(\Aceros\RegisterBundle\Entity\Asistentes $asistentes = null)
    {
        $this->asistentes = $asistentes;
    
        return $this;
    }

    /**
     * Get asistentes
     *
     * @return \Aceros\RegisterBundle\Entity\Asistentes 
     */
    public function getAsistentes()
    {
        return $this->asistentes;
    }
}