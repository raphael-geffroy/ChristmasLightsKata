<?php

namespace Domain\Entity;

use phpDocumentor\Reflection\Types\Boolean;

class Light
{
    private bool $isOn;
    private int $brightness;

    public function __construct()
    {
        $this->isOn = false;
        $this->brightness=0;
    }

    /** @return bool */
    public function isOn(): bool
    {
        return $this->isOn;
    }
    public function getBrightness(){
        return $this->brightness;
    }

    public function increaseBrightnessByOne(){
        $this->brightness += 1;
    }
    public function decreaseBrightnessByOneMinZero(){
        $this->brightness = max(0, $this->brightness-1);
    }
    public function increaseBrightnessByTwo(){
        $this->brightness += 2;
    }

}