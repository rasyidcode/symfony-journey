<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): JsonResponse
    {
        $user = new User();
        $user->setEmail('testuser2');
        $user->setRoles(['ROLE_USER', 'ROLE_ADMIN']);

        $plainPassword = 12345;

        $hashedPassword = $passwordHasher->hashPassword($user, $plainPassword);
        $user->setPassword($hashedPassword);

        $entityManager->persist($user);

        $entityManager->flush();

        return $this->json([
            'message' => 'User saved.'
        ]);
    }

    #[Route('/user/list', name: 'app_user_list')]
    public function list(UserRepository $userRepository): JsonResponse
    {
        $users = $userRepository->findAll();
        dd($users);
        return $this->json([]);
    }
}
