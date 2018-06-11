<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EspacePersonnalise
 *
 * @ORM\Table(name="Espace_personnalise")
 * @ORM\Entity
 */
class EspacePersonnalise
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
     * @ORM\Column(name="passion_titre", type="string", length=100, nullable=true)
     */
    private $passionTitre;

    /**
     * @var string
     *
     * @ORM\Column(name="passion_contenu", type="string", length=255, nullable=true)
     */
    private $passionContenu;

    /**
     * @var string
     *
     * @ORM\Column(name="destination_titre", type="string", length=100, nullable=true)
     */
    private $destinationTitre;

    /**
     * @var string
     *
     * @ORM\Column(name="destination_contenu", type="string", length=255, nullable=true)
     */
    private $destinationContenu;

    /**
     * @var string
     *
     * @ORM\Column(name="formation_titre", type="string", length=100, nullable=true)
     */
    private $formationTitre;

    /**
     * @var string
     *
     * @ORM\Column(name="formation_contenu", type="string", length=255, nullable=true)
     */
    private $formationContenu;

    /**
     * @var string
     *
     * @ORM\Column(name="cursus_fr", type="string", length=255, nullable=true)
     */
    private $cursusFr;

    /**
     * @var string
     *
     * @ORM\Column(name="cursus_solidaire", type="string", length=255, nullable=true)
     */
    private $cursusSolidaire;

    /**
     * @var string
     *
     * @ORM\Column(name="cursus_en", type="string", length=255, nullable=true)
     */
    private $cursusEn;

    /**
     * @var string
     *
     * @ORM\Column(name="signature_tel", type="string", length=20, nullable=true)
     */
    private $signatureTel;

    /**
     * @var string
     *
     * @ORM\Column(name="signature_horaire_travail", type="string", length=255, nullable=true)
     */
    private $signatureHoraireTravail;

    /**
     * @var binary
     *
     * @ORM\Column(name="signature_visuel", type="binary", nullable=true)
     */
    private $signatureVisuel;

    /**
     * @var string
     *
     * @ORM\Column(name="phrase", type="string", length=255, nullable=true)
     */
    private $phrase;

    /**
     * @var \Agent
     *
     * @ORM\OneToOne(targetEntity="Agent", inversedBy="espacepersonnalise")
     */
    private $agentid;

    public function __construct()
    {

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
     * Set passionTitre
     *
     * @param string $passionTitre
     *
     * @return EspacePersonnalise
     */
    public function setPassionTitre($passionTitre)
    {
        $this->passionTitre = $passionTitre;

        return $this;
    }

    /**
     * Get passionTitre
     *
     * @return string
     */
    public function getPassionTitre()
    {
        return $this->passionTitre;
    }

    /**
     * Set passionContenu
     *
     * @param string $passionContenu
     *
     * @return EspacePersonnalise
     */
    public function setPassionContenu($passionContenu)
    {
        $this->passionContenu = $passionContenu;

        return $this;
    }

    /**
     * Get passionContenu
     *
     * @return string
     */
    public function getPassionContenu()
    {
        return $this->passionContenu;
    }

    /**
     * Set destinationTitre
     *
     * @param string $destinationTitre
     *
     * @return EspacePersonnalise
     */
    public function setDestinationTitre($destinationTitre)
    {
        $this->destinationTitre = $destinationTitre;

        return $this;
    }

    /**
     * Get destinationTitre
     *
     * @return string
     */
    public function getDestinationTitre()
    {
        return $this->destinationTitre;
    }

    /**
     * Set destinationContenu
     *
     * @param string $destinationContenu
     *
     * @return EspacePersonnalise
     */
    public function setDestinationContenu($destinationContenu)
    {
        $this->destinationContenu = $destinationContenu;

        return $this;
    }

    /**
     * Get destinationContenu
     *
     * @return string
     */
    public function getDestinationContenu()
    {
        return $this->destinationContenu;
    }

    /**
     * Set formationTitre
     *
     * @param string $formationTitre
     *
     * @return EspacePersonnalise
     */
    public function setFormationTitre($formationTitre)
    {
        $this->formationTitre = $formationTitre;

        return $this;
    }

    /**
     * Get formationTitre
     *
     * @return string
     */
    public function getFormationTitre()
    {
        return $this->formationTitre;
    }

    /**
     * Set formationContenu
     *
     * @param string $formationContenu
     *
     * @return EspacePersonnalise
     */
    public function setFormationContenu($formationContenu)
    {
        $this->formationContenu = $formationContenu;

        return $this;
    }

    /**
     * Get formationContenu
     *
     * @return string
     */
    public function getFormationContenu()
    {
        return $this->formationContenu;
    }

    /**
     * Set cursusFr
     *
     * @param string $cursusFr
     *
     * @return EspacePersonnalise
     */
    public function setCursusFr($cursusFr)
    {
        $this->cursusFr = $cursusFr;

        return $this;
    }

    /**
     * Get cursusFr
     *
     * @return string
     */
    public function getCursusFr()
    {
        return $this->cursusFr;
    }

    /**
     * Set cursusSolidaire
     *
     * @param string $cursusSolidaire
     *
     * @return EspacePersonnalise
     */
    public function setCursusSolidaire($cursusSolidaire)
    {
        $this->cursusSolidaire = $cursusSolidaire;

        return $this;
    }

    /**
     * Get cursusSolidaire
     *
     * @return string
     */
    public function getCursusSolidaire()
    {
        return $this->cursusSolidaire;
    }

    /**
     * Set cursusEn
     *
     * @param string $cursusEn
     *
     * @return EspacePersonnalise
     */
    public function setCursusEn($cursusEn)
    {
        $this->cursusEn = $cursusEn;

        return $this;
    }

    /**
     * Get cursusEn
     *
     * @return string
     */
    public function getCursusEn()
    {
        return $this->cursusEn;
    }

    /**
     * Set signatureTel
     *
     * @param string $signatureTel
     *
     * @return EspacePersonnalise
     */
    public function setSignatureTel($signatureTel)
    {
        $this->signatureTel = $signatureTel;

        return $this;
    }

    /**
     * Get signatureTel
     *
     * @return string
     */
    public function getSignatureTel()
    {
        return $this->signatureTel;
    }

    /**
     * Set signatureHoraireTravail
     *
     * @param string $signatureHoraireTravail
     *
     * @return EspacePersonnalise
     */
    public function setSignatureHoraireTravail($signatureHoraireTravail)
    {
        $this->signatureHoraireTravail = $signatureHoraireTravail;

        return $this;
    }

    /**
     * Get signatureHoraireTravail
     *
     * @return string
     */
    public function getSignatureHoraireTravail()
    {
        return $this->signatureHoraireTravail;
    }

    /**
     * Set signatureVisuel
     *
     * @param binary $signatureVisuel
     *
     * @return EspacePersonnalise
     */
    public function setSignatureVisuel($signatureVisuel)
    {
        $this->signatureVisuel = $signatureVisuel;

        return $this;
    }

    /**
     * Get signatureVisuel
     *
     * @return binary
     */
    public function getSignatureVisuel()
    {
        return $this->signatureVisuel;
    }

    /**
     * Set phrase
     *
     * @param string $phrase
     *
     * @return EspacePersonnalise
     */
    public function setPhrase($phrase)
    {
        $this->phrase = $phrase;

        return $this;
    }

    /**
     * Get phrase
     *
     * @return string
     */
    public function getPhrase()
    {
        return $this->phrase;
    }

    /**
     * Set agentid
     *
     * @param \AppBundle\Entity\Agent $agentid
     *
     * @return EspacePersonnalise
     */
    public function setAgentid(\AppBundle\Entity\Agent $agentid = null)
    {
        $this->agentid = $agentid;

        return $this;
    }

    /**
     * Get agentid
     *
     * @return \AppBundle\Entity\Agent
     */
    public function getAgentid()
    {
        return $this->agentid;
    }

    public function __toString()
    {
        return "EP-" .$this->getAgentid();
    }
}
