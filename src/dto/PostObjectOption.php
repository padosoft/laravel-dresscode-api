<?php

namespace Padosoft\LaravelDressCodeApi\dto;

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
            "value" => "string",
        ];
    }
}