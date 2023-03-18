<?php

namespace Padosoft\LaravelDressCodeApi\Response;

use Exception;
use Illuminate\Support\Facades\Validator;

class DressCodeResponse
{
    private $data;
    private $error;
    public $code = 200;

    public function __construct($data = null, $error = null)
    {
        $validator = Validator::make(
            [
                'data' => $data,
                'error' => $error,
            ],
            [
                'data' => 'nullable|array',
                'data.status' => 'nullable|string',
                'data.code' => 'nullable|string',
                'data.callbackID' => 'nullable|string',
                'data.title' => 'nullable|string',
                'data.detail' => 'nullable|string',
                'data.innerResponses' => 'nullable|array',
                'error' => 'nullable|array',
                'error.status' => 'nullable|string',
                'error.code' => 'nullable|string',
                'error.callbackID' => 'nullable|string',
                'error.title' => 'nullable|string',
                'error.detail' => 'nullable|string',
                'error.innerResponses' => 'nullable|array',
            ]
        );

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        if ($data !== null) {
            $this->setData($data);
        }
        if ($error !== null) {
            $this->setError($error);
        }
    }

    public static function create($data = null, $error = null)
    {
        return new self($data, $error);
    }

    public function setData($data)
    {
        if (isset($data['status'])) {
            $this->data['status'] = $data['status'];
        }
        if (isset($data['code'])) {
            $this->data['code'] = $data['code'];
        }
        if (isset($data['callbackID'])) {
            $this->data['callbackID'] = $data['callbackID'];
        }
        if (isset($data['title'])) {
            $this->data['title'] = $data['title'];
        }
        if (isset($data['detail'])) {
            $this->data['detail'] = $data['detail'];
        }
        if (isset($data['innerResponses'])) {
            $this->data['innerResponses'] = $data['innerResponses'];
        }
    }

    public function setError($error)
    {
        if (isset($error['status'])) {
            $this->error['status'] = $error['status'];
        }
        if (isset($error['code'])) {
            $this->error['code'] = $error['code'];
        }
        if (isset($error['callbackID'])) {
            $this->error['callbackID'] = $error['callbackID'];
        }
        if (isset($error['title'])) {
            $this->error['title'] = $error['title'];
        }
        if (isset($error['detail'])) {
            $this->error['detail'] = $error['detail'];
        }
        if (isset($error['innerResponses'])) {
            $this->error['innerResponses'] = $error['innerResponses'];
        }
    }

    public function getData()
    {
        return $this->data;
    }

    public function getError()
    {
        return $this->error;
    }

    public function setErrorCode($code)
    {
        $this->error['code'] = $code;
    }

    public function setDataCode($code)
    {
        $this->data['code'] = $code;
    }

    public function setErrorStatus($status)
    {
        $this->error['status'] = $status;
    }

    public function setDataStatus($status)
    {
        $this->data['status'] = $status;
    }

    public function setTitle($title, $isError = false)
    {
        if ($isError) {
            $this->error['title'] = $title;
        } else {
            $this->data['title'] = $title;
        }
    }

    public function setDetail($detail, $isError = false)
    {
        if ($isError) {
            $this->error['detail'] = $detail;
        } else {
            $this->data['detail'] = $detail;
        }
    }

    public function setInnerResponses($innerResponses, $isError = false)
    {
        if ($isError) {
            $this->error['innerResponses'] = $innerResponses;
        } else {
            $this->data['innerResponses'] = $innerResponses;
        }
    }

    public function toJson()
    {
        $data = [
            'data' => $this->data,
            'error' => $this->error,
        ];
        return json_encode($data);
    }

    public function toJsonCompressed()
    {
        if (!extension_loaded('zlib')) {
            throw new Exception('La compressione gzip non è supportata. L\'estensione zlib non è stata caricata.');
        }
        $data = [
            'data' => $this->data,
            'error' => $this->error,
        ];
        $jsonString = json_encode($data);
        return gzcompress($jsonString, 9); // compressione massima
    }

    public function toArray(){
        return [
            'data' => $this->data,
            'error' => $this->error,
        ];
    }
    public function setCode($code){
        $this->code = $code;
    }
    public function getCode(){
        return $this->code;
    }

}
