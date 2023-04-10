<?php

namespace App\Controller;

use App\Entity\Family;
use App\Entity\FavoriteFruits;
use App\Entity\Fruits;
use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListFruitsController extends DefaultController
{
  #[Route('/list/fruits', name: 'app_list_fruits')]
  public function index(EntityManagerInterface $em): Response
  {

    $userId = $this->getLoggedInUserId();


//    dump($userId);
//    die();

    $fruitRepository = $em->getRepository(Fruits::class);
    $familyRepository = $em->getRepository(Family::class);
    $fruits = $fruitRepository->findAllWithDetails();

//    dump($fruits);
//    die();
    $family = $familyRepository->findBy([],['name'=>'ASC']);
    $favoriteFruits = $em->getRepository(FavoriteFruits::class)->findBy(['user_id' => $userId]);


    return $this->render('dashboard/fruits.html.twig', [
      'fruits' => $fruits,
      'familys' => $family,
      'userId' => $userId,
      'favorites' => $favoriteFruits,
    ]);
  }

  #[Route('/add-to-favorites', name: 'app_add_to_favorites')]
  public function addToFavorites(Request $request, EntityManagerInterface $em): JsonResponse
  {
    $userId = $request->request->get('user_id');
    $fruitId = $request->request->get('fruit_id');


    // Find User in DB
    $userRepository = $em->getRepository(Users::class);

    $fruitRepository = $em->getRepository(Fruits::class);
    $favoriteFruitRepository = $em->getRepository(FavoriteFruits::class);

    $user = $userRepository->findOneBy(['id'=>$userId])->getId();
    $fruit = $fruitRepository->findOneBy(['fruitId'=>$fruitId])->getFruitId();


    if (!$user || !$fruit) {
      return new JsonResponse([
        'success' => false,
        'message' => 'User or fruit not found.',
      ]);
    }


    //Check if the fruit is already in the user's favorites
    $favoriteFruit = $favoriteFruitRepository->findOneBy(['user_id' => $user, 'fruitId' => $fruit]);

    if ($favoriteFruit) {
      // If the fruit is already in your favorites, delete it
      $em->remove($favoriteFruit);
      $em->flush();

      return new JsonResponse([
        'success' => true,
        'action' => 'remove',
      ]);
    } else {
      // Check if the user already has 10 fruits in favorites
      $userFavoritesCount = $favoriteFruitRepository->count(['user_id' => $user]);

      if ($userFavoritesCount >= 10) {
        return new JsonResponse([
          'success' => false,
          'message' => 'You cannot add more than 10 fruits to favorites.',
          'limitReached' => true,
        ]);
      }

      // If it is not in favorites and the user does not already have 10 fruits in favorites, add the fruit to favorites


      $newFavoriteFruit = new FavoriteFruits();
      $newFavoriteFruit->setUserId((int)$user);
      $newFavoriteFruit->setFruitId((int)$fruit);
      $em->persist($newFavoriteFruit);
      $em->flush();

      return new JsonResponse([
        'success' => true,
        'action' => 'add',
      ]);
    }
  }


}
