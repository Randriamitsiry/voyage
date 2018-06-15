<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Agence.
 *
 * @ORM\Table(name="Agence", uniqueConstraints={@ORM\UniqueConstraint(name="telephone", columns={"telephone"}), @ORM\UniqueConstraint(name="email", columns={"email"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Agence
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=20, nullable=false)
     */
    private $telephone;

    /**
     * @var int
     *
     * @ORM\Column(name="siret", type="integer", nullable=false)
     */
    private $siret;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=false)
     */
    private $photo;


    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     */
    private $adresse;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Departement", mappedBy="agenceid")
     */
    private $departementid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="Agent", mappedBy="agenceid")
     */
    private $agents;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Translation\AgenceTranslation", mappedBy="agence")
     */
    private $translations;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->departementid = new ArrayCollection();
        $this->agents = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set telephone.
     *
     * @param string $telephone
     *
     * @return Agence
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone.
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set siret.
     *
     * @param int $siret
     *
     * @return Agence
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * Get siret.
     *
     * @return int
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return Agence
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set photo.
     *
     * @param string $photo
     *
     * @return Agence
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo.
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Add departementid.
     *
     * @param \AppBundle\Entity\Departement $departementid
     *
     * @return Agence
     */
    public function addDepartementid(\AppBundle\Entity\Departement $departementid)
    {
        $this->departementid[] = $departementid;
        $departementid->addAgenceid($this);

        return $this;
    }

    /**
     * Remove departementid.
     *
     * @param \AppBundle\Entity\Departement $departementid
     */
    public function removeDepartementid(\AppBundle\Entity\Departement $departementid)
    {
        $this->departementid->removeElement($departementid);
    }

    /**
     * Get departementid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepartementid()
    {
        return $this->departementid;
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
                $this->photo->move('../web/images/agence', $fileName);
            } catch (\Exception $exception) {
                throw $exception;
            }
            $this->setPhoto($fileName);
        }
    }

    /**
     * Add agent.
     *
     * @param \AppBundle\Entity\Agent $agent
     *
     * @return Agence
     */
    public function addAgent(\AppBundle\Entity\Agent $agent)
    {
        $this->agents[] = $agent;

        return $this;
    }

    /**
     * Remove agent.
     *
     * @param \AppBundle\Entity\Agent $agent
     */
    public function removeAgent(\AppBundle\Entity\Agent $agent)
    {
        $this->agents->removeElement($agent);
    }

    /**
     * Get agents.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAgents()
    {
        return $this->agents;
    }

    /**
     * Add translation
     *
     * @param \AppBundle\Entity\Translation\AgenceTranslation $translation
     *
     * @return Agence
     */
    public function addTranslation(\AppBundle\Entity\Translation\AgenceTranslation $translation)
    {
        $this->translations[] = $translation;

        return $this;
    }

    /**
     * Remove translation
     *
     * @param \AppBundle\Entity\Translation\AgenceTranslation $translation
     */
    public function removeTranslation(\AppBundle\Entity\Translation\AgenceTranslation $translation)
    {
        $this->translations->removeElement($translation);
    }

    /**
     * Get translations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     * @return Agence
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
        return $this;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    public function __toString()
    {
        return $this->email;
    }
}
