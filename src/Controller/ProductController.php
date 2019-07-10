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
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: index(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();
        $category = new Category();
        $category->setName('console');
        $product = new Product();
        $product->setName('PS4');
        $product->setPrice(200);
        $product->setDescription('console salon SONY');
        $product->setCategory($category);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($category);
        $entityManager->persist($product);

        $product = new Product();
        $product->setName('xboxOne');
        $product->setPrice(200);
        $product->setDescription('console salon microsoft');
        $product->setCategory($category);

        $entityManager->persist($product);

        $product = new Product();
        $product->setName('switch');
        $product->setPrice(200);
        $product->setDescription('console salon nintendo');
        $product->setCategory($category);

        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$product->getId());
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
}
