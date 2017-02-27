<?php
/**
 * Created by PhpStorm.
 * User: paisanrietbroek
 * Date: 27-2-2017
 * Time: 14:09
 */

namespace AppBundle\Controller;
use AppBundle\AppBundle;
use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;

class ProductController extends Controller
{
    /**
     * @Route("/product", name = "add_product",
     *     requirements = { "_format": "application/json"})
     * @Method("POST")
     *
     */
    public function addProduct(Request $request)
    {
        $content = $request->getContent();
        $json = json_decode($content);

        $product = new Product();
        $product->setName($json->name);
        $product->setPrice($json->price);

        $em = $this->getDoctrine()->getManager();

        $em->persist($product);

        $em->flush();

        return new JsonResponse($json);
    }

    /**
     * @Route("/product")
     * @Method("GET")
     */
    public function getAll()
    {
        $serializer = $this->get('serializer');

        $repo = $this->getDoctrine()->getRepository('AppBundle:Product');
        $products = $repo->findAll();

        $json = $serializer->serialize($products, 'json');
        $json_decode = json_decode($json);

        return new JsonResponse($json_decode);
    }

    /**
     * @Route("/product/{id}")
     * @Method("GET")
     */
    public function getProduct($id)
    {
        $product = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        $serializer = $this->get('serializer');
        $serialize = $serializer->serialize($product, 'json');
        $json_decode = json_decode($serialize);

        return new JsonResponse($json_decode);
    }
}