<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AllUsersController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/all/users', name: 'app_all_users')]
    public function index(): Response
    {
        $users = $this->entityManager->getRepository(User::class)->findAll();

        return $this->render('all_users/index.html.twig', [
            'users' => $users
        ]);
    }
}
