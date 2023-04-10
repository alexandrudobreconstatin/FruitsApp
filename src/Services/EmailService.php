<?php

namespace App\Services;

use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class EmailService
{
  private MailerInterface $mailer;

  public function __construct(MailerInterface $mailer)
  {
    $this->mailer = $mailer;
  }

  /**
   * @throws TransportExceptionInterface
   */
  public function sendEmail(string $emailFrom, string $emailTo, string $subject, string $content, ?string $emailCC = null, ?string $emailBcc = null): void
  {
    $email = (new Email())
      ->from($emailFrom)
      ->to($emailTo)
      ->subject($subject)
      ->text($content);

    if ($emailCC) {
      $email->cc($emailCC);
    }

    if ($emailBcc) {
      $email->bcc($emailBcc);
    }

    $this->mailer->send($email);
  }
}



