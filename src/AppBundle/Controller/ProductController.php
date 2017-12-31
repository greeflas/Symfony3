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

    /**
     * List of the products.
     *
     * @return Response
     *
     * @Route("/product/list")
     */
    public function listAction()
    {
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();

        return $this->render('product/list.html.twig', compact('products'));
    }

    /**
     * View product info.
     *
     * @param int $productId
     * @return Response
     *
     * @Route("/product/view/{productId}", name="product_view")
     */
    public function viewAction($productId)
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($productId);

        if (!$product) {
            throw $this->createNotFoundException(sprintf('Product with ID %d not found', $productId));
        }

        return $this->render('product/view.html.twig', compact('product'));
    }

    /**
     * Find product by price or name.
     *
     * @param mixed $query
     * @return Response
     *
     * @Route("/product/smart-search/{query}")
     */
    public function smartSearchAction($query)
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $product = null;

        if (floatval($query) !== 0) {
            $product = $repository->findOneByPrice($query);
        } else {
            $product = $repository->findOneByName($query);
        }

        if (!$product) {
            throw $this->createNotFoundException('Product not found!');
        }

        return $this->render('product/view.html.twig', compact('product'));
    }

    /**
     * Update product.
     *
     * @param int $productId
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @Route("/product/update/{productId}")
     */
    public function updateAction($productId)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository(Product::class)->find($productId);

        if (!$product) {
            throw $this->createNotFoundException(sprintf('Product with ID %d not found', $productId));
        }

        $product->setPrice(10000);
        $em->flush();

        return $this->redirectToRoute('product_view', compact('productId'));
    }

    /**
     * Remove product.
     *
     * @param int $productId
     * @return Response
     *
     * @Route("/product/remove/{productId}")
     */
    public function removeAction($productId)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository(Product::class)->find($productId);

        if (!$product) {
            throw $this->createNotFoundException();
        }

        $em->remove($product);
        $em->flush();

        return new Response('Product with ID ' . $productId . ' was successfully removed!');
    }
}
