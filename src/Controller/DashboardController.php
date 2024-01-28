<?php

namespace App\Controller;
use App\Entity\Item;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(EntityManagerInterface $em): Response
    {
        $itemCount = $em->getRepository(Item::class)->itemCount();
        $legCount = $em->getRepository(Item::class)->itemCountByRarity(8);
        $epiCount = $em->getRepository(Item::class)->itemCountByRarity(7);
        $itemList = $em->getRepository(Item::class)->findNewest(5);
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'list' => $itemList,
            'count' => $itemCount,
            'legCount' => $legCount,
            'epiCount' => $epiCount
        ]);
    }
}
