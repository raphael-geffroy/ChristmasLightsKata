<?php

namespace Domain\Entity;

use phpDocumentor\Reflection\Types\Boolean;

class Light
{
    private bool $isOn;

    public function __construct()
    {
        $this->isOn = false;
    }

    /** @return bool */
    public function isOn(): bool
    {
        return $this->isOn;
    }

    public function turnOn(){
        $this->isOn = true;
    }
    public function turnOff(){
        $this->isOn = false;
    }
    public function toggle(){
        $this->isOn = !$this->isOn;
    }

}