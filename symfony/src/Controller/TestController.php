<?php
namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/user/{email}', name: 'test_user')]
    public function userByEmail(UserRepository $repo, string $email): Response
    {
        $user = $repo->findByEmail($email);
        return new Response($user ? $user->getName() : 'Not found');
    }

    #[Route('/post/{id}', name: 'test_post')]
    public function postAuthor(PostRepository $repo, int $id): Response
    {
        $post = $repo->find($id);
        return new Response($post ? $post->getUser()->getName() : 'Not found');
    }
}
