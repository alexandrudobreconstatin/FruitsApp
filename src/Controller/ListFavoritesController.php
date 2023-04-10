<?php

namespace App\Controller;

use App\Entity\Family;
use App\Entity\FavoriteFruits;
use App\Entity\Fruits;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListFavoritesController extends DefaultController
{
    #[Route('/list/favorites', name: 'app_list_favorites')]
    public function index(EntityManagerInterface $em): Response
    {
      $userId = $this->getLoggedInUserId();

      $favoriteFruits = $em->getRepository(FavoriteFruits::class);
      $familyRepository = $em->getRepository(Family::class);

//    dump($fruits);
//    die();
      $family = $familyRepository->findBy([],['name'=>'ASC']);
      $favorite = $favoriteFruits->findUserFavoriteFruitsWithDetails($userId);

      $favoriteFruits = $em->getRepository(FavoriteFruits::class)->findBy(['user_id' => $userId]);

      return $this->render('dashboard/favorites.html.twig', [
        'fruits' => $favorite,
        'familys' => $family,
        'userId' => $userId,
        'favorites' => $favoriteFruits,
      ]);
    }


}
