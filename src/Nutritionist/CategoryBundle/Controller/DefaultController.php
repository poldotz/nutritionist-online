<?php

namespace Nutritionist\CategoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/category/update")
     * @Template()
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        /*
         * Load Category Fixtures;
         */
       try{
           $results = $em->getRepository('NutritionistCategoryBundle:Category')->loadCategories();
           return array('results'=> $results);
       }
       catch(\Exception $e){
           return $e->getMessage();
       }


    }
}
