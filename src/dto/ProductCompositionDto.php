<?php

namespace Padosoft\LaravelDressCodeApi\dto;

class ProductCompositionDto
{
    public string $material;
    public float $percentage;

    public function __construct(string $material, float $percentage)
    {
        $this->material = $material;
        $this->percentage = $percentage;
    }

    public static function create(string $material, float $percentage): ProductCompositionDto
    {
        return new self($material, $percentage);
    }
}
