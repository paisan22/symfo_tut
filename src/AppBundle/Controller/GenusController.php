<?php
/**
 * Created by PhpStorm.
 * User: paisanrietbroek
 * Date: 27-2-2017
 * Time: 10:26
 */

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class GenusController
{
    /**
     * @Route("/genus")
     */
    public function showAction()
    {
        return new Response("Under the sea!");
    }
}