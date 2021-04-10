<?php


namespace Domain\Application\GetLightGrid;


use Ramsey\Uuid\UuidInterface;

class GetLightGridRequest
{
    private UuidInterface $id;

    /**
     * GetLightGridRequest constructor.
     * @param UuidInterface $id
     */
    public function __construct(UuidInterface $id)
    {
        $this->id = $id;
    }

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }


}