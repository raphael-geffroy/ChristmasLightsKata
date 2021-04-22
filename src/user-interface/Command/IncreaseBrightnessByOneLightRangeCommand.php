<?php
namespace UserInterface\Command;

use Domain\Application\IncreaseBrightnessByOneLightRange\IncreaseBrightnessByOneLightRange;
use Domain\Application\IncreaseBrightnessByOneLightRange\IncreaseBrightnessByOneLightRangeRequest;
use Domain\Entity\Coordinate;
use Domain\Entity\CoordinatePair;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class IncreaseBrightnessByOneLightRangeCommand extends Command
{
    protected static string $defaultName = 'app:increase-one-light-range';
    private IncreaseBrightnessByOneLightRange $increaseBrightnessByOneLightRange;

    public function __construct(IncreaseBrightnessByOneLightRange $increaseBrightnessByOneLightRange)
    {
        $this->increaseBrightnessByOneLightRange = $increaseBrightnessByOneLightRange;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $lightRange = new CoordinatePair(
            new Coordinate($input->getArgument('minX'),$input->getArgument('minY')),
            new Coordinate($input->getArgument('maxX'),$input->getArgument('maxY'))
        );
        $request = new IncreaseBrightnessByOneLightRangeRequest(
            Uuid::fromString($input->getArgument('id')),
            $lightRange
        );
        $this->increaseBrightnessByOneLightRange->execute($request);
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