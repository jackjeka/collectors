<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table()
 * @UniqueEntity("name")
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
     * @ORM\Column(type="string", unique=true)
     */
    private $name;

    /**
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Catalog", mappedBy="category")
     */
    private $catalogs;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->catalogs = new ArrayCollection();
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
     * Add catalogs
     *
     * @param Catalog $catalogs
     * @return Category
     */
    public function addCatalog(Catalog $catalogs)
    {
        $this->catalogs[] = $catalogs;

        return $this;
    }

    /**
     * Remove catalogs
     *
     * @param Catalog $catalogs
     */
    public function removeCatalog(Catalog $catalogs)
    {
        $this->catalogs->removeElement($catalogs);
    }

    /**
     * Get catalogs
     *
     * @return Collection
     */
    public function getCatalogs()
    {
        return $this->catalogs;
    }

    public function __toString()
    {
        return $this->name;
    }
}
