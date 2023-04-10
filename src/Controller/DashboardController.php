<?php

namespace App\Controller;

use App\Entity\FavoriteFruits;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends DefaultController
{
  #[Route('/dashboard', name: 'app_dashboard')]
  public function index(EntityManagerInterface $em): Response
  {
    $userId = $this->getLoggedInUserId();
    $favoriteFruits = $em->getRepository(FavoriteFruits::class)->findBy(['user_id' => $userId]);

    return $this->render('dashboard/dashboard.html.twig', [
      'controller_name' => 'DashboardController',
      'favorites'       => $favoriteFruits,
    ]);
  }
}
