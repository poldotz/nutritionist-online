<?php

namespace Nutritionist\CategoryBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Goutte\Client;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends EntityRepository
{

    public function loadCategories($url = 'http://www.inran.it/646/tabelle_di_composizione_degli_alimenti.html'){

        $client = new Client();
        $crawler = $client->request('GET',$url);
        $nodes = $crawler->filter('#categoria');
        try{
            $total_category = 0;
            $imported_category = 0;
            if ($nodes->count())
            {
                $total_category = $nodes->children()->count();
                foreach($nodes->children() as $node){
                    $category = new Category();
                    $category->setName($node->nodeValue);
                    $this->_em->persist($category);
                    $imported_category +=1;
                }
            }
            $this->_em->flush();
            return array('total_category'=>$total_category, 'imported_category'=>$imported_category);
        }
        catch(\Exception $e){
            return $e;
        }
    }
}