<?php

namespace Padosoft\LaravelDressCodeApi;

class PostResponse
{
    public string $status;
    public array $data;

    public function __construct(string $status, array $data)
    {
        $this->status = $status;
        $this->data = $data;
    }

    public static function create(string $status, array $data): PostResponse
    {
        return new self($status, $data);
    }
}