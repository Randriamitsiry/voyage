<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role as Roles;

/**
 * Role.
 *
 * @ORM\Table(name="Role")
 * @ORM\Entity
 */
class Role extends Roles\Role
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    public function getRole()
    {
        return $this->designation;
    }


    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=10)
     */
    private $designation;

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
     * Set designation.
     *
     * @param string $designation
     *
     * @return Role
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation.
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @return string
     * convert role to string
     */
    public function __toString()
    {
        return $this->designation;
    }
}
