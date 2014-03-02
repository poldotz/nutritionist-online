<?php

namespace Nutritionist\FoodNutrientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;
use Nutritionist\FoodBundle\Entity\Food;
use Nutritionist\FoodBundle\Entity\Nutrient;

/**
 * FoodNutrient
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Nutritionist\FoodNutrientBundle\Entity\FoodNutrientRepository")
 */
class FoodNutrient
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
     * @ORM\ManyToOne(targetEntity="Nutritionist\FoodBundle\Entity\Food", inversedBy="foodNutrients")
     */
    private $food;

    /**
     * @ORM\ManyToOne(targetEntity="Nutritionist\NutrientBundle\Entity\Nutrient", inversedBy="foodNutrients")
     */
    private $nutrient;

    /**
     * @var string
     *
     * @ORM\Column(name="foodNutrient", type="decimal",precision=10,scale=2)
     */
    private $foodNutrient;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set food
     *
     * @param Food $food
     * @return FoodNutrient
     */
    public function setFood(Food $food)
    {
        $this->food = $food;

        return $this;
    }

    /**
     * Get food
     *
     * @return \stdClass 
     */
    public function getFood()
    {
        return $this->food;
    }

    /**
     * Set nutrient
     *
     * @param Nutrient $nutrient
     * @return FoodNutrient
     */
    public function setNutrient(Nutrient $nutrient)
    {
        $this->nutrient = $nutrient;

        return $this;
    }

    /**
     * Get nutrient
     *
     * @return \stdClass 
     */
    public function getNutrient()
    {
        return $this->nutrient;
    }

    /**
     * Set foodNutrient
     *
     * @param string $foodNutrient
     * @return FoodNutrient
     */
    public function setFoodNutrient($foodNutrient)
    {
        $this->foodNutrient = $foodNutrient;

        return $this;
    }

    /**
     * Get foodNutrient
     *
     * @return string 
     */
    public function getFoodNutrient()
    {
        return $this->foodNutrient;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return FoodNutrient
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
}
