<?php

namespace App\Controller;

use App\Entity\Stats;
use App\Form\StatsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class NewStatsController extends AbstractController
{
    #[Route('/stats', name: 'app_new_stats')]

    public function index(): Response
    {
        return $this->render('new_stats/index.html.twig', [
            'controller_name' => 'NewItemController',
        ]);
    }
    #[Route('/stats/new', name: 'app_new_stats')]
    public function creation(HttpFoundationRequest $request, EntityManagerInterface $em): Response
    {
        $stats = new Stats();
        $form = $this->createForm(StatsType::class, $stats);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($stats);
            $em->flush();
    
            $this->addFlash('success', 'Stat créée!');
            return $this->redirectToRoute('/dashboard');
        }
    
        return $this->render('new_stats/index.html.twig', [
            'item' => $stats,
            'form' => $form->createView(),
        ]);
    }
}
