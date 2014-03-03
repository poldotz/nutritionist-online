<?php

namespace Nutritionist\NutrientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Nutrient
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Nutritionist\NutrientBundle\Entity\NutrientRepository")
 */
class Nutrient
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
     * @ORM\Column(name="name", unique=true, type="string", length=255)
     */
    private $name;


    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=true)
     */
    private $note;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated", type="datetime")
     */
    private $updated;

    /**
     * @ORM\OneToMany(targetEntity="Nutritionist\FoodNutrientBundle\Entity\FoodNutrient", mappedBy="nutrient")
     */
    protected $foodNutrients;


    public function __construct()
    {

        $this->foodNutrients = new ArrayCollection();
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
     * @return Nutrient
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
     * Set note
     *
     * @param string $note
     * @return Nutrient
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }



    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Nutrient
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Nutrient
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Add foodNutrients
     *
     * @param \Nutritionist\FoodNutrientBundle\Entity\FoodNutrient $foodNutrients
     * @return Nutrient
     */
    public function addFoodNutrient(\Nutritionist\FoodNutrientBundle\Entity\FoodNutrient $foodNutrients)
    {
        $this->foodNutrients[] = $foodNutrients;

        return $this;
    }

    /**
     * Remove foodNutrients
     *
     * @param \Nutritionist\FoodNutrientBundle\Entity\FoodNutrient $foodNutrients
     */
    public function removeFoodNutrient(\Nutritionist\FoodNutrientBundle\Entity\FoodNutrient $foodNutrients)
    {
        $this->foodNutrients->removeElement($foodNutrients);
    }

    /**
     * Get foodNutrients
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFoodNutrients()
    {
        return $this->foodNutrients;
    }
}
