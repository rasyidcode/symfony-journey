<?php

namespace App\Controller;

use App\Entity\Post;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends AbstractController
{

    public function list(ManagerRegistry $doctrine): Response
    {
        $posts = $doctrine->getRepository(Post::class)->findAll();

        return $this->render('blog/list.html.twig', ['posts' => $posts]);
    }

    public function show(ManagerRegistry $doctrine, $id): Response
    {
       $post = $doctrine->getRepository(Post::class)->find($id);

       if (!$post) {
           // cause the 404 page not found to be displayed
           throw $this->createNotFoundException();
       }

       return $this->render('blog/show.html.twig', ['post' => $post]);
    }

}