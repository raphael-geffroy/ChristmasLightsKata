<?php

namespace Domain\Test;

use Domain\Application\DecreaseBrightnessByOneMinZeroLightRange\IncreaseBrightnessByTwoLightRange;
use Domain\Application\DecreaseBrightnessByOneMinZeroLightRange\IncreaseBrightnessByTwoLightRangeRequest;
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

class IncreaseBrightnessByOneLightRangeTest extends TestCase
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
    public function testLightBrightnessIsZeroToOne()
    {
        $lightRange = new CoordinatePair(new Coordinate(1,1), new Coordinate(2,2));
        $this->increaseBrightnessByOneLightRange($lightRange);
        foreach ($this->lightGrid->getRange($lightRange) as $light){
            $this->assertEquals(1,$light->getBrightness());
        }
    }
    
    /** @Test **/
    public function testLightBrightnessIsOneToTwo()
    {
        $lightRange = new CoordinatePair(new Coordinate(1,1), new Coordinate(2,2));
        $this->increaseBrightnessByOneLightRange($lightRange);
        $this->increaseBrightnessByOneLightRange($lightRange);
        foreach ($this->lightGrid->getRange($lightRange) as $light){
            $this->assertEquals(2,$light->getBrightness());
        }
    }

    private function increaseBrightnessByOneLightRange($lightRange){
        $useCase = new IncreaseBrightnessByOneLightRange($this->lightGridProvider);
        $request = new IncreaseBrightnessByOneLightRangeRequest($this->lightGrid->getId(), $lightRange);
        $useCase->execute($request);
    }
    private function decreaseBrightnessByOneMinZeroLightRange($lightRange){
        $useCase = new DecreaseBrightnessByOneMinZeroLightRange($this->lightGridProvider);
        $request = new DecreaseBrightnessByOneMinZeroLightRangeRequest($this->lightGrid->getId(), $lightRange);
        $useCase->execute($request);
    }
}