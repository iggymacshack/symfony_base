<?php

namespace App\Controller;

use App\Entity\Item;
use App\Entity\Rarity;
use App\Entity\ItemType as ItemTypeEntity;
use App\Entity\Stats;
use App\Entity\WeaponAttackSpeed;
use App\Form\ItemType;
use App\Form\RarityType;
use App\Form\ItemTypeType;
use App\Form\StatsType;
use App\Form\WeaponAttackSpeedType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewItemController extends AbstractController
{
    #[Route('/item', name: 'item')]
    public function index(): Response
    {
        return $this->render('new_item/index.html.twig', [
            'controller_name' => 'NewItemController',
        ]);
    }

    #[Route('/item/list', name: 'list', methods: ['GET'])]
    public function list(HttpFoundationRequest $request, EntityManagerInterface $em):Response{
        $itemList = $em->getRepository(Item::class)->findAllWithLimit(10);
        return $this->render('list_items/index.html.twig', [
            'list' => $itemList,
        ]);
    }

    #[Route('/item/view/{id}', name: 'view', methods: ['GET'])]
    public function view(HttpFoundationRequest $request, EntityManagerInterface $em):Response{
        $item = $em->getRepository(Item::class)->findWithId(explode("/",$request->getPathInfo())[3]);
        return $this->render('view_item/index.html.twig', [
            'item' => $item,
        ]);
    }

    #[Route('/item/new', name: 'creation', methods: ['GET', 'POST'])]
    public function creation(HttpFoundationRequest $request, EntityManagerInterface $em): Response
    {
        $item = new Item();
        $formItem = $this->createForm(ItemType::class, $item);
        $formItem->handleRequest($request);

        $weaponas = new WeaponAttackSpeed();
        $formWeaponAS = $this->createForm(WeaponAttackSpeedType::class, $weaponas);
        $formWeaponAS->handleRequest($request);

        $itemtype = new ItemTypeEntity();
        $formType = $this->createForm(ItemTypeType::class, $itemtype);
        $formType->handleRequest($request);

        $rarity = new Rarity();
        $formRarity = $this->createForm(RarityType::class, $rarity);
        $formRarity->handleRequest($request);
        
        if ($formItem->isSubmitted() && $formItem->isValid()) {
            $em->persist($item);
            $em->flush();
    
            $this->addFlash('success', 'Item créé!');
            return $this->redirectToRoute('creation');
        }
    
        return $this->render('new_item/index.html.twig', [
            'item' => $item,
            'form' => $formItem->createView(),
        ]);
    }
}
