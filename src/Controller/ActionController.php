<?php

namespace App\Controller;

use App\Entity\FavoriteFruits;
use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActionController extends DefaultController
{
  #[Route('/action', name: 'app_action')]
  public function index(EntityManagerInterface $em): Response
  {
    $userId = $this->getLoggedInUserId();
    $user = $em->getRepository(Users::class)->find($userId);
    $favoriteFruits = $em->getRepository(FavoriteFruits::class)->findBy(['user_id' => $userId]);


    return $this->render('dashboard/action.html.twig', [
      'controller_name' => 'ActionController',
      'favorites' => $favoriteFruits,
    ]);
  }
}
