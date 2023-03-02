<?php

namespace Padosoft\LaravelDressCodeApi\dto;

use Padosoft\LaravelDressCodeApi\dto\AutoDtoBase;

class ResponseObject extends AutoDtoBase
{
    public string $status;

    public ApiResponseObject $data;
    public ?array $meta;
    public ApiResponseObject $error;
    public ApiResponseObject $warning;

    public static function create(array $data): ResponseObject
    {
        return new self($data);
    }

    public function getStructureRules(): array
    {
        return [
            "status" => "string",
            "data" => $this->isObj(ApiResponseObject::class),
            "meta" => ["string", "null"],
            "error" => [$this->isObj(ApiResponseObject::class), "null"],
            "warning" => [$this->isObj(ApiResponseObject::class), "null"],
        ];
    }
}