<?php

namespace AppBundle\Entity\Translation;

use Doctrine\ORM\Mapping as ORM;

/**
 * AgentTranslation.
 *
 * @ORM\Table(name="Agent_translation")
 * @ORM\Entity
 */
class AgentTranslation
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Locale")
     */
    private $locale;


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
    private $cursus;

    /**
     * @var string
     *
     * @ORM\Column(name="cursus_solidaire", type="string", length=255, nullable=true)
     */
    private $cursusSolidaire;


    /**
     * @var string
     *
     * @ORM\Column(name="phrase", type="string", length=255, nullable=true)
     */
    private $phrase;

    /**
     * @var \Agent
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Agent", inversedBy="translations")
     */
    private $agentid;

    /**
     * @var string
     *
     * @ORM\Column(name="signature_horaire_travail", type="string", length=255, nullable=true)
     */
    private $signatureHoraireTravail;

    public function __construct()
    {
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
     * Set passionTitre.
     *
     * @param string $passionTitre
     *
     * @return AgentTranslation
     */
    public function setPassionTitre($passionTitre)
    {
        $this->passionTitre = $passionTitre;

        return $this;
    }

    /**
     * Get passionTitre.
     *
     * @return string
     */
    public function getPassionTitre()
    {
        return $this->passionTitre;
    }

    /**
     * Set passionContenu.
     *
     * @param string $passionContenu
     *
     * @return AgentTranslation
     */
    public function setPassionContenu($passionContenu)
    {
        $this->passionContenu = $passionContenu;

        return $this;
    }

    /**
     * Get passionContenu.
     *
     * @return string
     */
    public function getPassionContenu()
    {
        return $this->passionContenu;
    }

    /**
     * Set destinationTitre.
     *
     * @param string $destinationTitre
     *
     * @return AgentTranslation
     */
    public function setDestinationTitre($destinationTitre)
    {
        $this->destinationTitre = $destinationTitre;

        return $this;
    }

    /**
     * Get destinationTitre.
     *
     * @return string
     */
    public function getDestinationTitre()
    {
        return $this->destinationTitre;
    }

    /**
     * Set destinationContenu.
     *
     * @param string $destinationContenu
     *
     * @return AgentTranslation
     */
    public function setDestinationContenu($destinationContenu)
    {
        $this->destinationContenu = $destinationContenu;

        return $this;
    }

    /**
     * Get destinationContenu.
     *
     * @return string
     */
    public function getDestinationContenu()
    {
        return $this->destinationContenu;
    }

    /**
     * Set formationTitre.
     *
     * @param string $formationTitre
     *
     * @return AgentTranslation
     */
    public function setFormationTitre($formationTitre)
    {
        $this->formationTitre = $formationTitre;

        return $this;
    }

    /**
     * Get formationTitre.
     *
     * @return string
     */
    public function getFormationTitre()
    {
        return $this->formationTitre;
    }

    /**
     * Set formationContenu.
     *
     * @param string $formationContenu
     *
     * @return AgentTranslation
     */
    public function setFormationContenu($formationContenu)
    {
        $this->formationContenu = $formationContenu;

        return $this;
    }

    /**
     * Get formationContenu.
     *
     * @return string
     */
    public function getFormationContenu()
    {
        return $this->formationContenu;
    }

    /**
     * Set cursusFr.
     *
     * @param string $cursus
     *
     * @return AgentTranslation
     */
    public function setCursus($cursus)
    {
        $this->cursus = $cursus;

        return $this;
    }

    /**
     * Get cursusFr.
     *
     * @return string
     */
    public function getCursus()
    {
        return $this->cursus;
    }

    /**
     * Set cursusSolidaire.
     *
     * @param string $cursusSolidaire
     *
     * @return AgentTranslation
     */
    public function setCursusSolidaire($cursusSolidaire)
    {
        $this->cursusSolidaire = $cursusSolidaire;

        return $this;
    }

    /**
     * Get cursusSolidaire.
     *
     * @return string
     */
    public function getCursusSolidaire()
    {
        return $this->cursusSolidaire;
    }

    /**
     * Set signatureTel.
     *
     * @param string $signatureTel
     *
     * @return AgentTranslation
     */
    public function setSignatureTel($signatureTel)
    {
        $this->signatureTel = $signatureTel;

        return $this;
    }

    /**
     * Get signatureTel.
     *
     * @return string
     */
    public function getSignatureTel()
    {
        return $this->signatureTel;
    }

    /**
     * Set signatureHoraireTravail.
     *
     * @param string $signatureHoraireTravail
     *
     * @return AgentTranslation
     */
    public function setSignatureHoraireTravail($signatureHoraireTravail)
    {
        $this->signatureHoraireTravail = $signatureHoraireTravail;

        return $this;
    }

    /**
     * Get signatureHoraireTravail.
     *
     * @return string
     */
    public function getSignatureHoraireTravail()
    {
        return $this->signatureHoraireTravail;
    }

    /**
     * Set phrase.
     *
     * @param string $phrase
     *
     * @return AgentTranslation
     */
    public function setPhrase($phrase)
    {
        $this->phrase = $phrase;

        return $this;
    }

    /**
     * Get phrase.
     *
     * @return string
     */
    public function getPhrase()
    {
        return $this->phrase;
    }

    /**
     * Set agentid.
     *
     * @param \AppBundle\Entity\Agent $agentid
     *
     * @return AgentTranslation
     */
    public function setAgentid(\AppBundle\Entity\Agent $agentid = null)
    {
        $this->agentid = $agentid;

        return $this;
    }

    /**
     * Get agentid.
     *
     * @return \AppBundle\Entity\Agent
     */
    public function getAgentid()
    {
        return $this->agentid;
    }

    public function __toString()
    {
        return 'EP-'.$this->getAgentid();
    }

    /**
     * @return Locale
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param Locale $locale
     * @return AgentTranslation
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
        return $this;
    }
}
