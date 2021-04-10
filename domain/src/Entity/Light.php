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

    /**
     * @return bool
     */
    public function isOn(): bool
    {
        return $this->isOn;
    }

    /**
     * @param bool $isOn
     */
    public function setIsOn(bool $isOn): void
    {
        $this->isOn = $isOn;
    }


}