<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paiement.
 *
 * @ORM\Table(name="Paiement", uniqueConstraints={@ORM\UniqueConstraint(name="code", columns={"code"}), @ORM\UniqueConstraint(name="num_compte", columns={"num_compte"})})
 * @ORM\Entity
 */
class Paiement
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
     * @ORM\Column(name="code", type="string", length=10, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=50, nullable=false)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="journal", type="string", length=20, nullable=false)
     */
    private $journal;

    /**
     * @var string
     *
     * @ORM\Column(name="num_compte", type="string", length=20, nullable=false)
     */
    private $numCompte;

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
     * Set code.
     *
     * @param string $code
     *
     * @return Paiement
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set libelle.
     *
     * @param string $libelle
     *
     * @return Paiement
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle.
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set journal.
     *
     * @param string $journal
     *
     * @return Paiement
     */
    public function setJournal($journal)
    {
        $this->journal = $journal;

        return $this;
    }

    /**
     * Get journal.
     *
     * @return string
     */
    public function getJournal()
    {
        return $this->journal;
    }

    /**
     * Set numCompte.
     *
     * @param string $numCompte
     *
     * @return Paiement
     */
    public function setNumCompte($numCompte)
    {
        $this->numCompte = $numCompte;

        return $this;
    }

    /**
     * Get numCompte.
     *
     * @return string
     */
    public function getNumCompte()
    {
        return $this->numCompte;
    }
}
