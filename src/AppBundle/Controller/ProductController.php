<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Product CRUD controller.
 * @link https://symfony.com/doc/3.4/doctrine.html#persisting-objects-to-the-database
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class ProductController extends Controller
{
    /**
     * Create product.
     *
     * @return Response
     *
     * @Route("/product/create")
     */
    public function createAction()
    {
        $product = new Product();
        $product->setName('iPhone X');
        $product->setDescription('Last iPhone version.');
        $product->setPrice(1999.99);

        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();

        return new Response('Save new product with ID: ' . $product->getId());
    }
}
