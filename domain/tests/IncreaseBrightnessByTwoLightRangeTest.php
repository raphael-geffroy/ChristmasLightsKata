<?php

namespace Domain\Test;

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
use Domain\Test\Stub\InMemoryLightGridProvider;
use PHPUnit\Framework\TestCase;

class IncreaseBrightnessByTwoLightRangeTest extends TestCase
{
    private LightGrid $lightGrid;
    private LightGridProvider $lightGridProvider;

    /** @Before */
    public function setUp(): void
    {
        $this->lightGridProvider = new InMemoryLightGridProvider();
        $maxCoordinates = new Coordinate(2,2);
        $this->lightGrid = new LightGrid($maxCoordinates);
        $this->lightGridProvider->save($this->lightGrid);
    }

    /** @Test **/
    public function testLightBrightnessIsZeroToTwo()
    {
        $lightRange = new CoordinatePair(new Coordinate(1,1), new Coordinate(2,2));
        $this->increaseBrightnessByTwoLightRange($lightRange);
        foreach ($this->lightGrid->getRange($lightRange) as $light){
            $this->assertEquals(2,$light->getBrightness());
        }
    }
    
    /** @Test **/
    public function testLightBrightnessIsTwoToFour()
    {
        $lightRange = new CoordinatePair(new Coordinate(1,1), new Coordinate(2,2));
        $this->increaseBrightnessByTwoLightRange($lightRange);
        $this->increaseBrightnessByTwoLightRange($lightRange);
        foreach ($this->lightGrid->getRange($lightRange) as $light){
            $this->assertEquals(4,$light->getBrightness());
        }
    }

    private function decreaseBrightnessByOneMinZeroLightRange($lightRange){
        $useCase = new DecreaseBrightnessByOneMinZeroLightRange($this->lightGridProvider);
        $request = new DecreaseBrightnessByOneMinZeroLightRangeRequest($this->lightGrid->getId(), $lightRange);
        $useCase->execute($request);
    }
    private function increaseBrightnessByTwoLightRange($lightRange){
        $useCase = new IncreaseBrightnessByTwoLightRange($this->lightGridProvider);
        $request = new IncreaseBrightnessByTwoLightRangeRequest($this->lightGrid->getId(), $lightRange);
        $useCase->execute($request);
    }
}