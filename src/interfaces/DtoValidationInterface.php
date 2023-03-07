<?php

namespace Padosoft\LaravelDressCodeApi\interfaces;

interface DtoValidationInterface
{

    public function validate(): bool;

    public function toArray(): array;

    public function validationRoles(): array;

    public function validationMessages(): array;

    public function validationAttributes(): array;

}