<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Security;

class DefaultController extends AbstractController
{
  protected $security;

  public function __construct(Security $security)
  {
    $this->security = $security;
  }

  protected function getLoggedInUserId()
  {
    $user = $this->security->getUser();

    return $user?->getId();

  }

}
