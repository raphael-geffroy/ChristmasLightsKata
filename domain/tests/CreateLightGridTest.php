<?php

namespace Domain\Test;

use Domain\Application\CreateLightGrid\CreateLightGrid;
use Domain\Application\CreateLightGrid\CreateLightGridRequest;
use Domain\Application\ToggleLightRange\ToggleLightRange;
use Domain\Application\ToggleLightRange\ToggleLightRangeRequest;
use Domain\Application\TurnOffLightRange\TurnOffLightRange;
use Domain\Application\TurnOffLightRange\TurnOffLightRangeRequest;
use Domain\Application\TurnOnLightRange\TurnOnLightRange;
use Domain\Application\TurnOnLightRange\TurnOnLightRangeRequest;
use Domain\Entity\Coordinate;
use Domain\Entity\LightGrid;
use Domain\Entity\CoordinatePair;
use Domain\Port\LightGridProvider;
use Domain\Test\Stub\CreateLightGridPresenter;
use Domain\Test\Stub\InMemoryLightGridProvider;
use PHPUnit\Framework\TestCase;

class CreateLightGridTest extends TestCase
{
    private LightGridProvider $lightGridProvider;
    private CreateLightGridPresenter $createLightGridPresenter;

    /** @Before */
    public function setUp(): void
    {
        $this->lightGridProvider = new InMemoryLightGridProvider();
        $this->createLightGridPresenter = new CreateLightGridPresenter();
    }

    /** @Test **/
    public function testLightGridIsCreated()
    {
        $maxCoordinate = new Coordinate(2,2);
        $this->createLightGrid($maxCoordinate);
        $this->assertTrue(
            /*!empty(array_filter(
                $this->lightGridProvider->findAll(),
                function (LightGrid $lightGrid) use ($maxCoordinate) {
                    return ($lightGrid->getMaxCoordinate()===$maxCoordinate);
                }
            ))*/
            $this->createLightGridPresenter->getLightGrid()->getMaxCoordinate() === $maxCoordinate
        );
    }

    private function createLightGrid(Coordinate $maxCoordinate){
        $useCase = new CreateLightGrid($this->lightGridProvider);
        $request = new CreateLightGridRequest($maxCoordinate);
        $useCase->execute($request, $this->createLightGridPresenter);
    }

}