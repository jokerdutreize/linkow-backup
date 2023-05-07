<?php

namespace App\Controller;

use App\Form\UpdateProfileType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/mon-espace/modifier-mon-profil', name: 'app_update')]
    public function index(Request $request): Response
    {
        $notification = null;

        $user = $this->getUser();
        $form = $this->createForm(UpdateProfileType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $user = $form->getData();

            $imageFile = $form->get('illustration')->getData();

            if ($imageFile) {
                $newFilename = uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('illustration_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // handle exception if something goes wrong
                }

                $user->setIllustration($newFilename);
            }

            $this->entityManager->persist($user);
            $this->entityManager->flush();
            $notification = "Votre profil a été mis à jour.";

        }

        return $this->render('account/update.html.twig', [
            'form' => $form->createView(),
            'notification' => $notification
        ]);
    }
}
