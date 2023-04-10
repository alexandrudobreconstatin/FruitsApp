<?php

namespace App\Controller;

use App\Entity\FavoriteFruits;
use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListSettingsController extends DefaultController
{
  #[Route('/settings', name: 'app_settings', methods: ['GET', 'POST'])]
    public function index(EntityManagerInterface $em,Request $request): Response
    {
      $userId = $this->getLoggedInUserId();
      $user = $em->getRepository(Users::class)->find($userId);
      $favoriteFruits = $em->getRepository(FavoriteFruits::class)->findBy(['user_id' => $userId]);

      if ($request->isMethod('POST')) {
        // check and validation
        $isValid = true;
        $errorMessage = '';

        // Verificați dacă email-ul este valid
        if (!filter_var($request->request->get('email'), FILTER_VALIDATE_EMAIL)) {
          $isValid = false;
          $errorMessage = 'Adresa de e-mail nu este validă.';
        }

        if ($isValid) {
          $user->setFirstName($request->request->get('first_name'))
            ->setLastName($request->request->get('last_name'))
            ->setUsername($request->request->get('username'))
            ->setEmail($request->request->get('email'))
            ->setActive($request->request->get('active') === 'on')
            ->setNotificationAlert($request->request->get('notification_alert') === 'on');

          $em->persist($user);
          $em->flush();

          // JSON  succes
          return new JsonResponse(['success' => true]);
        } else {
          //  JSON  Error
          return new JsonResponse(['success' => false, 'error' => $errorMessage]);
        }
      }

        return $this->render('dashboard/settings.html.twig', [
          'favorites' => $favoriteFruits,
          'user' => $user,
        ]);
    }
}
