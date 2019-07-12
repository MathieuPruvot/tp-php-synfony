<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager){
        $category = new Category();
        $category->setName('console');
        $product = new Product();
        $product->setName('PS4');
        $product->setPrice(200);
        $product->setDescription('console salon SONY');
        $product->setCategory($category);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $manager->persist($category);
        $manager->persist($product);

        $product = new Product();
        $product->setName('xboxOne');
        $product->setPrice(200);
        $product->setDescription('console salon microsoft');
        $product->setCategory($category);

        $manager->persist($product);

        $product = new Product();
        $product->setName('switch');
        $product->setPrice(200);
        $product->setDescription('console salon nintendo');
        $product->setCategory($category);

        $manager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $manager->flush();

    }
}
