<?php
/**
 * Created by PhpStorm.
 * User: jess
 * Date: 13/06/18
 * Time: 17:31
 */

namespace AppBundle\Entity\Translation;

use Doctrine\ORM\Mapping as ORM;

/**
 * AgentTranslation.
 *
 * @ORM\Table(name="Agence_translation")
 * @ORM\Entity
 */
class AgenceTranslation
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
     * @ORM\Column(name="horaire_ouverture", type="string", length=255, nullable=false)
     */
    private $horaireOuverture;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Locale")
     */
    private $locale;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Agence", inversedBy="translations")
     */
    private $agence;


    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;


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
     * Set horaireOuverture
     *
     * @param string $horaireOuverture
     *
     * @return AgenceTranslation
     */
    public function setHoraireOuverture($horaireOuverture)
    {
        $this->horaireOuverture = $horaireOuverture;

        return $this;
    }

    /**
     * Get horaireOuverture
     *
     * @return string
     */
    public function getHoraireOuverture()
    {
        return $this->horaireOuverture;
    }

    /**
     * Set locale
     *
     * @param \AppBundle\Entity\Locale $locale
     *
     * @return AgenceTranslation
     */
    public function setLocale(\AppBundle\Entity\Locale $locale = null)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return \AppBundle\Entity\Locale
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set agence
     *
     * @param \AppBundle\Entity\Agence $agence
     *
     * @return AgenceTranslation
     */
    public function setAgence(\AppBundle\Entity\Agence $agence = null)
    {
        $this->agence = $agence;

        return $this;
    }

    /**
     * Get agence
     *
     * @return \AppBundle\Entity\Agence
     */
    public function getAgence()
    {
        return $this->agence;
    }
}
