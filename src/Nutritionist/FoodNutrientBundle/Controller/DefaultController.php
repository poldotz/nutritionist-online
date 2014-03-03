<?php

namespace Nutritionist\FoodNutrientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/food-nutrient/update")
     * @Template()
     */
    public function indexAction()
    {
        /*
         * Load FoodNutrient Fixtures;
         */
        $em = $this->getDoctrine()->getManager();
        try{
           $results = $em->getRepository('NutritionistFoodNutrientBundle:FoodNutrient')->loadFoodNutrient();
           return array('results'=> $results);
        }
        catch(\Exception $e){
            return $e->getMessage();
        }

    }
}
