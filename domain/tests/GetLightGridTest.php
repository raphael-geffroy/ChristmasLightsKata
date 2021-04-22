<?php

namespace Domain\Test;

use Domain\Application\CreateLightGrid\CreateLightGrid;
use Domain\Application\CreateLightGrid\CreateLightGridRequest;
use Domain\Application\GetLightGrid\GetLightGrid;
use Domain\Application\GetLightGrid\GetLightGridPresenterInterface;
use Domain\Application\GetLightGrid\GetLightGridRequest;
use Domain\Application\IncreaseBrightnessByTwoLightRange\IncreaseBrightnessByTwoLightRange;
use Domain\Application\IncreaseBrightnessByTwoLightRange\IncreaseBrightnessByTwoLightRangeRequest;
use Domain\Application\DecreaseBrightnessByOneMinZeroLightRange\DecreaseBrightnessByOneMinZeroLightRange;
use Domain\Application\DecreaseBrightnessByOneMinZeroLightRange\DecreaseBrightnessByOneMinZeroLightRangeRequest;
use Domain\Application\IncreaseBrightnessByOneLightRange\IncreaseBrightnessByOneLightRange;
use Domain\Application\IncreaseBrightnessByOneLightRange\IncreaseBrightnessByOneLightRangeRequest;
use Domain\Entity\Coordinate;
use Domain\Entity\LightGrid;
use Domain\Entity\CoordinatePair;
use Domain\Port\LightGridProvider;
use Domain\Test\Stub\CreateLightGridPresenter;
use Domain\Test\Stub\GetLightGridPresenter;
use Domain\Test\Stub\InMemoryLightGridProvider;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class GetLightGridTest extends TestCase
{
    private LightGridProvider $lightGridProvider;
    private GetLightGridPresenter $getLightGridPresenter;
    private UuidInterface $lightGridId;

    /** @Before */
    public function setUp(): void
    {
        $this->lightGridProvider = new InMemoryLightGridProvider();
        $this->getLightGridPresenter = new GetLightGridPresenter();
        $lightGrid = new LightGrid(new Coordinate(1,1));
        $this->lightGridProvider->save($lightGrid);
        $this->lightGridId = $lightGrid->getId();
    }

    /** @Test **/
    public function testLightGridIsRecuperated()
    {
        $this->getLightGrid($this->lightGridId);
        $this->assertTrue(
            $this->getLightGridPresenter->getLightGrid()->getId() === $this->lightGridId
        );
    }

    private function getLightGrid(UuidInterface $id){
        $useCase = new GetLightGrid($this->lightGridProvider);
        $request = new GetLightGridRequest($id);
        $useCase->execute($request, $this->getLightGridPresenter);
    }

}