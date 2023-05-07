<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewAccountController extends AbstractController
{
    #[Route('/view/user/{id}', name: 'app_view_account')]
    public function index(): Response
    {
        return $this->render('view_account/index.html.twig');
    }
}
