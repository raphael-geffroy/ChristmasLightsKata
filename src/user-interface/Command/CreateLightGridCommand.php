<?php
namespace UserInterface\Command;

use Domain\Application\CreateLightGrid\CreateLightGrid;
use Domain\Application\CreateLightGrid\CreateLightGridPresenterInterface;
use Domain\Application\CreateLightGrid\CreateLightGridRequest;
use Domain\Entity\Coordinate;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use UserInterface\Presenter\CreateLightGridPresenter;

class CreateLightGridCommand extends Command
{
    protected static string $defaultName = 'app:create-light-grid';
    private CreateLightGridPresenterInterface $presenter;
    private CreateLightGrid $createLightGrid;

    public function __construct(CreateLightGridPresenterInterface $presenter, CreateLightGrid $createLightGrid)
    {
        $this->presenter = $presenter;
        $this->createLightGrid = $createLightGrid;
        parent::__construct();
    }


    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $request = new CreateLightGridRequest(
            new Coordinate(
                $input->getArgument('x'),
                $input->getArgument('y')
            )
        );
        $this->createLightGrid->execute($request, $this->presenter);
        return Command::SUCCESS;
    }

    protected function configure()
    {
        parent::configure();
        $this->addArgument('x', InputArgument::REQUIRED,
            'The Light Grid X max');
        $this->addArgument('y', InputArgument::REQUIRED,
            'The Light Grid Y max');
    }
}