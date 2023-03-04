<?php

namespace Padosoft\LaravelDressCodeApi\dto;

use Illuminate\Database\Eloquent\Model;

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

    public static function createFromModel(Model $model): ProductCompositionDto
    {
        return new self(
            $model->material,
            $model->percentage
        );
    }

    public function toArray(): array
    {
        return [
            'material' => $this->material,
            'percentage' => $this->percentage,
        ];
    }
}
