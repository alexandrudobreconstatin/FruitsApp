<?php

namespace App\Command;

use App\Services\FruitsService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

#[AsCommand(
  name: 'app:fetch:fruits',
  description: 'Fetch Fruits from https://fruityvice.com/  ',
)]
class FetchFruitsCommand extends Command
{
  private $fruitsService;

  public function __construct(FruitsService $fruitsService)
  {
    $this->fruitsService = $fruitsService;

    parent::__construct();
  }

  protected function configure(): void
  {

  }

  /**
   * @throws TransportExceptionInterface
   * @throws ServerExceptionInterface
   * @throws RedirectionExceptionInterface
   * @throws DecodingExceptionInterface
   * @throws ClientExceptionInterface
   */
  protected function execute(InputInterface $input, OutputInterface $output): int
  {
    $io = new SymfonyStyle($input, $output);

    // Call method `fetchAndSaveFruits`
    $this->fruitsService->fetchAndSaveFruits();

    $io->success('Fruits has been saved successfully.');

    return Command::SUCCESS;
  }
}
