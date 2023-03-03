<?php

namespace Padosoft\LaravelDressCodeApi\dto;

class ApiResponseObject extends AutoDtoBase
{
    public string $status;
    public ?string $code;
    public ?string $callbackID;
    public string $title;
    public ?string $detail;
    public ?array $innerResponses;

    public static function create(array $data): ApiResponseObject
    {
        return new self($data);
    }

    public function getStructureRules(): array
    {
        return [
            "status" => "string",
            "code" => ["string", "null"],
            "callbackID" => ["string", "null"],
            "title" => "string",
            "detail" => ["string", "null"],
            "innerResponses" => ["array", "null"],
        ];
    }
}