<?php

namespace App\Controller;

use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
  #[Route('/login', name: 'app_login')]
  public function login(AuthenticationUtils $authenticationUtils): Response
  {
    if ($this->getUser()) {
      return $this->redirectToRoute('app_dashboard');
    }

    $error = $authenticationUtils->getLastAuthenticationError();
    $lastUsername = $authenticationUtils->getLastUsername();

    return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
  }

  /**
   * @Route("/logout", name="app_logout")
   * @throws Exception
   */
  public function logout()
  {
    throw new Exception('This method can be blank - it will be intercepted by the logoutkey on your firewall');
  }

}
