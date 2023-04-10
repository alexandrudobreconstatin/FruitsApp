<?php

namespace App\Command;

use App\Entity\EmailQueue;
use App\Repository\EmailQueueRepository;
use App\Services\EmailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SendEmailsCommand extends Command
{
  protected static $defaultName = 'app:send-emails';

  private EmailQueueRepository $emailQueueRepository;
  private EmailService $emailService;
  private EntityManagerInterface $entityManager;

  public function __construct(EmailQueueRepository $emailQueueRepository, EmailService $emailService, EntityManagerInterface $entityManager)
  {
    $this->emailQueueRepository = $emailQueueRepository;
    $this->emailService = $emailService;
    $this->entityManager = $entityManager;

    parent::__construct();
  }

  protected function configure()
  {
    $this->setDescription('Send pending emails from the email queue.');
  }

  protected function execute(InputInterface $input, OutputInterface $output): int
  {
    $pendingEmails = $this->emailQueueRepository->findBy(['status' => 0]);

    foreach ($pendingEmails as $emailQueue) {
      $this->emailService->sendEmail(
        $emailQueue->getEmailFrom(),
        $emailQueue->getEmailTo(),
        $emailQueue->getEmailSubject(),
        $emailQueue->getEmailContent(),
        $emailQueue->getEmailCC(),
        $emailQueue->getEmailBcc()
      );

      $emailQueue->setStatus(1);
      $emailQueue->setDateSent(new \DateTime());
      $this->entityManager->persist($emailQueue);
    }

    $this->entityManager->flush();

    $output->writeln('Emails sent successfully.');

    return Command::SUCCESS;
  }
}
