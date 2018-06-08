<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departement
 *
 * @ORM\Table(name="Departement", uniqueConstraints={@ORM\UniqueConstraint(name="code", columns={"code"})})
 * @ORM\Entity
 */
class Departement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=100, nullable=false)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=3, nullable=false)
     */
    private $code;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Agence", inversedBy="departementid")
     * @ORM\JoinTable(name="zone_chalandise",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Departementid", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Agenceid", referencedColumnName="id")
     *   }
     * )
     */
    private $agenceid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->agenceid = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Departement
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Departement
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Add agenceid
     *
     * @param \AppBundle\Entity\Agence $agenceid
     *
     * @return Departement
     */
    public function addAgenceid(\AppBundle\Entity\Agence $agenceid)
    {
        $this->agenceid[] = $agenceid;

        return $this;
    }

    /**
     * Remove agenceid
     *
     * @param \AppBundle\Entity\Agence $agenceid
     */
    public function removeAgenceid(\AppBundle\Entity\Agence $agenceid)
    {
        $this->agenceid->removeElement($agenceid);
    }

    /**
     * Get agenceid
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAgenceid()
    {
        return $this->agenceid;
    }
}
