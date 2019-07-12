<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index()
    {

    }

    /**
     * @Route("/product/all", name="allProduct")
     */
    public function allProductsAction()
    {

        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();
        
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'products' => $products,
        ]);
    }

    /**
     * @Route("/product/{slug}", name="productSlug")
     */
    public function productSlugAction($slug)
    {

        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findBy(
                ['slug' => $slug,]
            );

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'products' => $product,
        ]);
    }

    /**
     * @Route("/product/category/{slug}", name="productByCategory")
     */
    public function productByCategoryAction($slug)
    {

        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findByCategorySlug($slug);

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'products' => $product,
        ]);
    }
}
