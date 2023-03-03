<?php

namespace Padosoft\LaravelDressCodeApi\dto;

use Carbon\Carbon;
use Exception;
use Funeralzone\ValueObjectExtensions\Implementations\EmailVO;
use Padosoft\LaravelAmazonSellingPartnerApi\Nazioni;
use Padosoft\LaravelAmazonSellingPartnerApi\Valute;
use function App\Classes\settings;

class AutoDtoBase
{
    public array $dataError = [];
    public array $original = [];
    private array $data;
    private array $repository = [];

    public function __construct(array $data)
    {
        //echo('init ' . class_basename($this) . PHP_EOL);
        $this->data = $data;
        $this->original = $data;
        $this->handlerData();
    }

    public static function create(array $data)
    {
        //echo('Creata staticamente');
        return new self($data);
    }

    public function getStructureRules(): array
    {
        return [];
    }

    public function isOk(string $name, bool $addError = false)
    {
        if (array_key_exists($name, $this->data)) {
            return true;
        }
        if ($addError) {
            $this->addError(name: $name, error: 'Campo non trovato');
        }
        return false;
    }

    public function setExtraData(): void
    {
    }

    protected function handlerData()
    {
        $this->repository = $this->getStructureRules();
        foreach ($this->repository as $key => $item) {
            $checkExtra = explode(',', $item);

            if ($checkExtra[0] === 'obj' && class_exists($checkExtra[1] ?? '')) {
                $this->setObj($key, $checkExtra[1]);
                continue;
            }
            switch ($item) {
                case 'bool':
                    $this->setBool($key);
                    break;
                case 'email':
                    $this->setEmail($key);
                    break;
                case 'string':
                    $this->setString($key);
                    break;
                case 'int':
                    $this->setInt($key);
                    break;
                case 'float':
                    $this->setFloat($key);
                    break;
                case 'date':
                    $this->setDate($key);
                    break;
                case 'array':
                    $this->setArray($key);
                    break;
                case 'valuta':
                    $this->setValuta($key);
                    break;
                case 'country':
                    $this->setCountry($key);
                    break;
                default:
                    //Ignora per ora.
            }
        }
        $this->setExtraData();
    }

    protected function setObj($name, $class)
    {
        if (($this->data[$name] ?? null) === null) {
            $this->addError(name: $name, error: 'Formato dati non corretto.');
        }
        try {
            $this->$name = $class::create($this->data[$name] ?? []);
        } catch (Exception $e) {
            $this->$name = $class::create([]);
        }
    }

    protected function addError($name, $error)
    {
        $this->dataError[] = ['field' => $name, 'error' => $error];
    }

    protected function setBool($name)
    {
        $this->$name = $this->isOk(name: $name, addError: true) && $this->data[$name] === 'true';
    }

    protected function setEmail($name)
    {
        try {
            $this->$name = $this->isOk(name: $name, addError: true) ? EmailVO::fromNative($this->data[$name]) : null;
        } catch (Exception $e) {
            $this->dataError[] = $e->getMessage();
            $this->$name = $this->isOk($name) ? settings('mws.getorder.emailfallback') : '';
        }
        if ($this->$name === null || $this->$name === '') {
            $this->$name = settings('mws.getorder.emailfallback');
        }
    }

    protected function setString($name)
    {
        if ($this->isOk(name: $name, addError: true)) {
            if (is_array($this->data[$name])) {
                $this->$name = implode(',', $this->data[$name]);
            } else {
                $this->$name = $this->data[$name];
            }
        } else {
            $this->$name = '';
        }
    }

    protected function setInt($name)
    {
        $this->$name = $this->isOk(name: $name, addError: true) ? (int)$this->data[$name] : null;
    }

    protected function setFloat($name)
    {
        $this->$name = $this->isOk(name: $name, addError: true) ? (float)number_format((float)$this->data[$name], 2, '.', '') : 0.00;
    }

    protected function setDate($name)
    {
        try {
            $this->$name = $this->isOk(name: $name, addError: true) ? Carbon::parse($this->data[$name]) : null;
        } catch (Exception $e) {
            $this->dataError[] = $e->getMessage();
            $this->$name = $this->isOk($name) ? (string)$this->data[$name] : null;
        }
    }

    protected function setArray($name)
    {
        $data = $this->data[$name] ?? [];
        $this->$name = is_string($data) ? [$data] : [];
        if (is_array($data)) {
            $this->$name = $this->data[$name] ?? [];
        }
    }

    protected function setValuta($name)
    {
        $valuta = $this->isOk(name: $name, addError: true) ? Valute::where('codice', $this->data[$name])->first() : null;
        if ($valuta === null) {
            $valuta = new Valute();
            $valuta->codice = $this->isOk($name) ? $this->data[$name] : '';
        }
        $this->$name = $valuta;
    }

    protected function setCountry($name)
    {
        $country = $this->isOk(name: $name, addError: true) ? Nazioni::where('codice_iso_alpha2', $this->data[$name])->first() : null;
        if ($country === null) {
            $this->addError(name: $name, error: 'Country non trovata');
            $country = new Nazioni();
            $country->codice_iso_alpha2 = $this->isOk($name) ? $this->data[$name] : '';
        }
        $this->$name = $country;
    }

    protected function isObj($className): string
    {
        return 'obj,' . $className;
    }
}
