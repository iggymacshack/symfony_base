<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewItemController extends AbstractController
{
    #[Route('/new/item', name: 'app_new_item')]
    public function index(): Response
    {
        return $this->render('new_item/index.html.twig', [
            'controller_name' => 'NewItemController',
        ]);
    }
}
