<?php

namespace Nutritionist\FoodBundle\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/food/update")
     * @Template()
     */
    public function indexAction()
    {
        try{
            $em = $this->getDoctrine()->getManager();
            $results =  $em->getRepository('NutritionistFoodBundle:Food')->loadFoods();
            return array('results'=>$results);
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
