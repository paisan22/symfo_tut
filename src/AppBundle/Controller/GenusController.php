<?php
/**
 * Created by PhpStorm.
 * User: paisanrietbroek
 * Date: 27-2-2017
 * Time: 10:26
 */

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GenusController extends Controller
{
    /**
     * @Route("/genus/{genusName}")
     */
    public function showAction($genusName)
    {
        return $this->render('genus/show.html.twig', array(
            'name' => $genusName
        ));
    }
}