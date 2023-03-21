<?php

namespace Padosoft\LaravelDressCodeApi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Throwable;

class RawImportValidate implements RawValidationInterface

{
    protected bool $error = false;
    protected string $message = '';
    protected string $model = '';
    protected array $validate = [];
    protected array $validateMessage = [];
    protected array $dataFields = [];

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public static function make(Model $model): self
    {
        return new self($model);
    }

    public function getError(int $id): bool
    {
        return $this->model->where('id', $id)->first()->import_error ?? true;
    }

    public function getMessageError(int $id): string
    {
        return $this->model->where('id', $id)->first()->import_error_message ?? '';
    }

    public function saveError(string $message): void
    {
        $this->model->update(['import_error' => true, 'import_error_message' => $message]);
    }

    public function saveSuccess(): void
    {
        $this->model->update(['import_error' => false, 'import_error_message' => '']);
    }

    public function updateStatusImport(bool $success = true, string $message = ''): void
    {
        if ($success) {
            $this->saveSuccess();
        } else {
            $this->saveError($message);
        }
    }

    public function validateRoles(array $validate)
    {
        $this->validate = $validate;
        return $this;
    }

    public function validateMessage(array $validateMessage)
    {
        $this->validateMessage = $validateMessage;
        return $this;
    }

    public function dataFields(array $dataFields)
    {
        $this->dataFields = $dataFields;
        return $this;
    }

    public function validate()
    {
        try {
            Validator::make($this->dataFields, $this->validate, $this->validateMessage)->validate();
            return $this->model;
        } catch (Throwable $e) {
            $this->updateStatusImport(false, $e->getMessage());
        }

    }

    public function save(string $modelSaveIn): bool
    {
        try {
            $this->validate();
            //create model from name
            $model = new $$modelSaveIn();
            $model->fill($this->dataFields);
            $model->save();
            $this->updateStatusImport();
            return $model;
        } catch (Throwable $e) {
            return false;
        }
    }

    /**
     * @return array
     */
    public function getValidate(): array
    {
        // TODO: Implement getValidate() method.
    }

    /**
     * @return array
     */
    public function getValidateMessage(): array
    {
        // TODO: Implement getValidateMessage() method.
    }

    /**
     * @param Model $model
     *
     * @return array
     */
    public function getDataFields(Model $model): array
    {
        // TODO: Implement getDataFields() method.
    }}
