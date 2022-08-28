<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Repository\ArticleRepository;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="app_blog")
     */
    public function index(ArticleRepository $repo): Response
    {
        $articles = $repo->findAll();
        //dd($articles);
        return $this->render('blog/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('blog/home.html.twig',[
            "title" => "Mon blog",
            "age"   => 10
        ]);
    }
    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show(Article $article, $id)
    {
         return $this->render('blog/show.html.twig',[
            "article" => $article
        ]);
    }
}

