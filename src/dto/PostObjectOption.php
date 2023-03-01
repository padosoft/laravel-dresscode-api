<?php

namespace Padosoft\LaravelDressCodeApi\Models\dto;

use Padosoft\LaravelDressCodeApi\Models\dto\AutoDtoBase;

class PostObjectOption extends AutoDtoBase
{
    public string $name;
    public string $value;

    public static function create(array $data): PostObjectOption
    {
        return new self($data);
    }

    public function getStructureRules(): array
    {
        return [
            "name" => "string",
            "value" => "string"
        ];
    }
}