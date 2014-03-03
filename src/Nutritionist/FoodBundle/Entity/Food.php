<?php

namespace Nutritionist\FoodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Nutritionist\CategoryBundle\Entity\Category;
use Doctrine\Common\Collections\ArrayCollection;



/**
 * Food
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Nutritionist\FoodBundle\Entity\FoodRepository")
 */
class Food
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
     * @ORM\ManyToOne(targetEntity="Nutritionist\CategoryBundle\Entity\Category", inversedBy="foods")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $category;

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
     * @ORM\OneToMany(targetEntity="Nutritionist\FoodNutrientBundle\Entity\FoodNutrient", mappedBy="food")
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
     * @return Food
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
     * Get Category
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }
    /*
     * Set Category
     *
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;
    }


    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Food
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
     * @return Food
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
     * @return Food
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
