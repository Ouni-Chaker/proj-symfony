<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=0; $i<=10; $i++)
        {
            $article = new Article();
            $article->setTitle("le titre de l'article n°$i")
                    ->setContent("<p>le contenu de la'article n°$i</p>")
                    ->setImage("images/minion.webp")
                    ->setCreatedAt(new \DateTime());
            $manager->persist($article);
        }

        $manager->flush();
    }
}
