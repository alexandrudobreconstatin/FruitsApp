<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ErrorController extends AbstractController
{
  /**
   * @Route("/error", name="error")
   */
  public function error(Request $request): Response
  {
    $exception = $request->attributes->get('exception');

    if ($exception instanceof NotFoundHttpException) {
      $message = 'Page not found';
    } elseif ($exception instanceof AccessDeniedHttpException) {
      $message = "You don't have permission to access this page";
    } else {
      $message = 'An error occurred. Please try again later.';
    }

    return $this->render('error/error.html.twig', [
      'message' => $message,
    ]);
  }
}
