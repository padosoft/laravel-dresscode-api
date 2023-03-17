<?php

namespace Padosoft\LaravelDressCodeApi\Service;

use Illuminate\Support\Facades\Validator;
use Padosoft\LaravelDressCodeApi\Models\DresscodeLogs;

class LoggerService
{
    private $log;
    private string $type = 'out';
    private string $method = 'GET';
    private string $route = '';
    private string $zip = 'false';
    private string $data = '';
    private string $ip_address = '127.0.0.1';

    public function __construct(DresscodeLogs $log)
    {
        $this->log = $log;
    }

    public function out()
    {
        $this->type = 'out';
        return $this;
    }

    public function in()
    {
        $this->type = 'in';
        return $this;
    }

    public function post()
    {
        $this->method = 'POST';
        return $this;
    }

    public function get()
    {
        $this->method = 'GET';
        return $this;
    }

    public function route($route)
    {
        $this->route = $route;
        return $this;
    }


    public function data($data)
    {
        if (!extension_loaded('zlib')) {
            $this->zip = false;
            $this->data = $data;
            return $this;
        }
        $this->zip = true;
        $this->data = gzcompress($data, 9);
    }

    public function ip(string $ip_address = null)
    {
        //se null prendo l'ip del client
        if ($ip_address === null) {
            $ip_address = request()->ip();
        }
        //valida l'ip con Validator
        $validate = Validator::make(
            [
                'ip_address' => $ip_address
            ],
            [
                'ip_address' => 'ip'
            ]
        );
        //se non è valido lo setto a 127.0.0.1
        if ($validate->fails()) {
            $ip_address = '127.0.0.1';
        }
        $this->ip_address = $ip_address;
        return $this;
    }

    public function save()
    {
        $this->log->create([
            'type' => $this->type,
            'method' => $this->method,
            'route' => $this->route,
            'zip' => $this->zip,
            'data' => $this->data,
            'ip_address' => $this->ip_address
        ]);
    }
}