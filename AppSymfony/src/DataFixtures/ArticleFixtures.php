<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;
use App\DataFixtures;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    //le manager nous aide à ajouter ou supprimer des ligne dans une base de données
    {

        for($i=1; $i<=10; $i++){
            $article = new Article();
            $article->setTitle("Title de l'article n° $i ")
                    ->setContent("<p>contenue de l'article n° $i </p>")
                    ->setImage("http://placehold.it/350x150")
                    ->setCreatedAt(new \DateTime());

                    //faire persister l'article en utilisant le manager

                    $manager->persist($article);
        }
        // $product = new Product();
        // $manager->persist($product);
        //flush exécute la requete SQL
        $manager->flush();
    }
}
