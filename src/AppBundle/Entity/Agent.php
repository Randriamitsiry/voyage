<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Agent
 *
 * @ORM\Table(name="Agent", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"email"}), @ORM\UniqueConstraint(name="tel_directe", columns={"tel_directe"})}, indexes={@ORM\Index(name="FKAgent329510", columns={"Agenceid"}), @ORM\Index(name="FKAgent317157", columns={"Userid"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Agent
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
     * @ORM\Column(name="prenom", type="string", length=100, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="initiales", type="string", length=5, nullable=false)
     */
    private $initiales;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_directe", type="string", length=20, nullable=false)
     */
    private $telDirecte;

    /**
     * @var string
     *
     * @ORM\Column(name="horaire", type="string", length=255, nullable=true)
     */
    private $horaire;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Visible_internet", type="boolean", nullable=false)
     */
    private $visibleInternet;

    /**
     * @var integer
     *
     * @ORM\Column(name="Objectif", type="integer", nullable=false)
     */
    private $objectif;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Userid", referencedColumnName="id")
     * })
     */
    private $userid;

    /**
     * @var \Agence
     *
     * @ORM\ManyToOne(targetEntity="Agence")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Agenceid", referencedColumnName="id")
     * })
     */
    private $agenceid;



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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Agent
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Agent
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Agent
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set initiales
     *
     * @param string $initiales
     *
     * @return Agent
     */
    public function setInitiales($initiales)
    {
        $this->initiales = $initiales;

        return $this;
    }

    /**
     * Get initiales
     *
     * @return string
     */
    public function getInitiales()
    {
        return $this->initiales;
    }

    /**
     * Set telDirecte
     *
     * @param string $telDirecte
     *
     * @return Agent
     */
    public function setTelDirecte($telDirecte)
    {
        $this->telDirecte = $telDirecte;

        return $this;
    }

    /**
     * Get telDirecte
     *
     * @return string
     */
    public function getTelDirecte()
    {
        return $this->telDirecte;
    }

    /**
     * Set horaire
     *
     * @param string $horaire
     *
     * @return Agent
     */
    public function setHoraire($horaire)
    {
        $this->horaire = $horaire;

        return $this;
    }

    /**
     * Get horaire
     *
     * @return string
     */
    public function getHoraire()
    {
        return $this->horaire;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Agent
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set visibleInternet
     *
     * @param boolean $visibleInternet
     *
     * @return Agent
     */
    public function setVisibleInternet($visibleInternet)
    {
        $this->visibleInternet = $visibleInternet;

        return $this;
    }

    /**
     * Get visibleInternet
     *
     * @return boolean
     */
    public function getVisibleInternet()
    {
        return $this->visibleInternet;
    }

    /**
     * Set objectif
     *
     * @param integer $objectif
     *
     * @return Agent
     */
    public function setObjectif($objectif)
    {
        $this->objectif = $objectif;

        return $this;
    }

    /**
     * Get objectif
     *
     * @return integer
     */
    public function getObjectif()
    {
        return $this->objectif;
    }

    /**
     * Set userid
     *
     * @param \AppBundle\Entity\User $userid
     *
     * @return Agent
     */
    public function setUserid(\AppBundle\Entity\User $userid = null)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return \AppBundle\Entity\User
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set agenceid
     *
     * @param \AppBundle\Entity\Agence $agenceid
     *
     * @return Agent
     */
    public function setAgenceid(\AppBundle\Entity\Agence $agenceid = null)
    {
        $this->agenceid = $agenceid;

        return $this;
    }

    /**
     * Get agenceid
     *
     * @return \AppBundle\Entity\Agence
     */
    public function getAgenceid()
    {
        return $this->agenceid;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function uploadPhoto()
    {
        if ($this->getPhoto() instanceof UploadedFile) {
            $fileName = md5(uniqid()).'.'.$this->getPhoto()->guessExtension();
            try {
                $this->photo->move("../web/images/agent", $fileName);
            } catch (\Exception $exception) {
                throw $exception;
            }
            $this->setPhoto($fileName);
        }
    }
}
