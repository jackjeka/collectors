<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Catalog", mappedBy="category")
     */
    private $catalogs;


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
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set catalogs
     *
     * @param \stdClass $catalogs
     * @return Category
     */
    public function setCatalogs($catalogs)
    {
        $this->catalogs = $catalogs;

        return $this;
    }

    /**
     * Get catalogs
     *
     * @return \stdClass 
     */
    public function getCatalogs()
    {
        return $this->catalogs;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->catalogs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add catalogs
     *
     * @param \AppBundle\Entity\Catalog $catalogs
     * @return Category
     */
    public function addCatalog(\AppBundle\Entity\Catalog $catalogs)
    {
        $this->catalogs[] = $catalogs;

        return $this;
    }

    /**
     * Remove catalogs
     *
     * @param \AppBundle\Entity\Catalog $catalogs
     */
    public function removeCatalog(\AppBundle\Entity\Catalog $catalogs)
    {
        $this->catalogs->removeElement($catalogs);
    }

    public function __toString()
    {
        return $this->name;
    }
}
