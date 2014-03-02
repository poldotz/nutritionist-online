<?php

namespace Nutritionist\NutrientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class DefaultController extends Controller
{
    /**
     * @Route("/nutrient/update")
     * @Template()
     */
    public function indexAction()
    {
        /*
         *  Load Nutrient Fixtures;
         */
        var_dump('ok');
        $em = $this->getDoctrine()->getManager();
        try{
         $results = $em->getRepository('NutritionistNutrientBundle:Nutrient')->loadNutrients();
         return array('results'=>$results);
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
