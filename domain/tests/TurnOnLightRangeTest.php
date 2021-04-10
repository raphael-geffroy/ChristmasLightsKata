<?php

namespace Domain\Test;

use Domain\Application\TurnOffLightRange\ToggleLightRange;
use Domain\Application\TurnOffLightRange\ToggleLightRangeRequest;
use Domain\Application\TurnOffLightRange\TurnOffLightRange;
use Domain\Application\TurnOffLightRange\TurnOffLightRangeRequest;
use Domain\Application\TurnOnLightRange\TurnOnLightRange;
use Domain\Application\TurnOnLightRange\TurnOnLightRangeRequest;
use Domain\Entity\Coordinate;
use Domain\Entity\LightGrid;
use Domain\Entity\CoordinatePair;
use Domain\Port\LightGridProvider;
use Domain\Test\Stub\InMemoryLightGridProvider;
use PHPUnit\Framework\TestCase;

class TurnOnLightRangeTest extends TestCase
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
    public function testLightOffIsTurnedOn()
    {
        $lightRange = new CoordinatePair(new Coordinate(1,1), new Coordinate(2,2));
        $this->turnOffLightRange($lightRange);
        $this->turnOnLightRange($lightRange);
        foreach ($this->lightGrid->getRange($lightRange) as $light){
            $this->assertTrue($light->isOn());
        }
    }
    /** @Test **/
    public function testLightOnStayTurnedOn()
    {
        $lightRange = new CoordinatePair(new Coordinate(1,1), new Coordinate(2,2));
        $this->turnOnLightRange($lightRange);
        $this->turnOnLightRange($lightRange);
        foreach ($this->lightGrid->getRange($lightRange) as $light){
            $this->assertTrue($light->isOn());
        }
    }

    private function turnOnLightRange($lightRange){
        $useCase = new TurnOnLightRange($this->lightGridProvider);
        $request = new TurnOnLightRangeRequest($this->lightGrid->getId(), $lightRange);
        $useCase->execute($request);
    }
    private function turnOffLightRange($lightRange){
        $useCase = new TurnOffLightRange($this->lightGridProvider);
        $request = new TurnOffLightRangeRequest($this->lightGrid->getId(), $lightRange);
        $useCase->execute($request);
    }
}