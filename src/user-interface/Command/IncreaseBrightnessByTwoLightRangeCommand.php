<?php
namespace UserInterface\Command;

use Domain\Application\CreateLightGrid\CreateLightGrid;
use Domain\Application\CreateLightGrid\CreateLightGridRequest;
use Domain\Application\GetLightGrid\GetLightGrid;
use Domain\Application\GetLightGrid\GetLightGridPresenterInterface;
use Domain\Application\GetLightGrid\GetLightGridRequest;
use Domain\Application\IncreaseBrightnessByTwoLightRange\IncreaseBrightnessByTwoLightRange;
use Domain\Application\IncreaseBrightnessByTwoLightRange\IncreaseBrightnessByTwoLightRangeRequest;
use Domain\Entity\Coordinate;
use Domain\Entity\CoordinatePair;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use UserInterface\Presenter\CreateLightGridPresenter;

class IncreaseBrightnessByTwoLightRangeCommand extends Command
{
    protected static string $defaultName = 'app:increase-two-light-range';
    private IncreaseBrightnessByTwoLightRange $increaseBrightnessByTwoLightRange;

    public function __construct(IncreaseBrightnessByTwoLightRange $increaseBrightnessByTwoLightRange)
    {
        $this->increaseBrightnessByTwoLightRange = $increaseBrightnessByTwoLightRange;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $lightRange = new CoordinatePair(
            new Coordinate($input->getArgument('minX'),$input->getArgument('minY')),
            new Coordinate($input->getArgument('maxX'),$input->getArgument('maxY'))
        );
        $request = new IncreaseBrightnessByTwoLightRangeRequest(
            Uuid::fromString($input->getArgument('id')),
            $lightRange
        );
        $this->increaseBrightnessByTwoLightRange->execute($request);
        return Command::SUCCESS;
    }

    protected function configure()
    {
        parent::configure();
        $this
            ->addArgument('id', InputArgument::REQUIRED, 'The Light Grid Uuid')
            ->addArgument('minX', InputArgument::REQUIRED, 'The Light Grid min X')
            ->addArgument('minY', InputArgument::REQUIRED, 'The Light Grid min Y')
            ->addArgument('maxX', InputArgument::REQUIRED, 'The Light Grid max X')
            ->addArgument('maxY', InputArgument::REQUIRED, 'The Light Grid max Y');
    }


}