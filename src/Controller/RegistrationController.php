<?php

namespace App\Controller;


use App\Entity\Users;
//use App\Form\RegistrationFormType;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
  /**
   * @Route("/register", name="app_register")
   */
  public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
  {
    $user = new Users();
    $form = $this->createForm(RegistrationFormType::class, $user);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $user->setPassword(
        $passwordEncoder->encodePassword(
          $user,
          $form->get('plainPassword')->getData()
        )
      );
      $user->setActive(1);
      $user->setNotificationAlert(0);

      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->persist($user);
      $entityManager->flush();
      $this->addFlash('success', 'Register Successfully! Now you can login with your credentials.');

      return $this->redirectToRoute('app_login');
    }

    return $this->render('registration/register.html.twig', [
      'registrationForm' => $form->createView(),
    ]);
  }
}
