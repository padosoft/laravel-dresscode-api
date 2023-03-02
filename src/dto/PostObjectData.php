<?php

namespace Padosoft\LaravelDressCodeApi\dto;

use Padosoft\LaravelDressCodeApi\dto\AutoDtoBase;

class PostObjectData extends AutoDtoBase
{
    public string $wmsID;
    public string $dataType;
    public array $data;
    public string $mimeType;
    public bool $testMode;

    public static function create(array $data): PostObjectData
    {
        return new self($data);
    }

    public function getStructureRules(): array
    {
        return [
            "wmsID" => "string",
            "dataType" => "string",
            "data" => "array",
            "mimeType" => "string",
            "testMode" => "bool"
        ];
    }
}