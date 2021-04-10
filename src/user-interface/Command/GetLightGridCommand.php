<?php
namespace UserInterface\Command;

use Domain\Application\CreateLightGrid\CreateLightGrid;
use Domain\Application\CreateLightGrid\CreateLightGridRequest;
use Domain\Application\GetLightGrid\GetLightGrid;
use Domain\Application\GetLightGrid\GetLightGridPresenterInterface;
use Domain\Application\GetLightGrid\GetLightGridRequest;
use Domain\Entity\Coordinate;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use UserInterface\Presenter\CreateLightGridPresenter;

class GetLightGridCommand extends Command
{
    protected static string $defaultName = 'app:get-light-grid';
    private GetLightGridPresenterInterface $presenter;
    private GetLightGrid $createLightGrid;

    public function __construct(GetLightGridPresenterInterface $presenter, GetLightGrid $createLightGrid)
    {
        $this->presenter = $presenter;
        $this->createLightGrid = $createLightGrid;
        parent::__construct();
    }


    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $request = new GetLightGridRequest(
            Uuid::fromString($input->getArgument('id'))
        );
        $this->createLightGrid->execute($request, $this->presenter);
        return Command::SUCCESS;
    }

    protected function configure()
    {
        parent::configure();
        $this->addArgument('id', InputArgument::REQUIRED,
        'The Light Grid Uuid');
    }


}